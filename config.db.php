<?php
//数据库配置信息
define('DB_HOST', '127.0.0.1'); //数据库服务器主机地址    
define('DB_USER', 'root'); 			//数据库帐号    
define('DB_PW', '123456'); 				//数据库密码    
define('DB_NAME', 'site'); //数据库名     
define('DB_CHARSET', 'utf8'); 	//数据库字符集    
define('DB_PCONNECT', 0); 			//0 或1，是否使用持久连接    
define('DB_DATABASE', 'mysql'); //数据库类型  
$con=mysql_connect(DB_HOST,DB_USER,DB_PW) or die('链接数据库失败！');
mysql_query("set names gb2312");
//mysql_select_db(DB_NAME);
		$db=mysql_select_db(DB_NAME,$con);
		if (!$db)
		{
 			die ("Can\'t use site : " . mysql_error());
		}
?>
