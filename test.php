<?php
session_start();
echo getenv("REMOTE_ADDR");
echo "###";
echo $_SERVER['REMOTE_ADDR'];
echo "###";
echo $_SERVER['REMOTE_PORT'];
echo "###";
echo $_SERVER['REMOTE_HOST']; 
echo "###";
echo $_SERVER['HTTP_USER_AGENT'];
echo "###";
echo gethostbyaddr($_SERVER['REMOTE_ADDR']);
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
      <h1><a href="#">JPEG ComPress</a></h1>
      <p>Make Your Own Workshop</p>
    </div>
    <div id="topnav">
      <ul>
        <li><a href="index.php">主页</a></li>
        <li class="active"><a href="imagelist.php">用户空间</a></li>
		<li><a href="style-demo.php">上传图片</a></li>
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
      <li class="current"><a href="#">用户空间</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->



<div class="wrapper col3">
  <div id="container">
  	  <h2>个人专辑预览：</h2>
	  <div id="ad_section">
	  
       
      <?php
	  //exec("D:\\AppServ\\www\\main\\Pack\\JPGOpt.exe D:\\AppServ\\www\\main\\user\\rtty\\asd\\ D:\\AppServ\\www\\main\\user\\rtty\\pressedjpg\\ D:\\AppServ\\www\\main\\Pack\\log.txt 3 80",$ss); 
	  //exec("JPGOpt.exe user\\rtty\\asd\\ user\\rtty\\pressedjpg\\ log.txt 2 0",$ss);
	  //echo $ss;
	  //rmdir("user\\rtty\\asd\\temp");
	  $dir = "user//hi//test//Lighthouse.jpg";
	  $info = pathinfo($dir);
	  //echo $info[extension];
	  $name = basename($dir,".".$info[extension]);
	  echo $name;
	  
	function deldir($dir) {
  //先删除目录下的文件：
 	 $dh=opendir($dir);
 	 while ($file=readdir($dh)) {
  	  if($file!="." && $file!="..") {
      $fullpath=$dir."/".$file;
     	 if(!is_dir($fullpath)) {
       	   unlink($fullpath);
     	 } else {
      	    deldir($fullpath);
     	 }
  	  }
  }
 
  		closedir($dh);
  //删除当前文件夹：
  		if(rmdir($dir)) {
   		 return true;
		  } else {
  		  return false;
 		 }
	}
		//deldir("user\\rtty\\asd\\temp");
?>

		<div class="ad_125x125_box">
		 <a href="#"><img src="user/rtty/Amazing_Flower_36.jpg ?>" alt="" width="125" height="125" /></a> 
		  <li><a href="#">使用条款</a></li>
		 </div>
		
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
        <li><a href="#">技术支持</a></li>
		 <li><a href="#">技术简介</a></li>
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
    <p class="fl_right">Template by <a href="http://www.88web.org/" title="免费网页模板">88web</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
