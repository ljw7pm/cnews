<?php
class checklogin
{
	private $adminname;
	private $adminpwd;
	public function checkinput($adminname,$adminpwd){
		$this->adminname=$adminname;
		$this->adminpwd=$adminpwd;
		$rs=Mysql::getMysql();
		$sql="select * from admin where admin_name='".$this->adminname."' and admin_pass='".$this->adminpwd."'";
		$rs->query($sql);
		$userinfo=$rs->fecth_array_args();
		if($userinfo){
			$_SESSION['adminid']=$userinfo['id'];
			$_SESSION['adminname']=$userinfo['admin_name'];
			$_SESSION['adminpass']=$userinfo['admin_pass'];
			alert("��½�ɹ���","admin/index.php");
		}else{
			alert("�û������������");
			exit();
		}
	}
}
?>