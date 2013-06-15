<?php 
class message{
	private $template;
	public static function setTemplate($template){
		$this->template=$template;
	}
	public static function redirect($msg,$url="",$t='10'){
		if($url !=""){
			$url=($url =='goback') ? 'javascript:history.go(-1)':$url;
		}else{
			$url=$_SERVER["HTTP_REFERER"];
		}
		$this->template->variableEval($key,$value);
		$this->template->findTemplateAndDisplay();
	}
}
?>