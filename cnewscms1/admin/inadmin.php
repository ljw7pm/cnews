<?php 
require_once("../global.php");
require_once(ADMIN_PATH.'class/inadmin.class.php');
session_start();
//�ж��Ƿ��ǵ�¼״̬
if(!empty($_SESSION['adminname']) && !empty($_SESSION['adminpass'])){
		$inadmin=new inadmin();
		$inadmin->isLogin($_SESSION['adminname'],$_SESSION['adminpass']);
}else{
		$_SESSION['adminid']=="";
		$_SESSION['adminname']=="";
		$_SESSION['adminpass']=="";
		session_destroy();
		alert("�ɹ��˳���","ROOT_PATH.'login.php'");
		exit();
}
//ע����¼
if($_GET['action']=="logout"){
	$_SESSION['adminid']=="";
	$_SESSION['adminname']=="";
	$_SESSION['adminpass']=="";
	session_destroy();
    alert("�ɹ��˳���","ROOT_PATH.'login.php'");
}
?>