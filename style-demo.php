<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>JPEG Compress</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
<script language="javascript" type="text/javascript">
function getFileSize(filename)
{
   var filename; //获得上传文件的物理路径
   if(filename =="")
   {
      alert("你还没有浏览要上传的文件"); 
	  return false;
   	}try { 
	  alert (filename);
		var fso,f,fname,fsize;
		//设置上传的文件最大值（单位：kb），超过此值则不上传。
		var flength=1024;  
		var fso=new ActiveXObject("Scripting.FileSystemObject");
		f=fso.GetFile(filename);//文件的物理路径
		fname=fso.GetFileName(filename);//文件名（包括扩展名）
		fsize=f.Size; //文件大小（bit）
		fsize=fsize/1024;

	if(fsize>2048)
{
	alert("上传的文件到小为："+fsize+"kb,\n超过最大限度"+2048+"kb,不允许上传 ");
	return false;
	}else{
	alert("文件大小为："+fsize+"kb");}
}
    catch(e) 
{
         return false;
      }
   
   return true;    
}
function chkfrm(o){
   if(document.all('userfile').value!=""){
      o.action='upload.php?id=<?php echo $_GET['id']; ?>';
      return;
   }
}
</script>
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
        <li><a href="albumlist.php">用户空间</a></li>
		<li class="active"><a href="albums.php">专辑管理</a></li>
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
      <li><a href="#">专辑列表</a></li>
	  <li>&#187;</li>
	  <li><a href="#">图片列表</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->



<div class="wrapper col3">
  <div id="container">
    <div id="content">  
      <h2>个人图片列表：</h2>
      <table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>图片名称</th>
            <th>图片大小</th>
            <th>上传时间</th>
			<th>操作</th>
          </tr>
        </thead>
        <tbody>
          
<?php
		$color = 1;
		require('config.db.php');
			mysql_query("set names gb2312");
			$idsql = "SELECT `id` FROM `user` WHERE `username` = '".$_SESSION['user']."'";
			$userid = mysql_query($idsql);
			
			$row = mysql_fetch_array($userid, MYSQL_NUM);
		    $uid = $row[0];
			if(isset($_GET['id'])&&$_GET['id']!="")
			{
				$sql = "SELECT `id`,`filename`,`fsize`,`utime` FROM `picture` WHERE `userid` = '".$uid."' and `albumid` = '".$_GET['id']."'";
			}
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result, MYSQL_NUM)){
			
?>
			<tr class=<?php if($color == 0){echo "dark";}else {echo "light";} ?>>
			<td><?php echo $row[0] ?></td>
            <td><?php $row[1]=iconv("gb2312","utf-8",$row[1]); echo $row[1]; ?></td>
            <td><?php echo $row[2] ?></td>
            <td><?php echo $row[3] ?></td>
			<td><a href="delete.php?id=<?php echo $row[0]?>">删除</a></td>
         </tr>	
<?php
		if($color == 1) $color = 0; else $color =1;
		}
		mysql_free_result($result);
?>

        </tbody>
      </table>
	  
	  <form enctype="multipart/form-data" action="" method="post"  onsubmit="javascript:chkfrm(this);"> 
    <table border="1" width="55%" id="table1" cellspacing=0>
      <tr>
        <td colspan="2">
			<p align="center">上传文件:
		</td>
      </tr>
      <tr>
        <td width="10%">

		</td>
        <td width="71%">
			<?php
if (empty($_SESSION['login'])) {
    echo "您还没有登录，不能上传文件！";
}
else
{
	echo "<input name=\"userfile\" type=\"file\">";
	echo "<input type=\"submit\" value=\"上传文件\" onClick=\"getFileSize(document.all('userfile').value)\">";
}
?>
		</td>
      </tr>
    </table>
	允许上传的文件类型为:jpg|jpeg|gif|bmp|png
 </form>
	  
      
      <div id="respond">

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
