<?php
//���ݿ�������Ϣ
define('DB_HOST', '127.0.0.1'); //���ݿ������������ַ    
define('DB_USER', 'root'); 			//���ݿ��ʺ�    
define('DB_PW', '123456'); 				//���ݿ�����    
define('DB_NAME', 'site'); //���ݿ���     
define('DB_CHARSET', 'utf8'); 	//���ݿ��ַ���    
define('DB_PCONNECT', 0); 			//0 ��1���Ƿ�ʹ�ó־�����    
define('DB_DATABASE', 'mysql'); //���ݿ�����  
$con=mysql_connect(DB_HOST,DB_USER,DB_PW) or die('�������ݿ�ʧ�ܣ�');
mysql_query("set names utf8");
//mysql_select_db(DB_NAME);
		$db=mysql_select_db(DB_NAME,$con);
		if (!$db)
		{
 			die ("Can\'t use site : " . mysql_error());
		}
?>
