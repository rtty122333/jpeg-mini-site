<script type="text/javascript" language="javascript">
 function reloadycomment()//��ò�Ҫ��reload����ؼ���,��Ϊ�����׺�����������ͻ 
{ 
window.location.href="comment.php"; 
} 
function jumpcomment()
{
	window.setTimeout("reloadycomment();",2000); 
}
function jumpcommentnow()
{
	alert("���۳ɹ�");
	window.setTimeout("reloadycomment();",0); 
}
</script> 
<?php
require('config.db.utf8.php');
//���PHP���õ��Զ�ת�庯��δ��������ת����Щֵ
if(!get_magic_quotes_gpc()){
	foreach ($_POST as &$items){
		$items = addslashes($items);
	}
}
// trim()�������Խ�ȥͷβ�Ŀհ��ַ�
$name   = trim($_POST['name']);
$email  = trim($_POST['email']);
$comment  = trim($_POST['comment']);

    // ������֤, empty()�����жϱ��������Ƿ�Ϊ��
    if (empty($name) || empty($comment))
         {
        echo "�û����������۲���Ϊ��<br>\n";
      	echo '�����Ӻ��Զ���ת������';
		echo("<script language='javascript'>");
		echo("jumpcomment()");
		echo("</script>");
    	}else{
			if(strlen($name)>20){
				echo "�û�������<br>\n";
				echo '�����Ӻ��Զ���ת������';
				echo("<script language='javascript'>");
				echo("jumpcomment()");
				echo("</script>");   
				exit;
			}
			if(strlen($comment)>800){
				echo "�������ݹ���<br>\n";
				echo '�����Ӻ��Զ���ת������';
				echo("<script language='javascript'>");
				echo("jumpcomment()");
				echo("</script>");   
				exit;
			}
    		// ��ͻ�����֤Emailʱ��ͬ��������ʽ
			if(!empty($email)){
   			 $pattern = "/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/";
    		if (!preg_match($pattern, $email)) {
        		echo "Email��ʽ���Ϸ�<br>\n";
				echo '�����Ӻ��Զ���ת������';
				echo("<script language='javascript'>");
				echo("jumpcomment()");
				echo("</script>");   
				exit;
    		}
			}
        // ��������Ϣ�������ݿ��comment��
        $sql = "INSERT INTO comment (name,email,content,content_time) VALUES";
        $sql .= "('$name','$email','$comment',NOW())";
        //echo $sql;
        $result =mysql_query($sql);
        if (!$result) {
        // �ͷŽ����
				mysql_free_result($result);
        echo '���ݼ�¼����ʧ��!';
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
