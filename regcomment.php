<script type="text/javascript" language="javascript">
 function reloadycomment()//最好不要用reload这个关键字,因为很容易和其它函数冲突 
{ 
window.location.href="comment.php"; 
} 
function jumpcomment()
{
	window.setTimeout("reloadycomment();",2000); 
}
function jumpcommentnow()
{
	alert("评论成功");
	window.setTimeout("reloadycomment();",0); 
}
</script> 
<?php
require('config.db.utf8.php');
//如果PHP设置的自动转义函数未开启，就转义这些值
if(!get_magic_quotes_gpc()){
	foreach ($_POST as &$items){
		$items = addslashes($items);
	}
}
// trim()函数可以截去头尾的空白字符
$name   = trim($_POST['name']);
$email  = trim($_POST['email']);
$comment  = trim($_POST['comment']);

    // 数据验证, empty()函数判断变量内容是否为空
    if (empty($name) || empty($comment))
         {
        echo "用户名或者评论不能为空<br>\n";
      	echo '两秒钟后自动跳转。。。';
		echo("<script language='javascript'>");
		echo("jumpcomment()");
		echo("</script>");
    	}else{
			if(strlen($name)>20){
				echo "用户名过长<br>\n";
				echo '两秒钟后自动跳转。。。';
				echo("<script language='javascript'>");
				echo("jumpcomment()");
				echo("</script>");   
				exit;
			}
			if(strlen($comment)>800){
				echo "留言内容过长<br>\n";
				echo '两秒钟后自动跳转。。。';
				echo("<script language='javascript'>");
				echo("jumpcomment()");
				echo("</script>");   
				exit;
			}
    		// 与客户端验证Email时相同的正则表达式
			if(!empty($email)){
   			 $pattern = "/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
    		if (!preg_match($pattern, $email)) {
        		echo "Email格式不合法<br>\n";
				echo '两秒钟后自动跳转。。。';
				echo("<script language='javascript'>");
				echo("jumpcomment()");
				echo("</script>");   
				exit;
    		}
			}
        // 将留言信息插入数据库的comment表
        $sql = "INSERT INTO comment (name,email,content,content_time) VALUES";
        $sql .= "('$name','$email','$comment',NOW())";
        //echo $sql;
        $result =mysql_query($sql);
        if (!$result) {
        // 释放结果集
				mysql_free_result($result);
        echo '数据记录插入失败!';
		echo("<script language='javascript'>");
		echo("jumpcomment()");
		echo("</script>");
        exit;
        }else{
		echo("<script language='javascript'>");
		echo("jumpcommentnow()");
		echo("</script>"); 
		}
		}
?>
