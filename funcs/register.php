<?php
header("content-Type: text/html; charset=utf-8");
session_start(); 
?>
<script type="text/javascript" language="javascript">

function jumplogin_jmpg(num)
{
	var msg2=num;
	window.location.href="../login-jmppg.php?msg="+msg2;//����ת��trunk�µĿ�����ʾע��ɹ���ҳ�档
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
        //echo "�������벻����������������������벻һ��<br>\n";
      	//echo '�����Ӻ��Զ���ת������';
		//�����������벻����Ҫ������ע��
		  echo("<script language='javascript'>");
		  echo("jumplogin_jmpg(2)");
		  echo("</script>");
    	}else{
    		//���볤���ж�
    		if (strlen($password) < 6 || strlen($password) > 30) {
        		//echo "���������6��30���ַ�֮��<br>\n";
        		//echo '�����Ӻ��Զ���ת������';
				//���볤�Ȳ�����Ҫ������ע��
				  echo("<script language='javascript'>");
				  echo("jumplogin_jmpg(3)");
				  echo("</script>");				
				exit;
    		}
    		// ��ͻ�����֤Emailʱ��ͬ��������ʽ
   			 $pattern = "/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
    		if (!preg_match($pattern, $email)) {
				//���䲻�Ϸ�������ע�� 
				  echo("<script language='javascript'>");
				  echo("jumplogin_jmpg(4)");
				  echo("</script>");				
				exit;
    		}
   	// �������ݿ�����
		require('../inc/config.db.php');
		// ��ѯ���ݿ⣬����д���û����Ƿ��Ѿ�����
    	$sql = "SELECT * FROM `user` WHERE `username` = '".$username."'";
    	$result = mysql_query($sql);
    		if ($result && mysql_num_rows($result) > 0) {
        	//echo "<font color='red' size='5'>���û����ѱ�ע�ᣬ�뻻һ������!</font><br>\n";
        	//echo $username."<br>\n";
					//echo $password."<br>\n";
					//echo $cpassword."<br>\n";
					//echo $email."<br>\n";
				//ע�����ظ�������ע��
				  echo("<script language='javascript'>");
				  echo("jumplogin_jmpg(5)");
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
		//ע��ɹ�����ת����Ϣ��ʾ����תҵ��
		echo("<script language='javascript'>");
		echo("jumplogin_jmpg(1)");
		echo("</script>");
		
				}
			}
?>
