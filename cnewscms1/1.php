<?php
$config_data=substr('Áº¼ÒÍúÄãºÃ',0,-2);
echo $config_data."</br>";
$url=$_SERVER['REQUEST_URI'];
echo $url."</br>";
$host=$_SERVER['HTTP_HOST'];
echo $host."</br>";
$path=parse_url($url);
print_r($path)."</br>";
$path=$path[path];
echo "$path";
?>