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
		$sql = "SELECT `alname`,`des`,`coverid` FROM `album` WHERE `id` = '".$_GET['id']."'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result, MYSQL_NUM);
		$name = $row[0];
		$alpath = "../user/".$_SESSION['user']."/".$name."/compressed";
		$outpath = "../user/".$_SESSION['user']."/".$name."/".$name.".zip";
		if(file_exists($outpath))
		{
			unlink($outpath);
		}
		//解决exec调用过程中，路径含有空格的问题
		$z7 = "D:\\Progra~1\\7-Zip\\7z.exe a -tzip ";
		exec($z7.$outpath." ".$alpath,$ss); 
//检查文件是否存在
if (!file_exists($alpath))
	{ 
		echo "<script type=\"text/javascript\" language=\"javascript\">alert(\"专辑不存在!\");location.href='../albumsdown.php';</script>";
		exit; 
	}else { 
		// 打开文件
		$file = fopen($outpath,"r");  
		// 输入文件标签 
		Header("Content-type: application/octet-stream"); 
		Header("Accept-Ranges: bytes"); 
		Header("Accept-Length: ".filesize($outpath)); 
		Header("Content-Disposition: attachment; filename=".$name.".zip"); 
		// 输出文件内容 
		//读取文件内容并直接输出到浏览器
		echo fread($file,filesize($outpath)); 
		fclose($file); 
		exit;
	} 
	mysql_free_result($result);
}
?>