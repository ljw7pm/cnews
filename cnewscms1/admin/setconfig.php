<?php
require_once("../global.php");
require_once INCLUDE_PATH.'set.config.php';
?>
<form name="cform" method="post" action="class/config.class.php?aciton=save">
<div>
	<ul>
		<li>网站名称：<input type="text" name="webname" value="<?php echo $config['webname']?>" size="50"/></li>
		<li>seo:<input type="text" name="seotitle" value="<?php echo $config['seotitle']?>" size="50"/></li>
		<li>网站关键字：<input type="text" name="keyswords" value="<?php echo $config['keyswords']?>" size="50"/></li>
		<li>网站描述：<input type="text" name="description" value="<?php echo $config['description']?>" size="50"/></li>
		<li>备案：<input type="text" name="icp" value="<?php echo $config['icp']?>" size="50"/></li>
		<li>安装路径：<input type="text" name="setupURL" value="<?php echo $config['setupURL']?>" size="50"/></li>
		<li>JS路径：<input type="text" name="jsURL" value="<?php echo $config['jsURL']?>" size="50"/></li>
		<li>CSS路径：<input type="text" name="cssURL" value="<?php echo $config['cssURL']?>" size="50"/></li>
		<li>插件路径：<input type="text" name="plugins" value="<?php echo $config['plugins']?>" size="50"/></li>
		<li>时间格式：<input type="text" name="dataformat" value="<?php echo $config['dataformat']?>" size="50"/></li>
		<li><input type="submit" value="确定" /> <input type="reset" value="取消" /></li>
	</ul>
</div>
</form>
