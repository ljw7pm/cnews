<?php
function writefile($filename,$data,$method="rb+",$iflock=1,$check=1,$chmod=1){
	$check && strpos($filename,'..')!==false && exit('Forbidden');
	touch($filename);
	$handle=fopen($filename,$method);
	if($iflock){
		flock($handle,LOCK_EX);
	}
	fwrite($handle,$data);
	if($method=="rb+") ftruncate($handle,strlen($data));
	fclose($handle);
	$chmod && @chmod($filename,0777);
}
function alert($string,$url="",$backtype=true){
	if($backtype){
		if($url !=""){
			$url=($url==1)?$_SERVER["HTTP_REFERER"]:$url;
			echo "<script type='text/javascript'>alert('".$string."');window.location.href='".$url."';</script>";
		}else{
			echo "<script type='text/javascript'>alert('".$string."');window.history.go(-1);</script>";
		}
	}else{
		echo "<script type='text/javascript'>alert('".$string."');window.close();</script>";
	}
}
// 格式化时间
function get_date($format,$timestamp = ''){
//	$offset = $setup['servertimezone'] == '111' ? 0 : $setup['servertimezone'];
	$timestamp = $timestamp ? $timestamp : time()+8*3600;
	return gmdate($format,$timestamp);
}
//检测图片格式
function valid_suffix($suffix,$valid_suffix){
	global $valid_suffix;
	if(in_array($suffix,$valid_suffix)){
		return true;
	}else{
		return false;
	}
}
?>