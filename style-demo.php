<?php
header("content-Type: text/html; charset=utf-8");
session_start();
/*******************************************
'文件名：index.php
'主要功能：专辑图片详细信息列表页面
'说明：
'*******************************************/
//加载Smarty配置文件
include_once(dirname(__FILE__)."/inc/include.smarty.php");

$loginref = null;
$regref = null;

$loginmsg = null;
$regmsg = null;

$secmsg = null;

$color = 1;

if (empty($_SESSION['login'])) 
{
   	 $loginref = "loginpg.php";
	 $loginmsg = "【登录】";
	 $regref = "registerpg.php";
	 $regmsg = "【注册】";
	 $secmsg = "您还没有登录，不能上传文件！";
} 
else
{
	$loginref = "\"#\"";
	$loginmsg = $_SESSION['user']." 欢迎回来！";
	$regref = "funcs/logout.php";
	$regmsg = "退出登陆";
	$secmsg = "<input name=\"userfile\" type=\"file\"> <input type=\"submit\" value=\"上传文件\" onClick=\"getFileSize(document.all('userfile').value)\">";
}


require('inc/config.db.php');
			mysql_query("set names gb2312");
			$idsql = "SELECT `id` FROM `user` WHERE `username` = '".$_SESSION['user']."'";
			$userid = mysql_query($idsql);
			
			$row = mysql_fetch_array($userid, MYSQL_NUM);
		    $uid = $row[0];
			if(isset($_GET['id'])&&$_GET['id']!="")
			{
				$sql = "SELECT `id`,`filename`,`fsize`,`utime` FROM `picture` WHERE `userid` = '".$uid."' and `albumid` = '".$_GET['id']."'";
			}
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result, MYSQL_NUM))
			{
				$row[1]=iconv("gb2312","utf-8",$row[1]);
				if($color == 1)
				{
					$picarray[] = array("picid"=>$row[0],"picname"=>$row[1],"picsize"=>$row[2],"pictime"=>$row[3],"color"=>"light");
					$color = 0;
				}
				else 
				{
					$picarray[] = array("picid"=>$row[0],"picname"=>$row[1],"picsize"=>$row[2],"pictime"=>$row[3],"color"=>"dark");
					$color =1;
				}
			}
mysql_free_result($result);

$smarty->assign("loginref",$loginref);
$smarty->assign("loginmsg",$loginmsg);
$smarty->assign("regref",$regref);
$smarty->assign("regmsg",$regmsg);
$smarty->assign("pic",$picarray);
$smarty->assign("alid",$_GET['id']);
$smarty->assign("secmsg",$secmsg);

$smarty->display("tpl/style-demo.html");
?>