<?php
//取得客户端提交的用户名
$username = trim($_POST['username']);
// 取得客户端提交的密码
$password = trim($_POST['pwd']);
// 设置一个错误消息变量，以便判断是否有错误发生
// 以及在客户端显示错误消息。 其初值为空
$errmsg = '';
if (!empty($username)) {  // 用户填写了数据才执行数据库操作
    // 数据验证, empty()函数判断变量内容是否为空
    if (empty($username)) {
        $errmsg = '数据输入不完整';
    }
    if(empty($errmsg)) { // $errmsg为空说明前面的验证通过
   		// 创建数据库连接
		require('../inc/config.db.php');
        // 检查数据库连接
        if (mysqli_connect_errno()) {
            $errmsg = "数据库连接失败!\n";
        }
        else {
            // 查询数据库，看用户名及密码是否正确
            $sql = "SELECT * FROM user WHERE username='$username' AND pwd='$password'";
            $result = mysql_query($sql);
            // $result = mysql_query($sql);判断上面的执行结果是否含有记录，有记录说明登录成功
           if ($result && mysql_num_rows($result) > 0) {              
                // 在实际应用中可以使用前面提到的重定向功能转到主页
                $errmsg = "登录成功!";
								//注册session变量
                session_start();
                //标识登录状态true为已经登录
                $_SESSION['login'] = 'true';
                //记录该用户信息
               	$_SESSION['user']=$username;
                // 在实际应用中可以使用前面提到的重定向功能转到主页
	          	}else {
                $errmsg = "用户名或密码不正确，登录失败!";
            }
   
         // 释放资源
        mysql_free_result($result);
        }
    }
}
?>

<script type="text/javascript" language="javascript">
 function reloadyemain()//最好不要用reload这个关键字,因为很容易和其它函数冲突 
{ 
window.location.href="../albumlist.php"; 
} 
alert("<?php echo "用户：".$username."".$errmsg?>");
window.setTimeout("reloadyemain();",0); 
</script> 
