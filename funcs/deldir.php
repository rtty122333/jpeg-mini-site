<?php
	function deldir($dir) {
  //��ɾ��Ŀ¼�µ��ļ���
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
  //ɾ����ǰ�ļ��У�
  		if(rmdir($dir)) {
   		 return true;
		  } else {
  		  return false;
 		 }
	}
 ?>