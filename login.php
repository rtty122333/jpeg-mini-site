<?php
//ȡ�ÿͻ����ύ���û���
$username = trim($_POST['username']);
// ȡ�ÿͻ����ύ������
$password = trim($_POST['pwd']);
// ����һ��������Ϣ�������Ա��ж��Ƿ��д�����
// �Լ��ڿͻ�����ʾ������Ϣ�� ���ֵΪ��
$errmsg = '';
if (!empty($username)) {  // �û���д�����ݲ�ִ�����ݿ����
    // ������֤, empty()�����жϱ��������Ƿ�Ϊ��
    if (empty($username)) {
        $errmsg = '�������벻����';
    }
    if(empty($errmsg)) { // $errmsgΪ��˵��ǰ�����֤ͨ��
   		// �������ݿ�����
		require('config.db.php');
        // ������ݿ�����
        if (mysqli_connect_errno()) {
            $errmsg = "���ݿ�����ʧ��!\n";
        }
        else {
            // ��ѯ���ݿ⣬���û����������Ƿ���ȷ
            $sql = "SELECT * FROM user WHERE username='$username' AND pwd='$password'";
            $result = mysql_query($sql);
            // $result = mysql_query($sql);�ж������ִ�н���Ƿ��м�¼���м�¼˵����¼�ɹ�
           if ($result && mysql_num_rows($result) > 0) {              
                // ��ʵ��Ӧ���п���ʹ��ǰ���ᵽ���ض�����ת����ҳ
                $errmsg = "��¼�ɹ�!";
								//ע��session����
                session_start();
                //��ʶ��¼״̬trueΪ�Ѿ���¼
                $_SESSION['login'] = 'true';
                //��¼���û���Ϣ
               	$_SESSION['user']=$username;
                // ��ʵ��Ӧ���п���ʹ��ǰ���ᵽ���ض�����ת����ҳ
	          	}else {
                $errmsg = "�û��������벻��ȷ����¼ʧ��!";
            }
   
         // �ͷ���Դ
        mysql_free_result($result);
        }
    }
}
?>

<script type="text/javascript" language="javascript">
 function reloadyemain()//��ò�Ҫ��reload����ؼ���,��Ϊ�����׺�����������ͻ 
{ 
window.location.href="index.php"; 
} 
alert("<?php echo "�û���".$username."".$errmsg?>");
window.setTimeout("reloadyemain();",0); 
</script> 
