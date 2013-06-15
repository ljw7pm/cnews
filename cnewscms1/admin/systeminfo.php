<?php
require_once('inadmin.php');
?>
<?php echo "域名：".$_SERVER['SERVER_NAME']."&nbsp;&nbsp;IP：".getenv('REMOTE_ADDR');?>
<?php echo "</br>端口：".getenv('SERVER_PORT');?>
<?php echo "</br>服务器操作系统:".PHP_OS;?>
<?php echo "</br>web服务器版本:".$_SERVER['SERVER_SOFTWARE'];?>
<?php echo "</br>PHP版本:".PHP_VERSION;?>
<?php echo "</br>服务器语言:".getenv('HTTP_ACCEPT_LANGUAGE');?>
<?php echo "</br>zend版本:".ZEND_VERSION();?>
