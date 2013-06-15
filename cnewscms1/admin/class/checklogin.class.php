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
			alert("登陆成功！","admin/index.php");
		}else{
			alert("用户名或密码错误！");
			exit();
		}
	}
}
?>