<?php 
require_once("global.php");
require_once(ADMIN_PATH."class/checklogin.class.php");
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$adminname=$_POST['adminname'];
	$adminpwd=md5($_POST['adminpwd']);
	$admincode=strtolower($_POST['admincode']);
	if($admincode != strtolower($_SESSION["VerifyCode"])){
		alert('��֤�����');
		exit();
	}
	$user=new checklogin();
	$user->checkinput($adminname,$adminpwd);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û���¼</title>
<head>
<script type="text/javascript" src="<?php echo $config['jsURL']?>/jquery-1.4.2.min.js"></script>
<script language="javascript" src="<?php echo  $config['jsURL']?>/base.js"></script>
<link type="text/css" href="<?php echo  $config['cssURL']?>/admincss.css" rel="stylesheet" />
<style type="text/css">
#result{
color:red;
}
.error{
color:red;
}
</style>
</head>
<body>
<div class="login">
	<form id="myForm" method="post">
	<div class="login_input"><span>
	�û�����<input class="require" name="adminname" type="text" size="9" />
	���룺<input class="require"  name="adminpwd" type="password" size="9" />
	��֤�룺<input class="require"  name="admincode" type="text" size="9">
    <img id="code" src="function/create_code.php" alt="�����������һ��" style="cursor: pointer; vertical-align:middle;" onClick="create_code()"/></span>
	<div class="login_post"><input type="button" value="�� ��" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="�� ��" /></div>
	</form>
</div>
<script type="text/javascript">
$(document).ready(function()
{
	$('input:first').focus();
	var dataValid=true;
	$('input:button').click(function(){
		$('.require').each(function()
	   {
		var cur=$(this);
		cur.next('span').remove();
		if($.trim(cur.val())=='')
		{
			cur.after('<span class="error">����Ϊ��</span>');
			dataValid=false;
			return;
		}
		if(dataValid)
		{
			$('#myForm').submit();
		}
	});
	});
	/*$('input:button').click(function()
	{
		if(dataValid)
		{
			$('#myForm').submit();
		}
	});*/
});
</script>
</body>
