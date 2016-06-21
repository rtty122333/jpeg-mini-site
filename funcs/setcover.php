<?php
header("content-Type: text/html; charset=gb2312");
session_start();
//权限验证
if(!$_SESSION['login']){
	echo "<script type=\"text/javascript\" language=\"javascript\">alert(\"权限不足，请登陆!\");location.href='albums.php';</script>";
	exit;
}
if(isset($_GET['id'])&&$_GET['id']!=""){

		//加载数据库配置文件
		require('../inc/config.db.php');
			mysql_query("set names gb2312");
			$namesql = "SELECT `filename`,`albumid` FROM `picture` WHERE `id` = '".$_GET['id']."'";
			$picname = mysql_query($namesql);
			$row = mysql_fetch_array($picname, MYSQL_NUM);
			
			$albumsql = "UPDATE album SET coverid = '".$_GET['id']."' WHERE id = '".$row[1]."'";
			$albumqry = mysql_query($albumsql);

				if(mysql_error()==""){
				echo "<script type=\"text/javascript\" language=\"javascript\">alert(\"设置成功!\");location.href='../showimage.php?id=".$_GET['id']."';</script>";
				}


		
}
?>