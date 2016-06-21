<?php /* Smarty version Smarty-3.1.8, created on 2012-05-26 12:19:53
         compiled from "tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293034fc0ca6990ceb1-09264496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db97a3f8af80d260372ece8474eb31d980e7a586' => 
    array (
      0 => 'tpl\\index.tpl',
      1 => 1338034790,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293034fc0ca6990ceb1-09264496',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'loginref' => 0,
    'loginmsg' => 0,
    'regref' => 0,
    'regmsg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fc0ca69b180e0_12053482',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc0ca69b180e0_12053482')) {function content_4fc0ca69b180e0_12053482($_smarty_tpl) {?><html>
<head>
<title>JPEG ComPress</title>
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
</head>
<body>
<div class="wrapper col0">
  <div id="topbar">
      <ul>
        <li class="right"><a id="slideit" href= <?php echo $_smarty_tpl->tpl_vars['loginref']->value;?>

		>
		<?php echo $_smarty_tpl->tpl_vars['loginmsg']->value;?>

		</a>&nbsp;&nbsp;<a id="slideit" href= <?php echo $_smarty_tpl->tpl_vars['regref']->value;?>

		>
		<?php echo $_smarty_tpl->tpl_vars['regmsg']->value;?>

		</a></li>	
      </ul>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="#">快联科技</a><span class="wrapper col2"><img src="images/Fast_logo.png" width="185" height="79" /></a></span></h1>
      <p>Smaller & Faster</p>
    </div>
    <div id="topnav">
      <ul>
        <li class="active"><a href="index.php">主页</a></li>
        <li><a href="albumlist.php">用户空间</a></li>
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
  <div id="featured_slide">
    <div class="featured_box"><img src="images/demo/1.jpg" alt="" /></a>
      <div class="floater">
        <h2>原始图像：1024*768  227KB</h2>
        <p>硬盘空间提示不足？快联图片压缩技术帮您节省硬盘空间</p>
		<p>网页载入速度缓慢？快联为您亲自打造&quot;瘦身&quot;后的网页，让您获得更轻盈，快捷的体验</p>      
		<p>手机包月流量不足？快联科技在帮您提升移动终端浏览效率的同时，节省流量高达50%以上</p>
		<p class="readmore"><a href="business.html">了解更多 &raquo;</a></p>
      </div>
    </div>
    <div class="featured_box"><img src="images/demo/11.jpg" alt="" /></a>
      <div class="floater">
        <h2>压缩后：1024*768 115KB</h2>
        <p>压缩比率：50%</p>
		<p>以人类肉眼分辨能力为基线，达到最大压缩比例，让您察觉不到压缩前后有任何变化</p>
		<p>平均节约带宽20%-80%</p>
		<p>提高网页加载速率20%-70%</p>
        <p class="readmore"><a href="business.html">了解更多 &raquo;</a></p>
      </div>
    </div>
    <div class="featured_box"><img src="images/demo/2.jpg" alt="" /></a>
      <div class="floater">
        <h2>原始图像：1024*758 113KB</h2>
        <p>压缩后图片格式：JPEG或PNG等标准格式</p>
		<p>兼容所有浏览器，图像处理设备及软件</p>
		<p>快联图片压缩技术采用全自动批量化处理，无需用户输入任何调整参数</p>
        <p class="readmore"><a href="support.html">了解更多 &raquo;</a></p>
      </div>
    </div>
    <div class="featured_box"><img src="images/demo/22.jpg" alt="" /></a>
      <div class="floater">
        <h2>压缩后：1024*768 59.2KB</h2>
        <p>压缩比率：52.4%</p>
		<p>国际领先的技术：基于近十年来SIGGRAPH等国际顶级会议的多篇论文</p>
		<p>整合了国内外学术界的最新成果和一流技术，并在此基础上优化与拓展</p>
        <p class="readmore"><a href="support.html">了解更多 &raquo;</a></p>
      </div>
    </div>
    <div class="featured_box"><img src="images/demo/6.jpg" alt="" /></a>
      <div class="floater">
        <h2>商业运作</h2>
        <p>为中国本土互联网企业量身定做的图片瘦身和网页加速解决方案</p>
		<p>提高社交网站，微博，门户网站的访问速度，帮您节省带宽成本和存储成本，提高利润</p>
        <p class="readmore"><a href="business.html">了解更多 &raquo;</a></p>
      </div>
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->

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
    <p class="fl_left">Copyright &copy; 2012 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <br class="clear" />
  </div>
</div>
</body>
</html>
<?php }} ?>