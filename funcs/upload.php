<?php
header("content-Type: text/html; charset=gb2312");
session_start(); 
require('deldir.php');
?>
<script type="text/javascript" language="javascript">
 function reloadyemian()//最好不要用reload这个关键字,因为很容易和其它函数冲突 
{ 
window.location.href="../style-demo.php?id=<?php echo $_GET['id'] ?>"; 
} 
</script> 
<?php
$uptypes=array('image/jpg',  //上传文件类型列表
 'image/jpeg',
 'image/png',
 'image/pjpeg',
 //'image/gif',
 //'image/bmp',
 //'application/x-shockwave-flash',
 'image/x-png');
 //'application/msword',
 //'audio/x-ms-wma',
// 'audio/mp3',
 //'application/vnd.rn-realmedia',
 //'application/x-zip-compressed',
 //'application/octet-stream'
 // 创建数据库连接
require('../inc/config.db.php');
mysql_query("set names gb2312");

function _redirect($msg)
{
echo "<br>三秒钟后自动跳转。。<br>";
echo "<script language=\"javascript\"> ";
echo $msg;
echo " </script>";
exit;
}


$sql = "SELECT alname FROM album WHERE id = '".$_GET['id']."'";
$albumqry = mysql_query($sql);
$albumnm = mysql_fetch_array($albumqry);

$alpicnumsql = "SELECT id FROM picture WHERE albumid = '".$_GET['id']."'";
$alpicnumqry = mysql_query($alpicnumsql);
$alpicnum = mysql_num_rows($alpicnumqry);
echo $alpicnum;
if ($alpicnum >= 20)
{
     echo "<font color='red'>专辑图片数量必须小于20张，请新建专辑！</a>";
_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
}
$max_file_size=2000000;   //上传文件大小限制, 单位BYTE
$path_parts=pathinfo($_SERVER['PHP_SELF']); //取得当前路径
$destination_folder="../user/".$_SESSION['user']."/".$albumnm[0]."/temp/"; //上传文件路径
$destfinal = "../user/".$_SESSION['user']."/".$albumnm[0]."/";
$imgpreview=1;   //是否生成预览图(1为生成,其他为不生成);
$imgpreviewsize=1/3;  //缩略图比例



$file=&$HTTP_POST_FILES['userfile']; 
// var_dump ($file);
$file["name"]=iconv("utf-8","gbk",$file["name"]);
//echo $file["name"];
//exit;
 if($max_file_size < $file["size"])
 //检查文件大小
 {
 echo "<font color='red'>文件太大，请将图片文件大小限定于2M以内！</font>";
_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
  }

if(!in_array($file["type"], $uptypes))
//检查文件类型
{
 echo "<font color='red'>不能上传此类型文件！</font>";
_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
}
//检查上传目录是否存在，如果不存在则创建
if(!file_exists($destination_folder)){
mkdir($destination_folder);
}
$filename=$file["tmp_name"];
//echo $filename;
//echo $file[name];
$image_size = getimagesize($filename);
$pinfo=pathinfo($file["name"]);
//echo $pinfo[1]."ddddd";
$ftype=$pinfo[extension];
$destination = $destination_folder.$file[name];
//echo $destination;
//$fname = time().".".$ftype;
$fname = $file[name];
if (file_exists($destination) && $overwrite != true)
{
     echo "<font color='red'>同名文件已经存在了！</a>";
_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
  }

 if(!move_uploaded_file ($filename, $destination))
 {
   echo "<font color='red'>移动文件出错！</a>";
_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
 }else
 {
  	//添加写入数据库的部分
		$idsql = "SELECT `id` FROM `user` WHERE `username` = '".$_SESSION['user']."'";
		$userid = mysql_query($idsql);
		if($userid)
		{
	      // 将用户信息插入数据库的picture表
		  $row = mysql_fetch_array($userid, MYSQL_NUM);
		  $uid = $row[0];
       $sql = "INSERT INTO `site`.`picture` (`id` ,`userid`,`filename` ,`des` ,`fsize` ,`ftype` ,`utime`,`albumid` )VALUES (NULL ,'".$uid."', '".$fname."' , '', '".$file["size"]."', '".$file["type"]."',NOW(),'".$_GET['id']."');";
       $result =mysql_query($sql);
	   
        if (!$result) {
        // 释放结果集
				mysql_free_result($result);
				mysql_free_result($userid);
				// 关闭连接
				//mysql_close($db);
				echo '数据记录插入失败!';
				_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
			}
		}
		else
		{
			echo '查询用户id失败！';
			_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
		}
}
$pinfo=pathinfo($destination);
$fname=$pinfo[basename];
echo " 宽度:".$image_size[0];
echo " 长度:".$image_size[1];
if($watermark==1)
{
$iinfo=getimagesize($destination,$iinfo);
$nimage=imagecreatetruecolor($image_size[0],$image_size[1]);
$white=imagecolorallocate($nimage,255,255,255);
$black=imagecolorallocate($nimage,0,0,0);
$red=imagecolorallocate($nimage,255,0,0);
imagefill($nimage,0,0,$white);
switch ($iinfo[2])
{
 case 1:
 $simage =imagecreatefromgif($destination);
 break;
 case 2:
 $simage =imagecreatefromjpeg($destination);
 break;
 case 3:
 $simage =imagecreatefrompng($destination);
 break;
 case 6:
 $simage =imagecreatefromwbmp($destination);
 break;
 default:
 die("<font color='red'>不能上传此类型文件！</a>");
 _redirect("window.setTimeout(\"reloadyemian();\",3000);" );
}

imagecopy($nimage,$simage,0,0,0,0,$image_size[0],$image_size[1]);
imagefilledrectangle($nimage,1,$image_size[1]-15,80,$image_size[1],$white);


switch ($iinfo[2])
{
 case 1:
 //imagegif($nimage, $destination);
 imagejpeg($nimage, $destination);
 break;
 case 2:
 imagejpeg($nimage, $destination);
 break;
 case 3:
 imagepng($nimage, $destination);
 break;
 case 6:
 imagewbmp($nimage, $destination);
 //imagejpeg($nimage, $destination);
 break;
}

//覆盖原上传文件
imagedestroy($nimage);
imagedestroy($simage);
}

$imasrc = $destfinal.$file["name"];
if($imgpreview==1)
{
echo "<br>图片预览:<br>";
echo "<a href=\"".$destination."\" target='_blank'><img src=\"".$imasrc."\" width=".($image_size[0]*$imgpreviewsize)." height=".($image_size[1]*$imgpreviewsize);
echo " alt=\"图片预览:\r文件名:".$fname."\r上传时间:".date('m/d/Y h:i')."\" border='0'></a>";
}
exec("D:\\Pack\\JPGOpt.exe  ".$destination_folder." ".$destfinal."compressed\\"." Pack\\log.txt 2 0",$ss); 

	  $renam = $destfinal."compressed\\".$file["name"];
	  $reinfo = pathinfo($renam);
	  $bsname = basename($renam,".".$reinfo[extension]);
	  
if(file_exists($destfinal."compressed\\".$bsname."_mini.".$reinfo[extension]))
{
	unlink($destfinal."compressed\\".$bsname."_mini.".$reinfo[extension]);
}

rename($destfinal."compressed\\".$file["name"],$destfinal."compressed\\".$bsname."_mini.".$reinfo[extension]);
copy($destination_folder.$file["name"],$destfinal.$file["name"]);
deldir($destination_folder);
_redirect("window.setTimeout(\"reloadyemian();\",3000);" );
?>
