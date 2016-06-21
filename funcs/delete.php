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
			//$row[0]=iconv("gb2312","utf-8",$row[0]);
		    $name = $row[0];
			
			$albumsql = "SELECT alname,coverid FROM album WHERE id = '".$row[1]."'";
			$albumqry = mysql_query($albumsql);
			$album = mysql_fetch_array($albumqry);
			//删除制定id在留言回复表中信息
			
			$picdir = "../user/".$_SESSION['user']."/".$album[0]."/".$name;
			$reinfo = pathinfo($picdir);
			$bsname = basename($picdir,".".$reinfo[extension]);
			$minidir = "../user/".$_SESSION['user']."/".$album[0]."/compressed/".$bsname."_mini.".$reinfo[extension];
			if(unlink($picdir))
			{
				unlink($minidir);
				$delRevertSql="delete from picture where id=".$_GET['id'];
				mysql_query($delRevertSql);
				if($album[1]==$_GET['id'])
				{
					$covernull = "UPDATE album SET coverid = NULL WHERE id = '".$row[1]."'";
					mysql_query($covernull);
				}
				if(mysql_error()==""){
				echo "<script type=\"text/javascript\" language=\"javascript\">alert(\"删除成功!\");location.href='../style-demo.php?id=".$row[1]."';</script>";
				}
			}
			else
			{
			echo $picdir;
			}
		
}
?>