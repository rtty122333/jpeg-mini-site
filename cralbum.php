<?php
	session_start(); 
?>
<script type="text/javascript" language="javascript">
 function reloadyemian()//��ò�Ҫ��reload����ؼ���,��Ϊ�����׺�����������ͻ 
{ 
window.location.href="albums.php"; 
} 
</script> 
<?php
function _redirect($msg)
{
echo "<br>�����Ӻ��Զ���ת����<br>";
echo "<script language=\"javascript\"> ";
echo $msg;
echo " </script>";
exit;
}

require('config.db.utf8.php');
//���PHP���õ��Զ�ת�庯��δ��������ת����Щֵ
if(!get_magic_quotes_gpc()){
	foreach ($_POST as &$items){
		$items = addslashes($items);
	}
}
$name   = trim($_POST['name']);
$desc   = trim($_POST['desc']);
	if(empty($name))
	{
		//��������ת
		 echo "<font color='red'>ר�����Ʋ���Ϊ�գ�</font>";
		 _redirect("window.setTimeout(\"reloadyemian();\",3000);");
	}
	if (empty($_SESSION['login'])) 
	{
		//��������ת
		 echo "<font color='red'>����δ��½�������ϴ���Ƭ��</font>";
		 _redirect("window.setTimeout(\"reloadyemian();\",3000);" );
	}

//��ȡ��ǰuserid
$qrysql = "SELECT id FROM user WHERE username = '".$_SESSION['user']."'";
$uidres = mysql_query($qrysql);
$idres = mysql_fetch_array($uidres, MYSQL_NUM);
$uid = $idres[0];
//��֤��ǰר�������Ƿ��ظ�
$usersql = "SELECT * FROM album WHERE userid = '".$uid."' and alname = '".$name."'";
$userres = mysql_query($usersql);
	if ($userres && mysql_num_rows($userres) > 0) 
	{
		//ר�������ظ�
		 echo "<font color='red'>��ר���Ѿ����ڣ������ר�����ƣ�</font>";
		 _redirect("window.setTimeout(\"reloadyemian();\",3000);" );
	}
//��ȡ�����ļ���
$albumfolder="user/".$_SESSION['user']."/".$name;
$albumfolder=iconv("utf-8","gbk",$albumfolder);
if(!file_exists($albumfolder)){
mkdir($albumfolder);
}
//��ר����Ϣ�������ݿ�
$insql = "INSERT INTO album (userid,alname,des,createtime) VALUES('".$uid."','".$name."','".$desc."',NOW())";
$fin = mysql_query($insql);
if(!$fin)
{
	mysql_free_result($fin);
	echo "<font color='red'>�������ݿ�ʧ�ܣ�</font>";
	_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
}
echo "<font color='red'>�½�ר���ɹ���</font>";
_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
?>