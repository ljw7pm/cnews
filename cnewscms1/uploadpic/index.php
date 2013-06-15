<?php
require('config.php');
require('include.php');
v();
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
		<li class="current_page_item"><a href="#upload"><?=$message['message']?></a></li>
		<li><a href="#histroy"><?=$message['upload_histroy']?></a></li>
		<li><a href="#terms"><?=$message['terms']?></a></li>
		<li><a href="cha.asp"></a></li>
		<li><a href="http://www.360mf.cn"></a></li>	
	</ul>
</div>



<div id="page">
	<div id="page-bg">
		<div id="latest-post">
			<h1><?=$message['message']?></h1>
<script type="text/javascript"><!--
google_ad_client = "pub-7033139945743848";
/* 468x60, 图片广告 */
google_ad_slot = "3368959977";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
			<p><?=$message['info']?></p>
			<p>
			<form enctype="multipart/form-data" action="upload.php" method="post">
			    <input type="hidden" name="MAX_FILE_SIZE" value="<?=MAX_SIZE?>" />
				<input type="file" name="uploadimg" />
				<input type="submit" value="<?=$message['submit']?>" />
			</form>
			</p>			
		</div>



		<div id="content">
			<div class="post">
				<div class="entry">
				    <a name="histroy"></a><!--<?=$_COOKIE['upload']?>-->
					<h2><?=$message['upload_histroy']?></h2>
					<ul>
<?php
if(!empty($_COOKIE['upload'])){
    $uploadfiles = explode('|',$_COOKIE['upload']);
    foreach($uploadfiles as $key){
	    if(!empty($key)){
?>
<li><a href="<?=SITE_DIR.UPLOAD_DIR.$key?>" target="_blank"><?=SITE_DIR.UPLOAD_DIR.$key?></a></li>
<?php
        }
    }
}else{
?>
<li><?=$message['error_nofile']?></li>
<?php
}
?>
					</ul>
				</div>
			</div>
			<div class="post">
			    <a name="terms"></a>
				<h2 class="title"><?=$message['terms']?></h2>
				<div class="entry">
					<p>
                    <?=$message['terms_list']?>
					</p>
				</div>
			</div>
		</div>


		<div style="clear: both;">&nbsp;</div>

	</div>
</div>


<div id="footer">
	<p>Copyright 2006-2008 Powered by upload.360mf.cn All Rights Reserved.  <script src='http://s99.cnzz.com/stat.php?id=615368&web_id=615368' language='JavaScript' charset='gb2312'></script></p>
</div>
</body>
</html>
