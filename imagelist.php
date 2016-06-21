<?php
header("content-Type: text/html; charset=utf-8");
session_start();
/*******************************************
'文件名：index.php
'主要功能：显示网站首页
'说明：
'*******************************************/
//加载Smarty配置文件
include_once(dirname(__FILE__)."/inc/include.smarty.php");

$loginref = null;
$regref = null;

$loginmsg = null;
$regmsg = null;

if (empty($_SESSION['login'])) 
{
   	 $loginref = "loginpg.php";
	 $loginmsg = "【登录】";
	 $regref = "registerpg.php";
	 $regmsg = "【注册】";
} 
else
{
	$loginref = "\"#\"";
	$loginmsg = $_SESSION['user']." 欢迎回来！";
	$regref = "funcs/logout.php";
	$regmsg = "退出登陆";
}

require('inc/config.db.php');
mysql_query("set names gb2312");
			if(isset($_GET['id'])&&$_GET['id']!="")
			{
				$alsql = "SELECT `alname`,`des`,`coverid` FROM `album` WHERE `id` = '".$_GET['id']."'";
				$alqry = mysql_query($alsql);
				$alres = mysql_fetch_array($alqry, MYSQL_NUM);
				$alres[0]=iconv("gb2312","utf-8",$alres[0]);
			}
			$idsql = "SELECT `id` FROM `user` WHERE `username` = '".$_SESSION['user']."'";
			$userid = mysql_query($idsql);
			
			$row = mysql_fetch_array($userid, MYSQL_NUM);
		    $uid = $row[0];
			
			$sql = "SELECT `filename`,`id` FROM `picture` WHERE `userid` = '".$uid."' and `albumid` = '".$_GET['id']."'";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result, MYSQL_NUM))
			{
				$row[0]=iconv("gb2312","utf-8",$row[0]);
				$src = "user/".$_SESSION['user']."/".$alres[0]."/".$row[0];
				$alimage[] = array("imageid"=>$row[1],"src"=>$src);
			}
mysql_free_result($result);

$smarty->assign("loginref",$loginref);
$smarty->assign("loginmsg",$loginmsg);
$smarty->assign("regref",$regref);
$smarty->assign("regmsg",$regmsg);
$smarty->assign("alimg",$alimage);

$smarty->display("tpl/imagelist.html");
?>