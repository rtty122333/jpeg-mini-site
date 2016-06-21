var myPic1 = new Array("images/show1.jpg","images/show2.jpg","images/show3.jpg","images/show4.jpg");
var myPic2 = new Array("images/show11.jpg","images/show22.jpg","images/show33.jpg","images/show44.jpg");
var Image_num=0;
var timerId2=0;
//定时自动播放幻灯片
function auto_rotate()
{
	if(Image_num>3)
		Image_num=0;
		
	picShow(Image_num);
	//Image_num++;
}

timerId1 = setInterval("auto_rotate()",7000);
//停止自动播放
function rotate_stop()
{
	clearInterval(timerId1);
}
//开始自动播放
function rotate_start()
{
	timerId1 = setInterval("auto_rotate()",7000);
}
	var width1=125;
	var width2=225;
//控制标签移动
function label_remove(element)
{
			if(width2<=500)
			{
				width1++;
				width2++;
				if(width1<=225)
					document.getElementById("jpegmini_info"+element).style.width=width1;
				document.getElementById("origin_info"+element).style.width=width2;
				
			}
	
}
/*幻灯片链接鼠标点击*/
function picShow(num)
{
	
	var url1=myPic1[num];
	var url2=myPic2[num];
	document.getElementById("show_img_1").style.backgroundImage="url("+url1+")";
	document.getElementById("show_img_2").style.backgroundImage="url("+url2+")";
	Image_num=num+1;
	for(var i=0;i<=3;i++)
	{
		if(i==num)
			document.getElementById("Link"+num).style.color="red";
		else
		{
			document.getElementById("Link"+i).style.color="";
		}
		
	}
	
	
	switch(num)
	{	
		case 0:
			if(timerId2)
				clearInterval(timerId2);
			 width1=125;
			 width2=125;
			document.getElementById("Resolution1").style.display="block";
			document.getElementById("reduce_num1").style.display="block";
			document.getElementById("jpegmini_info1").style.display="block";
			document.getElementById("origin_info1").style.display="block";
			
			document.getElementById("jpegmini_info1").style.width=125;
			document.getElementById("origin_info1").style.width=125;
			
			document.getElementById("Resolution2").style.display="none";
			document.getElementById("reduce_num2").style.display="none";
			document.getElementById("jpegmini_info2").style.display="none";
			document.getElementById("origin_info2").style.display="none";
			
			document.getElementById("Resolution3").style.display="none";
			document.getElementById("reduce_num3").style.display="none";
			document.getElementById("jpegmini_info3").style.display="none";
			document.getElementById("origin_info3").style.display="none";
			
			document.getElementById("Resolution4").style.display="none";
			document.getElementById("reduce_num4").style.display="none";
			document.getElementById("jpegmini_info4").style.display="none";
			document.getElementById("origin_info4").style.display="none";
			
			timerId2=setInterval("label_remove(1)",5);
			break;

		case 1:
			if(timerId2)
				clearInterval(timerId2);
			
			 width1=125;
			 width2=125;
			document.getElementById("Resolution1").style.display="none";
			document.getElementById("reduce_num1").style.display="none";
			document.getElementById("jpegmini_info1").style.display="none";
			document.getElementById("origin_info1").style.display="none";
			
			document.getElementById("Resolution2").style.display="block";
			document.getElementById("reduce_num2").style.display="block";
			document.getElementById("jpegmini_info2").style.display="block";
			document.getElementById("origin_info2").style.display="block";
			
			document.getElementById("jpegmini_info2").style.width=125;
			document.getElementById("origin_info2").style.width=125;
			
			document.getElementById("Resolution3").style.display="none";
			document.getElementById("reduce_num3").style.display="none";
			document.getElementById("jpegmini_info3").style.display="none";
			document.getElementById("origin_info3").style.display="none";
			
			document.getElementById("Resolution4").style.display="none";
			document.getElementById("reduce_num4").style.display="none";
			document.getElementById("jpegmini_info4").style.display="none";
			document.getElementById("origin_info4").style.display="none";
			
			timerId2=setInterval("label_remove(2)",5);
			
			break;
		
		case 2:
			if(timerId2)
				clearInterval(timerId2);
			 width1=125;
			 width2=125;
			document.getElementById("Resolution1").style.display="none";
			document.getElementById("reduce_num1").style.display="none";
			document.getElementById("jpegmini_info1").style.display="none";
			document.getElementById("origin_info1").style.display="none";
			
			document.getElementById("Resolution2").style.display="none";
			document.getElementById("reduce_num2").style.display="none";
			document.getElementById("jpegmini_info2").style.display="none";
			document.getElementById("origin_info2").style.display="none";
			
			document.getElementById("Resolution3").style.display="block";
			document.getElementById("reduce_num3").style.display="block";
			document.getElementById("jpegmini_info3").style.display="block";
			document.getElementById("origin_info3").style.display="block";
			
			document.getElementById("jpegmini_info3").style.width=125;
			document.getElementById("origin_info3").style.width=125;
			
			document.getElementById("Resolution4").style.display="none";
			document.getElementById("reduce_num4").style.display="none";
			document.getElementById("jpegmini_info4").style.display="none";
			document.getElementById("origin_info4").style.display="none";
			
			timerId2=setInterval("label_remove(3)",5);
			
			break;
		
		case 3:
			if(timerId2)
				clearInterval(timerId2);
			
			 width1=125;
			 width2=125;
			document.getElementById("Resolution1").style.display="none";
			document.getElementById("reduce_num1").style.display="none";
			document.getElementById("jpegmini_info1").style.display="none";
			document.getElementById("origin_info1").style.display="none";
			
			document.getElementById("Resolution2").style.display="none";
			document.getElementById("reduce_num2").style.display="none";
			document.getElementById("jpegmini_info2").style.display="none";
			document.getElementById("origin_info2").style.display="none";
			
			document.getElementById("Resolution3").style.display="none";
			document.getElementById("reduce_num3").style.display="none";
			document.getElementById("jpegmini_info3").style.display="none";
			document.getElementById("origin_info3").style.display="none";
			
			document.getElementById("Resolution4").style.display="block";
			document.getElementById("reduce_num4").style.display="block";
			document.getElementById("jpegmini_info4").style.display="block";
			document.getElementById("origin_info4").style.display="block";
			
			document.getElementById("jpegmini_info4").style.width=125;
			document.getElementById("origin_info4").style.width=125;
			
			timerId2=setInterval("label_remove(4)",5);
			
			break;
			
			
	}

	return false;

}
