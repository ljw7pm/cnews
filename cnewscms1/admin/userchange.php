<?php
require_once("userchange.php");
$pwd="807060";
$change=new UserChange("JOM");
$name=$change->getName();//�ֱ���÷�����ȡ����
$age=$change->getAge();
$leve=$change->getLeve();
echo "$name,$age,$leve<br>";
$result=$change->SetUserPassword($pwd);
if($result){
	echo "you password be change to:".$change->getPassword();
	}
?>