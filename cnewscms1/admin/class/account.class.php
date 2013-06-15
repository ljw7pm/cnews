<?php
class account{
	private $rs;
	private $id;
	private $adminname;
	private $password;
	private $passwordold;
	private $passwordtwo;
	public function __construct(){
		$this->rs=Mysql::getMysql();
	}
	public function countaccount(){
		$sql="select * from admin";
		$this->rs->query($sql);
		$count=$this->rs->num_rows();
		return $count;
	}
	public function addaccount($adminname,$password,$passwordtwo){
		$this->adminname=$adminname;
		$this->password=md5($password);
		$this->passwordtwo=md5($passwordtwo);
		$time=date('Y-m-d',time());
		if($this->password != $this->passwordtwo){
			alert('两次新密码不一样！',1);
			exit();
		}
		//$this->group=$group;
		$sql="insert into admin (admin_name,admin_pass,admin_group,add_date) values ('".$this->adminname."','".$this->password."','1','".$time."')";
		$result=$this->rs->query($sql);
		if($result){
			alert('添加成功！','account.php');
			exit();
		}else{
			alert('添加失败！',1);
			exit();
		}
	}
	public function getid($id){
		$this->id=$id;
		$this->table=$table;
		$sql="select admin_name from admin where id=$this->id";
		$this->rs->query($sql);
		$result=$this->rs->fecth_array_args();
		return $result;
	}
	public function editaccount($ids,$passwordold,$password,$passwordtwo){
		$this->id=$ids;
		$this->passwordold=md5($passwordold);
		$this->password=md5($password);
		$this->passwordtwo=md5($passwordtwo);
		if($this->password != $this->passwordtwo){
			alert('两次新密码不一样！',1);
			exit();
		}
		$sql="SELECT admin_pass from admin WHERE id=$this->id";
		$this->rs->query($sql);
		$result=$this->rs->fecth_array_args();
		if($result['admin_pass']!=$this->passwordold){
			alert('旧密码不正确！',1);
			exit();
		}else{
			$sqlr="UPDATE admin SET admin_pass='".$this->password."' WHERE id='".$this->id."'";
			if($this->rs->query($sqlr)){
				alert('更新密码成功！','account.php');
			}
			
		}
	}
	public function delaccount($id){
		$this->id=$id;
		$sql="DELETE from admin WHERE id='".$this->id."'";
		if($this->rs->query($sql)){
			alert('删除成功！',1);
		}
	}
}
?>