<?php
header("content-Type: text/html; charset=utf-8");
session_start();
/*******************************************
'文件名：albumlist.php
'主要功能：显示专辑封面列表
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
	$loginref = "albumlist.php";
	$loginmsg = $_SESSION['user']." 欢迎回来！";
	$regref = "funcs/logout.php";
	$regmsg = "退出登陆";
}

require('inc\config.db.php');
			mysql_query("set names gb2312");
			$idsql = "SELECT `id` FROM `user` WHERE `username` = '".$_SESSION['user']."'";
			$userid = mysql_query($idsql);
			
			$row = mysql_fetch_array($userid, MYSQL_NUM);
		    $uid = $row[0];
			
			$sql = "SELECT `alname`,`des`,`coverid`,`id` FROM `album` WHERE `userid` = '".$uid."'";
			$result = mysql_query($sql);
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			$row[0]=iconv("gb2312","utf-8",$row[0]);
			if(!empty($row[2]))
			{
				$picsql = "SELECT `filename` FROM `picture` WHERE `id` = '".$row[2]."'";
				$picres = mysql_query($picsql);
				$row1 = mysql_fetch_array($picres, MYSQL_NUM);
				$row1[0] = iconv("gb2312","utf-8",$row1[0]);
				$src = "user/".$_SESSION['user']."/".$row[0]."/".$row1[0];
				//$src=iconv("gb2312","utf-8",$src);
				//echo $src;
				$albumarray[] = array("coversrc"=>$src,"alname"=>$row[0],"alid"=>$row[3]);
			}
			else
			{
				$albumarray[] = array("coversrc"=>"images/demo/album.jpg","alname"=>$row[0],"alid"=>$row[3]);
				//echo "images/demo/album.jpg";
			}
		}
mysql_free_result($result);
			
			
			
			
			
$smarty->assign("loginref",$loginref);
$smarty->assign("loginmsg",$loginmsg);
$smarty->assign("regref",$regref);
$smarty->assign("regmsg",$regmsg);
$smarty->assign("album",$albumarray);



$smarty->display("tpl/albumlist.html");
?>