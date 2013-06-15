<?php 
require_once("../global.php");
require_once(ADMIN_PATH.'class/inadmin.class.php');
session_start();
//判断是否是登录状态
if(!empty($_SESSION['adminname']) && !empty($_SESSION['adminpass'])){
		$inadmin=new inadmin();
		$inadmin->isLogin($_SESSION['adminname'],$_SESSION['adminpass']);
}else{
		$_SESSION['adminid']=="";
		$_SESSION['adminname']=="";
		$_SESSION['adminpass']=="";
		session_destroy();
		alert("成功退出！","ROOT_PATH.'login.php'");
		exit();
}
//注销登录
if($_GET['action']=="logout"){
	$_SESSION['adminid']=="";
	$_SESSION['adminname']=="";
	$_SESSION['adminpass']=="";
	session_destroy();
    alert("成功退出！","ROOT_PATH.'login.php'");
}
?>