<?php
session_start(); 
?>
<script type="text/javascript" language="javascript">
 function reloadyemain()//��ò�Ҫ��reload����ؼ���,��Ϊ�����׺�����������ͻ 
{ 
window.location.href="index.php"; 
} 
 function reloadregister()//��ò�Ҫ��reload����ؼ���,��Ϊ�����׺�����������ͻ 
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
// trim()�������Խ�ȥͷβ�Ŀհ��ַ�
$username   = trim($_POST['username']);
$password   = $_POST['password'];
$cpassword 	= $_POST['cpassword'];
$email      = trim($_POST['email']);

    // ������֤, empty()�����жϱ��������Ƿ�Ϊ��
    if (empty($username) || empty($email)
            || empty($password) || $cpassword != $password) {
        echo "�������벻����������������������벻һ��<br>\n";
      	echo '�����Ӻ��Զ���ת������';
		echo("<script language='javascript'>");
		echo("jumpregister()");
		echo("</script>");
    	}else{
    		//���볤���ж�
    		if (strlen($password) < 6 || strlen($password) > 30) {
        		echo "���������6��30���ַ�֮��<br>\n";
        		echo '�����Ӻ��Զ���ת������';
				echo("<script language='javascript'>");
				echo("jumpregister()");
				echo("</script>");
				exit;
    		}
    		// ��ͻ�����֤Emailʱ��ͬ��������ʽ
   			 $pattern = "/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
    		if (!preg_match($pattern, $email)) {
        		echo "Email��ʽ���Ϸ�!<br>\n";
				echo '�����Ӻ��Զ���ת������';
				echo("<script language='javascript'>");
				echo("jumpregister()");
				echo("</script>");   
				exit;
    		}
   	// �������ݿ�����
		require('config.db.php');
		// ��ѯ���ݿ⣬����д���û����Ƿ��Ѿ�����
    	$sql = "SELECT * FROM `user` WHERE `username` = '".$username."'";
    	$result = mysql_query($sql);
    		if ($result && mysql_num_rows($result) > 0) {
        	echo "<font color='red' size='5'>���û����ѱ�ע�ᣬ�뻻һ������!</font><br>\n";
        	echo $username."<br>\n";
					echo $password."<br>\n";
					echo $cpassword."<br>\n";
					echo $email."<br>\n";
					echo("<script language='javascript'>");
					echo("jumpregister()");
					echo("</script>");
    		}else {
        // ���û���Ϣ�������ݿ��user��
        $sql = "INSERT INTO user (username, pwd,email,lasttime,regtime) VALUES";
        $sql .= "('$username', '$password', '$email',NOW(),NOW())";
        //echo $sql;
        $result =mysql_query($sql);
        if (!$result) {
        // �ͷŽ����
				mysql_free_result($result);
        echo '���ݼ�¼����ʧ��!';
		echo("<script language='javascript'>");
		echo("jumpregister()");
		echo("</script>");
        exit;
        }
         //��ʶ��¼״̬trueΪ�Ѿ���¼
         $_SESSION['login'] = 'true';
         //��¼���û���Ϣ
         $_SESSION['user']=$username;
        echo "<font color='red' size='5'>��ϲ��ע��ɹ�!</font><br>\n";
		echo '�����Ӻ��Զ���ת������';
		echo("<script language='javascript'>");
		echo("jumpmain()");
		echo("</script>");
				}
			}
?>
