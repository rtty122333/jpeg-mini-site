<?php>
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>JPEG ComPress</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
</head>
<body>
<div class="wrapper col0">
  <div id="topbar">
    <ul>
        <li class="right">
		<a id="slideit" href="#">
		<?php
if (empty($_SESSION['login'])) {
    echo "您还没有登录，不能访问当前页面！";
}
else
{
	echo $_SESSION['user']." 欢迎回来！";
}
?></a>&nbsp;&nbsp;&nbsp;<a id="slideit" href=
<?php
				if (!empty($_SESSION['login'])) {
   				 echo "\"logout.php\"";
				} 
?>
>
<?php
if(!empty($_SESSION['login'])) {
	echo "退出登陆";
}
?>
</a></li>
      </ul>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="#">快联科技</a><span class="wrapper col2"><a href="#"><img src="images/Fast_logo.png" width="185" height="79" /></a></span></h1>
      <p>Smaller & Faster</p>
    </div>
    <div id="topnav">
      <ul>
        <li><a href="index.php">主页</a></li>
        <li class="active"><a href="albumlist.php">用户空间</a></li>
		<li><a href="albums.php">专辑管理</a></li>
        <li><a href="#">压缩下载</a></li>
        <li class="last"><a href="comment.php">用户评论</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first"><a href="#">主页</a></li>
      <li>&#187;</li>
      <li><a href="#">专辑预览</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->



<div class="wrapper col3">
  <div id="container">
  	  <h2>个人专辑预览：</h2>
	  <div id="ad_section">
<?php
		require('config.db.php');
			mysql_query("set names gb2312");
			$idsql = "SELECT `id` FROM `user` WHERE `username` = '".$_SESSION['user']."'";
			$userid = mysql_query($idsql);
			
			$row = mysql_fetch_array($userid, MYSQL_NUM);
		    $uid = $row[0];
			
			$sql = "SELECT `alname`,`des`,`coverid`,`id` FROM `album` WHERE `userid` = '".$uid."'";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result, MYSQL_NUM)){
			$row[0]=iconv("gb2312","utf-8",$row[0]);
?>		
		<div class="ad_125x125_box"> <a href="imagelist.php?id=<?php echo $row[3]?>"><img src=
		"<?php
			if(!empty($row[2]))
			{
				$picsql = "SELECT `filename` FROM `picture` WHERE `id` = '".$row[2]."'";
				$picres = mysql_query($picsql);
				$row1 = mysql_fetch_array($picres, MYSQL_NUM);
				$row1[0] = iconv("gb2312","utf-8",$row1[0]);
				$src = "user/".$_SESSION['user']."/".$row[0]."/".$row1[0];
				//$src=iconv("gb2312","utf-8",$src);
				echo $src;
			}
			else
			{
				echo "images/demo/album.jpg";
			}
			
		 ?>
		" alt="" width="125" height="125" /></a><li><a>专辑: <?php  echo $row[0]; ?></a></li> </div>
<?php		
		}
		mysql_free_result($result);
?>
  </div>
    
    <div class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div id="footer">
     <div class="footbox">
      <h2>JPEG ComPress</h2>
      <ul>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">隐私策略</a></li>
        <li><a href="#">使用条款</a></li>
        <li class="last"><a href="#">联系我们</a></li>
      </ul>
    </div>
	<div class="footbox last">
      <h2>Community</h2>
      <ul>
	  	<li><a href="#">关于公司</a></li>
		<li><a href="support.html">技术支持</a></li>
        <li><a href="business.html">商业推广</a></li>
         <li class="last"><a href="#">新浪微博</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2010 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
