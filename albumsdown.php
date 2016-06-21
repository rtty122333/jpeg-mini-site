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


$color = 1;
require('inc/config.db.php');
mysql_query("set names utf8");

			$idsql = "SELECT `id` FROM `user` WHERE `username` = '".$_SESSION['user']."'";
			$userid = mysql_query($idsql);
			
			$row = mysql_fetch_array($userid, MYSQL_NUM);
		    $uid = $row[0];
			
			$sql = "SELECT `id`,`alname`,`des`,`createtime` FROM `album` WHERE `userid` = '".$uid."'";
			$result = mysql_query($sql);
		
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			if($color == 1)
			{
				$albumarray[] = array("alid"=>$row[0],"alname"=>$row[1],"aldes"=>$row[2],"altime"=>$row[3],"color"=>"light");
				$color = 0; 	
			}
			else
			{
				$albumarray[] = array("alid"=>$row[0],"alname"=>$row[1],"aldes"=>$row[2],"altime"=>$row[3],"color"=>"dark");
				$color =1;
			} 
		}

		mysql_free_result($result);


$smarty->assign("loginref",$loginref);
$smarty->assign("loginmsg",$loginmsg);
$smarty->assign("regref",$regref);
$smarty->assign("regmsg",$regmsg);
$smarty->assign("album",$albumarray);

$smarty->display("tpl/albumsdown.html");
?>