<?php
require_once('inadmin.php');
?>
<?php echo "������".$_SERVER['SERVER_NAME']."&nbsp;&nbsp;IP��".getenv('REMOTE_ADDR');?>
<?php echo "</br>�˿ڣ�".getenv('SERVER_PORT');?>
<?php echo "</br>����������ϵͳ:".PHP_OS;?>
<?php echo "</br>web�������汾:".$_SERVER['SERVER_SOFTWARE'];?>
<?php echo "</br>PHP�汾:".PHP_VERSION;?>
<?php echo "</br>����������:".getenv('HTTP_ACCEPT_LANGUAGE');?>
<?php echo "</br>zend�汾:".ZEND_VERSION();?>
