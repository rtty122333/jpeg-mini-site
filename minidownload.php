<? 
header("content-Type: text/html; charset=gb2312");
// �������ݿ�����
session_start();
require('config.db.php');
//�����ļ���
if(!$_SESSION['login']){
	echo "<script type=\"text/javascript\" language=\"javascript\">alert(\"Ȩ�޲��㣬���½!\");location.href='imagelist.php';</script>";
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
		$picpath = "user/".$_SESSION['user']."/".$alres[0]."/".$name;
		$picinfo = pathinfo($picpath);
		$bsname = basename($picpath,".".$picinfo[extension]);
		$compicpath = "user/".$_SESSION['user']."/".$alres[0]."/compressed/".$bsname."_mini.".$picinfo[extension];
	}
//����ļ��Ƿ����
if (!file_exists($compicpath))
	{ 
	echo "<script type=\"text/javascript\" language=\"javascript\">alert(\"�ļ��Ҳ���!\");location.href='style-demo.php';</script>";
	exit; 
	}else { 
	// ���ļ�
	$file = fopen($compicpath,"r");  
	// �����ļ���ǩ 
	Header("Content-type: application/octet-stream"); 
	Header("Accept-Ranges: bytes"); 
	Header("Accept-Length: ".filesize($picpath)); 
	Header("Content-Disposition: attachment; filename=".$bsname."_mini.".$picinfo[extension]); 
	// ����ļ����� 
	//��ȡ�ļ����ݲ�ֱ������������
	echo fread($file,filesize($compicpath)); 
	fclose($file); 
	exit;
} 
?>