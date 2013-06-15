<?php
/*
 * ÍøÕ¾»ù±¾ÅäÖÃ
 */
require_once("../../global.php");
require_once INCLUDE_PATH.'mysql.php';
require_once INCLUDE_PATH.'common.php';
class config{
	private $rs;
	private $_config;
	public function __construct(){
		$this->rs=Mysql::getMysql();
	}
	public function getPOST(){
			foreach($_POST as $key=>$value){
				//$sql="UPDATE config SET value='".htmlspecialchars($value)."' where name='$key'";
			    $sql="UPDATE `config` SET `value` = '".htmlspecialchars($value)."' WHERE `name` ='$key'";
				$this->rs->query($sql);
			}
	}
	public function getConfig(){
		$sql="select * from config";
		$this->rs->query($sql);
		$tmp=$this->rs->fecth_array();
		$data_config="<?php\n\t\$config=array(\n";
		for($i=0;$i<count($tmp);$i++){
			$this->_config.="\t\t\"".$tmp[$i]['name']."\"=>\"".$tmp[$i]['value']."\",\n";
		}
		$data_config.=substr($this->_config,0,-2);
		$data_config.="\n);?>";
		echo $data_config;
		writefile(INCLUDE_PATH.'set.config.php',$data_config);
		echo "<script type='javascript'>window.go(-1);</script>";
		$config_data="<?php\n\t\$config=array(\n";
		for ($i=0;$i<count($tmp);$i++){
			$this->_config.="\t\t\"".$tmp[$i]['name']."\"=>\"".$tmp[$i]['value']."\",\n";
		}
		$config_data.=substr($this->_config,0,-2);
		$config_data.="\n);?>";
		writefile(INCLUDE_PATH.'set.config.php',$config_data);
	}
}
print_r($_POST) ;
$configs=new config;
$configs->getPOST();
$configs->getConfig();
?>