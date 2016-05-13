<?php
	session_start(); 
?>
<script type="text/javascript" language="javascript">
 function reloadyemian()//最好不要用reload这个关键字,因为很容易和其它函数冲突 
{ 
window.location.href="albums.php"; 
} 
</script> 
<?php
function _redirect($msg)
{
echo "<br>三秒钟后自动跳转。。<br>";
echo "<script language=\"javascript\"> ";
echo $msg;
echo " </script>";
exit;
}

require('config.db.utf8.php');
//如果PHP设置的自动转义函数未开启，就转义这些值
if(!get_magic_quotes_gpc()){
	foreach ($_POST as &$items){
		$items = addslashes($items);
	}
}
$name   = trim($_POST['name']);
$desc   = trim($_POST['desc']);
	if(empty($name))
	{
		//错误处理，跳转
		 echo "<font color='red'>专辑名称不能为空！</font>";
		 _redirect("window.setTimeout(\"reloadyemian();\",3000);");
	}
	if (empty($_SESSION['login'])) 
	{
		//错误处理，跳转
		 echo "<font color='red'>您还未登陆，不能上传照片！</font>";
		 _redirect("window.setTimeout(\"reloadyemian();\",3000);" );
	}

//获取当前userid
$qrysql = "SELECT id FROM user WHERE username = '".$_SESSION['user']."'";
$uidres = mysql_query($qrysql);
$idres = mysql_fetch_array($uidres, MYSQL_NUM);
$uid = $idres[0];
//验证当前专辑名称是否重复
$usersql = "SELECT * FROM album WHERE userid = '".$uid."' and alname = '".$name."'";
$userres = mysql_query($usersql);
	if ($userres && mysql_num_rows($userres) > 0) 
	{
		//专辑名称重复
		 echo "<font color='red'>该专辑已经存在，请更换专辑名称！</font>";
		 _redirect("window.setTimeout(\"reloadyemian();\",3000);" );
	}
//获取建立文件夹
$albumfolder="user/".$_SESSION['user']."/".$name;
$albumfolder=iconv("utf-8","gbk",$albumfolder);
if(!file_exists($albumfolder)){
mkdir($albumfolder);
}
//将专辑信息插入数据库
$insql = "INSERT INTO album (userid,alname,des,createtime) VALUES('".$uid."','".$name."','".$desc."',NOW())";
$fin = mysql_query($insql);
if(!$fin)
{
	mysql_free_result($fin);
	echo "<font color='red'>插入数据库失败！</font>";
	_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
}
echo "<font color='red'>新建专辑成功！</font>";
_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
?>