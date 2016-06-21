<? 
header("content-Type: text/html; charset=gb2312");
// 创建数据库连接
session_start();
require('../inc/config.db.php');
//下载文件名
if(!$_SESSION['login']){
	echo "<script type=\"text/javascript\" language=\"javascript\">alert(\"权限不足，请登陆!\");location.href='imagelist.php';</script>";
	exit;
}
if(isset($_GET['id'])&&$_GET['id']!="")
	{
		$namesql = "SELECT `filename`,`albumid` FROM `picture` WHERE `id` = '".$_GET['id']."'";
		$picname = mysql_query($namesql);
		$row = mysql_fetch_array($picname, MYSQL_NUM);
		$alsql = "SELECT `alname` FROM `album` WHERE `id` = '".$row[1]."'";
		$alqry = mysql_query($alsql);
		$alres = mysql_fetch_array($alqry);
		$name = $row[0];
		$picpath = "../user/".$_SESSION['user']."/".$alres[0]."/".$name;
	}
//检查文件是否存在
if (!file_exists($picpath))
	{ 
	echo "<script type=\"text/javascript\" language=\"javascript\">alert(\"文件找不到!\");location.href='../style-demo.php';</script>";
	exit; 
	}else { 
	// 打开文件
	$file = fopen($picpath,"r");  
	// 输入文件标签 
	Header("Content-type: application/octet-stream"); 
	Header("Accept-Ranges: bytes"); 
	Header("Accept-Length: ".filesize($picpath)); 
	Header("Content-Disposition: attachment; filename=".$name); 
	// 输出文件内容 
	//读取文件内容并直接输出到浏览器
	echo fread($file,filesize($picpath)); 
	fclose($file); 
	exit;
} 
?>