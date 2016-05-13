<?php>
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
      <li class="current"><a href="#">专辑列表</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->



<div class="wrapper col3">
  <div id="container">
    <div id="content">  
      <h2>个人专辑列表：</h2>
      <table summary="Summary Here" cellpadding="0" cellspacing="0">
        <thead>
          <tr>
            <th>ID</th>
            <th>专辑名称（点击查看详细）</th>
            <th>专辑描述</th>
            <th>建立时间</th>
			<th>操作</th>
          </tr>
        </thead>
        <tbody>
          
<?php
		$color = 1;
		require('config.db.php');
			mysql_query("set names utf8");
			$idsql = "SELECT `id` FROM `user` WHERE `username` = '".$_SESSION['user']."'";
			$userid = mysql_query($idsql);
			
			$row = mysql_fetch_array($userid, MYSQL_NUM);
		    $uid = $row[0];
			
			$sql = "SELECT `id`,`alname`,`des`,`createtime` FROM `album` WHERE `userid` = '".$uid."'";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result, MYSQL_NUM)){
			
?>
			<tr class=<?php if($color == 0){echo "dark";}else {echo "light";} ?>>
			<td><?php echo $row[0] ?></td>
            <td><a href="style-demo.php?id=<?php echo $row[0] ?>"><?php echo $row[1] ?></a></td>
            <td><?php echo $row[2] ?></td>
            <td><?php echo $row[3] ?></td>
			<td><a href="delete.php?id=<?php echo $row[0]?>">删除专辑</a></td>
         </tr>	
<?php
		if($color == 1) $color = 0; else $color =1;
		}
		mysql_free_result($result);
?>

        </tbody>
      </table>
      <div id="respond">
	   <form action="cralbum.php" method="post" name="message board">
        <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" class="tab_b">
		<tr>
            <td width="84" class="td_bright">新建专辑</td>
            <td width="714" class="td_pad"></td>
         </tr>
          <tr>
            <td width="84" class="td_bright">专辑名称：</td>
            <td width="714" class="td_pad"><label>
              <input type="text" name="name" id="name" />
            </label></td>
          </tr>
          <tr>
          </tr>
          <tr>
            <td valign="top" class="td_bright">专辑描述：</td>
            <td colspan="4" class="td_pad"><label>
              <textarea name="desc" id="post" cols="40" rows="5"></textarea>
              </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="4"><table width="98%" height="32" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="13%" class="td_pad"><input type="submit" name="Submit" value="提交" onclick="return checkInput();"/></td>
                  <td width="13%" class="td_pad"><input type="reset" name="Submit2" value="重置" /></td>
                </tr>
              </table></td>
          </tr>
        </table>
      </form>
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
