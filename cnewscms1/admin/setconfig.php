<?php
require_once("../global.php");
require_once INCLUDE_PATH.'set.config.php';
?>
<form name="cform" method="post" action="class/config.class.php?aciton=save">
<div>
	<ul>
		<li>��վ���ƣ�<input type="text" name="webname" value="<?php echo $config['webname']?>" size="50"/></li>
		<li>seo:<input type="text" name="seotitle" value="<?php echo $config['seotitle']?>" size="50"/></li>
		<li>��վ�ؼ��֣�<input type="text" name="keyswords" value="<?php echo $config['keyswords']?>" size="50"/></li>
		<li>��վ������<input type="text" name="description" value="<?php echo $config['description']?>" size="50"/></li>
		<li>������<input type="text" name="icp" value="<?php echo $config['icp']?>" size="50"/></li>
		<li>��װ·����<input type="text" name="setupURL" value="<?php echo $config['setupURL']?>" size="50"/></li>
		<li>JS·����<input type="text" name="jsURL" value="<?php echo $config['jsURL']?>" size="50"/></li>
		<li>CSS·����<input type="text" name="cssURL" value="<?php echo $config['cssURL']?>" size="50"/></li>
		<li>���·����<input type="text" name="plugins" value="<?php echo $config['plugins']?>" size="50"/></li>
		<li>ʱ���ʽ��<input type="text" name="dataformat" value="<?php echo $config['dataformat']?>" size="50"/></li>
		<li><input type="submit" value="ȷ��" /> <input type="reset" value="ȡ��" /></li>
	</ul>
</div>
</form>
