<?php
header("content-Type: text/html; charset=gb2312");
session_start();
//Ȩ����֤
if(!$_SESSION['login']){
	echo "<script type=\"text/javascript\" language=\"javascript\">alert(\"Ȩ�޲��㣬���½!\");location.href='albums.php';</script>";
	exit;
}
if(isset($_GET['id'])&&$_GET['id']!=""){

		//�������ݿ������ļ�
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
			//ɾ���ƶ�id�����Իظ�������Ϣ
			
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
				echo "<script type=\"text/javascript\" language=\"javascript\">alert(\"ɾ���ɹ�!\");location.href='../style-demo.php?id=".$row[1]."';</script>";
				}
			}
			else
			{
			echo $picdir;
			}
		
}
?>