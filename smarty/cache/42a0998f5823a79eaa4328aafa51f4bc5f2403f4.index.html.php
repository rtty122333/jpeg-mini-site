<?php /*%%SmartyHeaderCode:136324fffb57d4a3cf9-91832285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42a0998f5823a79eaa4328aafa51f4bc5f2403f4' => 
    array (
      0 => 'tpl\\index.html',
      1 => 1341905430,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136324fffb57d4a3cf9-91832285',
  'variables' => 
  array (
    'loginref' => 0,
    'loginmsg' => 0,
    'regref' => 0,
    'regmsg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fffb57d4fdf23_62955939',
  'cache_lifetime' => 0,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fffb57d4fdf23_62955939')) {function content_4fffb57d4fdf23_62955939($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>JPEG ComPress</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="imagetoolbar" content="no" />

<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="scripts/picture_rotate.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>
<script language="Javascript">
		$(document).ready(function(){
			$('#pic').mousemove(function(e) { 
				//var xx = e.originalEvent.x || e.originalEvent.layerX || 0; 
				//console.log(xx);
				var xx = e.pageX;
				var half_client_width = document.body.clientWidth/2;
				//img1图片左边界在客户窗口的X坐标,图片宽的一半为465
				var pic_x = half_client_width - 455;
				//img3图片左边界在客户窗口的X坐标,img3图片宽度315
				var img3_x = half_client_width-315;
				//img4图片右边界在客户窗口的X坐标,img4图片宽度315
				var img4_x = half_client_width+315;
				
				$("#show_img_2").width(xx-pic_x);
				if(xx<=half_client_width){
					$("#show_img_4").width(315);
					if(xx<=img3_x){
						$("#show_img_3").width(0);
					}else{
						$("#show_img_3").width(xx-img3_x);
						}
				}else{
					$("#show_img_3").width(315);
					if(xx>img4_x){						
						$("#show_img_4").width(0);
					}else{
						$("#show_img_4").width(img4_x-xx);
					}
				}
			})//.mouseout(function(){
				//$("#show_img_2").width(880);
				//$("#show_img_3").width(315);
				//$("#show_img_4").width(315);
			//}); 
		});
	</script>
</head>
<body>
<div class="wrapper col0">
  <div id="topbar">
      <ul>
        <li class="right"><a id="slideit" href= albumlist.php
		>
		yyy 欢迎回来！
		</a>&nbsp;&nbsp;<a id="slideit" href= funcs/logout.php
		>
		退出登陆
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
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">	
		
			<div id="show_part">
				<div id="pic" style="position:absolute;width:910px;height:396px;" onmouseover="rotate_stop()" onmouseout="rotate_start()">
				
					<div id="show_img_1" style='z-index:10;background:url(images/show1.jpg);background-repeat:no-repeat;'>					
					</div>
				
					<div id="show_img_2" style='z-index:20;background:url(images/show11.jpg);background-repeat:no-repeat;background-color:transparent;'></div>
				
					<div id="show_img_3" style='position:absolute;width:315px;height:51px;z-index:30;background:url(images/ori.png);background-repeat:no-repeat;'></div>
				
					<div id="show_img_4" style='position:absolute;width:315px;height:51px;z-index:40;'>
						<img id="img4" src="images/compress.png">					</div>
				</div>
				<div id="show_description">
					
					<div class="Resolution" id="Resolution1" style="display:block"><span>Photo By: <a href="#">rolands.lakis</a>, Photo Resolution:2784x1856</span></div>
					<div class="Resolution" id="Resolution2" style="display:none"><span>Photo By: <a href="#">rolands.lakis</a>, Photo Resolution:3052x2176</span></div>
					<div class="Resolution" id="Resolution3" style="display:none"><span>Photo By: <a href="#">Julien Haler</a>, Photo Resolution:2784x1856</span></div>
					<div class="Resolution" id="Resolution4" style="display:none"><span>Photo By: <a href="#">85mm.ch</a>, Photo Resolution:3138x2491</span></div>				
					
					<div id="picLink">	
						<table id="pic_rotate">
								<tr>
									<td><a id="Link0" class="pic_link" onclick="picShow(0)" href="javascript:void()">●</a></td>
									<td><a id="Link1" class="pic_link" onclick="picShow(1)" href="javascript:void()">●</a></td>
									<td><a id="Link2" class="pic_link" onclick="picShow(2)" href="javascript:void()">●</a></td>
									<td><a id="Link3" class="pic_link" onclick="picShow(3)" href="javascript:void()">●</a></td>
								</tr>
						</table>
					</div>
					
					<div id="down_load">
						<div id="down_link">
							<img src="images/download.png">						</div>
						
						<div id="dynamic_info">
							<div class="jpegmini_info" id="jpegmini_info1" style="display:block;background-color:#ff3600;background-image:url(images/jpegmini_info.png);background-repeat:no-repeat;background-position:right top;">
								快联压缩 &nbsp &nbsp<span class="Jpeg_num">994KB  &nbsp </span>							</div>
							<div class="jpegmini_info" id="jpegmini_info2" style="display:none;background-color:#ff3600;background-image:url(images/jpegmini_info.png);background-repeat:no-repeat;background-position:right top;">
								快联压缩 &nbsp &nbsp<span class="Jpeg_num">1927KB  &nbsp </span>							</div>
							<div class="jpegmini_info" id="jpegmini_info3" style="display:none;background-color:#ff3600;background-image:url(images/jpegmini_info.png);background-repeat:no-repeat;background-position:right top;">
								快联压缩 &nbsp &nbsp<span class="Jpeg_num">1154KB  &nbsp </span>							</div>
							<div class="jpegmini_info" id="jpegmini_info4" style="display:none;background-color:#ff3600;background-image:url(images/jpegmini_info.png);background-repeat:no-repeat;background-position:right top;">
								快联压缩 &nbsp &nbsp<span class="Jpeg_num">2659KB  &nbsp </span>							</div>

							<div class="origin_info" id="origin_info1" style="display:block;background-color:#f7d357;background-image:url(images/origin_info.png);background-repeat:no-repeat;background-position:right top;">		
								原始图片 &nbsp <span class="Orig_num">8451KB &nbsp </span>							</div>
							<div class="origin_info" id="origin_info2" style="display:none;background-color:#f7d357;background-image:url(images/origin_info.png);background-repeat:no-repeat;background-position:right top;">		
								原始图片 &nbsp <span class="Orig_num">10206KB &nbsp </span>							</div>
							<div class="origin_info" id="origin_info3" style="display:none;background-color:#f7d357;background-image:url(images/origin_info.png);background-repeat:no-repeat;background-position:right top;">		
								原始图片 &nbsp <span class="Orig_num">3678KB &nbsp </span>							</div>
							<div class="origin_info" id="origin_info4" style="display:none;background-color:#f7d357;background-image:url(images/origin_info.png);background-repeat:no-repeat;background-position:right top;">		
								原始图片 &nbsp <span class="Orig_num">14381KB &nbsp </span>							</div>
						</div>
						<div id="reduce_info">
							<div id="reduce_text">THIS PHOTO REDUCED BY</div>
							
							<div class="reduce_num" id="reduce_num1" style="background:url(images/px.png);display:block;">8.5x</div>
							<div class="reduce_num" id="reduce_num2" style="background:url(images/px.png);display:none;">5.3x</div>
							<div class="reduce_num" id="reduce_num3" style="background:url(images/px.png);display:none;">3.1x</div>
							<div class="reduce_num" id="reduce_num4" style="background:url(images/px.png);display:none;">5.4x</div>
						</div>
					</div>
				</div>
			</div>
			
			<div id="try_part">
				<p style="padding:0px;background-color:#fff300;">
					<a href="loginpg.php"><img src="images/10.png" alt="try" /></a>
				</p>
			</div>
			
		<!-- JiaThis Button BEGIN -->
			<script type="text/javascript" src="http://v2.jiathis.com/code/jiathis_r.js?move=0&amp;btn=r5.gif" charset="utf-8"></script>
		<!-- JiaThis Button END -->
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