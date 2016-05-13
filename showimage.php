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
	  <li>&#187;</li>
	  <li><a href="#">图片预览</a></li>
	  <li>&#187;</li>
	  <li><a href="#">图片详情</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->

<?php 
	require('config.db.php');
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
?>

<div class="wrapper col3">
  <div id="container">
  	  <h2>专辑图片预览：</h2>
	  <div id="ad_section">
	  <div> <a href="#"><img src=<?php echo iconv("gb2312","utf-8",$picpath) ?> alt=""  width=<?php echo $wide ?>/></a> </div>
  	  </div>  
	   <div id="topnav">
      <ul>
        <li><a href="download.php?id=<?php echo $_GET['id']?>">原始图片下载</a></li>
        <li><a href="minidownload.php?id=<?php echo $_GET['id']?>">压缩图片下载</a></li>
		<li><a href="setcover.php?id=<?php echo $_GET['id']?>">设为专辑封面</a></li>
		<li><a href="imagelist.php?id=<?php echo $row[1]; ?>">返回</a></li>
      </ul>
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
