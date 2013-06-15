<?php


require('config.php');
require('include.php');



if($_FILES['uploadimg']['error']>0){
    $uploadtype = false;
    switch($_FILES['uploadimg']['error']){
	    case 1:$errormsg = $message['error1'];break;
		case 2:$errormsg = $message['error2'];break;
		case 3:$errormsg = $message['error3'];break;
		case 4:$errormsg = $message['error4'];
	}
}

$suffix = strtolower(substr($_FILES['uploadimg']['name'],-4));
if(!valid_suffix($suffix)){
    $uploadtype = false;
	$errormsg = $message['error_valid'];
}


if($uploadtype === false){


}else{

/////////////////REMOVE////////////////
$userip = ip2long($_SERVER['REMOTE_ADDR']);
$time = time();
$newpath = UPLOAD_DIR . $time .'x'. $userip . $suffix;
if(is_uploaded_file($_FILES['uploadimg']['tmp_name'])){
    if(!move_uploaded_file($_FILES['uploadimg']['tmp_name'],$newpath)){
	    $uploadtype = false;
		$errormsg = $message['error_uploaded'];
	}else{
	    $uploadtype = true;
	}
}else{
    $uploadtype = false;
	$errormsg = $message['error_uploaded'];
}
/////////////////END_REMOVE////////////

}



if($uploadtype === false){
    //echo 'Error:'.$errormsg;
	//header('Location:'.SITE_DIR.'?error='.urlencode($errormsg));
}else{
    setcookie('uploaded',$time.'x'.$userip.$suffix.'|'.$_COOKIE['uploaded'],time()+3600*24*365);
	//header('Location:'.SITE_DIR.'?url='.urlencode($time.'x'.$userip.$suffix));
    //echo 'Your file URL: '.SITE_DIR.$newpath;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=SITE_NAME?> - <?=SITE_ADV?></title>
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<div id="logo">
	<h1><a href="<?=SITE_DIR?>"><?=SITE_NAME?></a></h1>
	<p><?=SITE_ADV?></p>
</div>
<div id="menu">
	<ul>
		<li class="current_page_item"><a href="<?=SITE_DIR?>#upload"><?=$message['message']?></a></li>
		<li><a href="<?=SITE_DIR?>#histroy"><?=$message['upload_histroy']?></a></li>
		<li><a href="<?=SITE_DIR?>#terms"><?=$message['terms']?></a></li>	
	</ul>
</div>



<div id="page">
	<div id="page-bg">
		<div id="latest-post">
<?php
if($uploadtype === false){
?>
<p>
<strong>错误</strong><br />
<font color="#FF0000"><?=$errormsg?></font><br />
<a href="<?=SITE_DIR?>">&laquo; 返回</a>
</p>
<?php
}else{
?>
<p>
<strong><?=$message['success']?></strong>
你能使用这张图片的地址 URL: (<a href="<?=SITE_DIR.$newpath?>" target="_blank">新窗口打开浏览 &raquo;</a>)<br /><br />
<?=SITE_DIR.UPLOAD_DIR.$_GET['url']?><br />
地址 :<input value="<?=SITE_DIR.$newpath?>" style="width:500px;" onclick="this.select();" /><br />
论坛代码: <input value="[img]<?=SITE_DIR.$newpath?>[/img]" style="width:500px;" onclick="this.select();" /><br />
HTML代码: <input value="<img src=<?=SITE_DIR.$newpath?> />" style="width:500px;" onclick="this.select();" /><br /><br />
<a href="<?=SITE_DIR?>">&laquo;上传另一张</a>
</p>
<?php
}
?>
		</div>



		<div style="clear: both;">&nbsp;</div>

	</div>
</div>


<div id="footer">
	<p>Copyright 2006-2008 Powered by upload.360mf.cn All Rights Reserved.  <script src='http://s99.cnzz.com/stat.php?id=615368&web_id=615368' language='JavaScript' charset='gb2312'></script></p>
</div>
</body>
</html>
