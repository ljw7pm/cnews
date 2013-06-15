<?php
require_once("../global.php");
require_once(ADMIN_PATH.'inadmin.php');
require_once(ADMIN_PATH.'class/account.class.php');
require_once(INCLUDE_PATH.'pages.php');
session_start();
$account=new account();
$count=$account->countaccount();
$pagesize=5;
$page=new page($pagesize,$count);
$list=$page->show_page_result('admin');	
?>
<style type="text/css">
body{
font-family:"����";
font-size:12px;
margin:0;
padding:0;
text-align:center;
}
td{
font-family:"����";
font-size:12px;
text-align:center;
line-height:20px;
}
</style>
<div>
<body>
<?php 
	if($_GET['action']==""){
?>
<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF">
	<tr>
		<td width="20%" bgcolor="#DEECFB">���</td>
		<td width="20%" bgcolor="#DEECFB">�û���</td>
		<td width="20%" bgcolor="#DEECFB">����¼IP</td>
		<td width="20%" bgcolor="#DEECFB">����¼ʱ��</td>
		<td width="20%" bgcolor="#DEECFB">����</td>
	</tr>
	<?php 
	if($list){
		foreach($list as $key=>$value){
	?>
	
	<tr>
		<td bgcolor="#DEECFB"><?php echo $value[id]?></td>
		<td bgcolor="#DEECFB"><?php echo $value[admin_name]?></td>
		<td bgcolor="#DEECFB"><?php echo $value[last_ip]?></td>
		<td bgcolor="#DEECFB"><?php echo $value[add_date]?></td>
		<td bgcolor="#DEECFB"><a href="?id=<?php echo $value['id']?>&action=edit">�༭</a>|<a href="?id=<?php echo $value['id']?>&action=del">ɾ��</a></td>
	</tr>
		<?php
		  }
		 }
		?>
	<tr>
		<td colspan="5" align="center" bgcolor="#FFFFFF"><?php $page->show_page_way_1();?></td>
	</tr>
</table>

<?php
}
if($_GET['action']=="edit"&&$_GET['id'])
{
	$id=$_GET['id'];
?>
<form id="myForm" method="post" action="">
<table width="35%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF">
  <tr>
    <td width="26%" align="right" bgcolor="#DEECFB">�����룺</td>
    <td width="74%" bgcolor="#DEECFB"><input type="hidden" name="ids" value="<?php echo $id?>">
    <input name="passwordold" type="password" id="passwordold"></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#DEECFB">�����룺</td>
    <td bgcolor="#DEECFB"><input name="password" type="password" id="password"></td>
  </tr>
  <tr>
    <td bgcolor="#DEECFB">�ظ������룺</td>
    <td bgcolor="#DEECFB"><input name="passwordtwo" type="password" id="passwordtwo"></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#DEECFB"><label>
      <input type="submit" name="Submit" value="�ύ">  
      <input type="reset" name="reset" value="����">
    </label></td>
    </tr>
</table>
</form>
<?php
} 
if($_SERVER['REQUEST_METHOD']=='POST' && $id){
	$ids=$_POST['ids'];
	$passwordold=$_POST['passwordold'];
	$password=$_POST['password'];
	$passwordtwo=$_POST['passwordtwo'];
	if(empty($passwordold)) alert('������Ϊ��',1);
	if(empty($password)) alert('������Ϊ��',1);
	$account->editaccount($ids,$passwordold,$password,$passwordtwo);
}
if($_GET['action']=='del'){
	$id=$_GET['id'];
	$account->delaccount($id);
}
if($_GET['action']=='add'){
?>
<form id="myForm" method="post" action="">
<table width="35%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#FFFFFF">
  <tr>
    <td width="26%" align="right" bgcolor="#DEECFB">�û�����</td>
    <td width="74%" bgcolor="#DEECFB"><input name="adminname" type="text" id="adminname"></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#DEECFB">���룺</td>
    <td bgcolor="#DEECFB"><input name="password" type="password" id="password"></td>
  </tr>
  <tr>
    <td bgcolor="#DEECFB">�ظ����룺</td>
    <td bgcolor="#DEECFB"><input name="passwordtwo" type="password" id="passwordtwo"></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#DEECFB"><label>
      <input type="submit" name="Submit" value="�ύ">  
      <input type="reset" name="reset" value="����">
    </label></td>
    </tr>
</table>
</form>
<?php
}
if($_SERVER['REQUEST_METHOD']=='POST'){
	$adminname=$_POST['adminname'];
	$password=$_POST['password'];
	$passwordtwo=$_POST['passwordtwo'];
	if(empty($adminname)) alert('�û���Ϊ��',1);
	if(empty($password)) alert('����Ϊ��',1);
	if(empty($password)) alert('���ٴ�����Ϊ��',1);
	$account->addaccount($adminname,$password,$passwordtwo);
}
?>
</div>
</body>

