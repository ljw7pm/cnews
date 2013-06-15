<?php 
require_once("../global.php");
require_once(ADMIN_PATH.'inadmin.php');
require_once(ADMIN_PATH.'class/account.class.php');
if(!$_GET['id'])
	$id=0;
else 
	$id=$_GET['id'];
session_start();
$account=new account();
if($_SERVER['REQUEST_METHOD']=="POST"){
	$ids=$_POST['ids'];
	$passwordold=md5($_POST['passwordold']);
	$password=md5($_POST['password']);
	$passwordtwo=md5($_POST['passwordtwo']);
	$account->editaccount($ids,$passwordold,$password,$passwordtwo);
}
?>
<form id="myForm"  action="" method="post">
<table width="35%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF">
  <tr>
    <td width="26%" align="right" bgcolor="#DEECFB">旧密码：</td>
    <td width="74%" bgcolor="#DEECFB"><input type="hidden" name="ids" id="ids" value="<?php echo $id?>" />
      <input name="passwordold" type="password" id="passwordold"></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#DEECFB">新密码：</td>
    <td bgcolor="#DEECFB"><input name="password" type="password" id="password"></td>
  </tr>
  <tr>
    <td bgcolor="#DEECFB">重复新密码：</td>
    <td bgcolor="#DEECFB"><input name="passwordtwo" type="password" id="passwordtwo"></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#DEECFB"><label>
      <input type="submit" name="Submit" value="提交">  
    </label></td>
    </tr>
</table>
</form>