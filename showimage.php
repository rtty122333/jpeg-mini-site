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
	if(isset($_GET['id'])&&$_GET['id']!="")
	{
		$namesql = "SELECT `filename`,`albumid` FROM `picture` WHERE `id` = '".$_GET['id']."'";
		$picname = mysql_query($namesql);
		$row = mysql_fetch_array($picname, MYSQL_NUM);
		
		$row[0]=iconv("gb2312","utf-8",$row[0]);
		$name = $row[0];
		$alsql = "SELECT `alname` FROM `album` WHERE `id` = '".$row[1]."'";
		$alqry =  mysql_query($alsql);
		$alres = mysql_fetch_array($alqry, MYSQL_NUM);
		$alres[0]=iconv("gb2312","utf-8",$alres[0]);
		
		$picpath = "user/".$_SESSION['user']."/".$alres[0]."/".$name;
		$picpath = iconv("utf-8","gb2312",$picpath);
		$imagesize = getimagesize($picpath);
		if($imagesize[0]<600)
		{
			$wide = $imagesize[0];
		}
		else
		{
			$wide = 600;
		}
	}
	
$picpath = iconv("gb2312","utf-8",$picpath);

$smarty->assign("loginref",$loginref);
$smarty->assign("loginmsg",$loginmsg);
$smarty->assign("regref",$regref);
$smarty->assign("regmsg",$regmsg);
$smarty->assign("picpath",$picpath);
$smarty->assign("wide",$wide);
$smarty->assign("picid",$_GET['id']);
$smarty->assign("albumid",$row[1]);

$smarty->display("tpl/showimage.html");
?>