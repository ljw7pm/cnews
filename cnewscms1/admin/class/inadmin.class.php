<?php 
class inadmin{
	private $adminname;
	private $adminpass;
	function isLogin($adminname,$adminpass){
		$this->adminname=$adminname;
		$this->adminpass=$adminpass;
		$rs=Mysql::getMysql();
		$sql="select * from admin where admin_name='".$this->adminname."'";
		$rs->query($sql);
		$admin=$rs->fecth_array_args();
		if($admin['admin_pass'] !=$this->adminpass){
			$_SESSION['id']=="";
			$_SESSION['adminname']=="";
			$_SESSION['adminpass']=="";
			session_destroy();
			exit();
		}
	}
}
?>