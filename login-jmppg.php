<?php
header("content-Type: text/html; charset=utf-8");
session_start();
/*******************************************
'文件名：login-jmpg.php
'主要功能：注册成功信息提示页面，并跳转到主页面。
'说明：
'*******************************************/
//加载Smarty配置文件
include_once(dirname(__FILE__)."/inc/include.smarty.php");
$msg = $_GET['msg'];//接受信息提示参数

//根据不同的跳转参数显示不同的提示信息
switch($msg)
{
	case 1:
		$jumpmsg1 = " 恭喜您注册成功！ ";
		$jumpmsg2 = " 两秒钟后自动跳转。。。 ";
		break;
		
	case "2":
		$jumpmsg1 = " 数据输入不完整，或者两次输入的密码不一致 ";
		$jumpmsg2 = " 两秒钟后自动跳转。。。 ";
		break;
		
	case 3:
		$jumpmsg1 = " 密码必须在6到30个字符之间 ";
		$jumpmsg2 = " 两秒钟后自动跳转。。。 ";
		break;
		
	case 4:
		$jumpmsg1 = " Email格式不合法! ";
		$jumpmsg2 = " 两秒钟后自动跳转。。。 ";
		break;
		
	case 5:
		$jumpmsg1 = " 该用户名已被注册，请换一个重试! ";
		$jumpmsg2 = " 两秒钟后自动跳转。。。 ";
		break;
		
}

$smarty->assign("jumpmsg1",$jumpmsg1);
$smarty->assign("jumpmsg2",$jumpmsg2);

//显示注册成功的信息页面
$smarty->display("tpl/login_jmp.html");
?>

<script type="text/javascript" language="javascript">
 function reloadyemain()//最好不要用reload这个关键字,因为很容易和其它函数冲突 
{ 
window.location.href="index.php"; 
//跳转到主页面

} 
 function reloadregister()//最好不要用reload这个关键字,因为很容易和其它函数冲突 
{ 
window.location.href="registerpg.php"; 
//跳转到重新注册页面
}

function jumpmain()
{//两秒钟后跳转到主页面
	window.setTimeout("reloadyemain();",2000); 
}
function jumpregister()
{//两秒钟后跳转到注册页面
	window.setTimeout("reloadregister();",2000);
}
</script> 

<?
//执行页面跳转
switch($msg)
{
	//成功注册，跳转到主页面
	case 1:
		echo("<script language='javascript'>");
		echo("jumpmain()");
		echo("</script>");
		break;
		
	//注册信息不符合要求，重返注册页面
	case 2:case 3:case 4:case 5:
		echo("<script language='javascript'>");
		echo("jumpregister()");
		echo("</script>");	
		break;		
}
echo $_GET['msg'];
?>








