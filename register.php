<?php
session_start(); 
?>
<script type="text/javascript" language="javascript">
 function reloadyemain()//最好不要用reload这个关键字,因为很容易和其它函数冲突 
{ 
window.location.href="index.php"; 
} 
 function reloadregister()//最好不要用reload这个关键字,因为很容易和其它函数冲突 
{ 
window.location.href="register.html"; 
}

function jumpmain()
{
	window.setTimeout("reloadyemain();",2000); 
}
function jumpregister()
{
	window.setTimeout("reloadregister();",2000);
}
</script> 
<?php
// trim()函数可以截去头尾的空白字符
$username   = trim($_POST['username']);
$password   = $_POST['password'];
$cpassword 	= $_POST['cpassword'];
$email      = trim($_POST['email']);

    // 数据验证, empty()函数判断变量内容是否为空
    if (empty($username) || empty($email)
            || empty($password) || $cpassword != $password) {
        echo "数据输入不完整，或者两次输入的密码不一致<br>\n";
      	echo '两秒钟后自动跳转。。。';
		echo("<script language='javascript'>");
		echo("jumpregister()");
		echo("</script>");
    	}else{
    		//密码长度判断
    		if (strlen($password) < 6 || strlen($password) > 30) {
        		echo "密码必须在6到30个字符之间<br>\n";
        		echo '两秒钟后自动跳转。。。';
				echo("<script language='javascript'>");
				echo("jumpregister()");
				echo("</script>");
				exit;
    		}
    		// 与客户端验证Email时相同的正则表达式
   			 $pattern = "/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
    		if (!preg_match($pattern, $email)) {
        		echo "Email格式不合法!<br>\n";
				echo '两秒钟后自动跳转。。。';
				echo("<script language='javascript'>");
				echo("jumpregister()");
				echo("</script>");   
				exit;
    		}
   	// 创建数据库连接
		require('config.db.php');
		// 查询数据库，看填写的用户名是否已经存在
    	$sql = "SELECT * FROM `user` WHERE `username` = '".$username."'";
    	$result = mysql_query($sql);
    		if ($result && mysql_num_rows($result) > 0) {
        	echo "<font color='red' size='5'>该用户名已被注册，请换一个重试!</font><br>\n";
        	echo $username."<br>\n";
					echo $password."<br>\n";
					echo $cpassword."<br>\n";
					echo $email."<br>\n";
					echo("<script language='javascript'>");
					echo("jumpregister()");
					echo("</script>");
    		}else {
        // 将用户信息插入数据库的user表
        $sql = "INSERT INTO user (username, pwd,email,lasttime,regtime) VALUES";
        $sql .= "('$username', '$password', '$email',NOW(),NOW())";
        //echo $sql;
        $result =mysql_query($sql);
        if (!$result) {
        // 释放结果集
				mysql_free_result($result);
        echo '数据记录插入失败!';
		echo("<script language='javascript'>");
		echo("jumpregister()");
		echo("</script>");
        exit;
        }
         //标识登录状态true为已经登录
         $_SESSION['login'] = 'true';
         //记录该用户信息
         $_SESSION['user']=$username;
        echo "<font color='red' size='5'>恭喜您注册成功!</font><br>\n";
		echo '两秒钟后自动跳转。。。';
		echo("<script language='javascript'>");
		echo("jumpmain()");
		echo("</script>");
				}
			}
?>
