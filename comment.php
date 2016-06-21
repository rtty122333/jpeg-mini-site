<?php
header("content-Type: text/html; charset=utf-8");
session_start();
/*******************************************
'文件名：index.php
'主要功能：显示评论页面
'说明：
'*******************************************/
//加载Smarty配置文件
include_once(dirname(__FILE__)."/inc/include.smarty.php");

$loginref = null;
$regref = null;

$loginmsg = null;
$regmsg = null;

$color = 1;

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

require('inc/config.db.utf8.php'); 
			
			$comsql = "SELECT * from comment order by id desc limit 0,10";
			$result = mysql_query($comsql);
			
		while($row = mysql_fetch_array($result, MYSQL_NUM))
		{
			if($color == 1) 
			{
				$comarray[] = array("comname"=>$row[1],"comdate"=>$row[4],"content"=>$row[3],"color"=>"comment_odd");
				$color = 0;
			} else 
			{
				$comarray[] = array("comname"=>$row[1],"comdate"=>$row[4],"content"=>$row[3],"color"=> "comment_even");
				$color =1;
			}
		}
		
mysql_free_result($result); 

$smarty->assign("loginref",$loginref);
$smarty->assign("loginmsg",$loginmsg);
$smarty->assign("regref",$regref);
$smarty->assign("regmsg",$regmsg);
$smarty->assign("comment",$comarray);

$smarty->display("tpl/comment.html");
?>