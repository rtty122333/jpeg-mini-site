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

$smarty->display("tpl/register.html");
?>