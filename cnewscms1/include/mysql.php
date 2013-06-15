<?php
/*
单件模式（类只有一个实例，不能被外部new方式实例化，通过不需要实例化访问内部static静态方法，可以叫后面）
连接主机及选择数据库类
*/
class Mysql{
	private static $links=null;
	private static $conn;
  //private static $DBName;
	private static $result;
	private function __construct(){//pravite构造函数防止外部NEW实例化
		require_once("config.php");//导入配置文件
		self::$conn=mysql_connect($ServerName,$UserName,$Password);//连接主机
		if(self::$conn){
			mysql_select_db($DBName,self::$conn);//选择数据库
			mysql_query("SET NAMES $charset");//设置字符
			}else
			{
			 echo "没有连接到主机";
				}
		}
		
	public static function getMysql(){
		if(null==self::$links){
			self::$links=new Mysql();//如果为空，内部进行实例化
			}
		    return self::$links;//如果不为空返回当前连接
		}
		
	public function query($sql){//执行查询语句
		self::$result=mysql_query($sql,self::$conn);
		return self::$result;
		}
		
	public function fecth_array_args(){
		if(self::$result){
			$row=mysql_fetch_array(self::$result);
			//var_dump($row);测试
			return $row;
		}else
			{
			echo "没有读取到数据";	
				}
	 }
	public function fecth_array(){//从记录集中取得一行作为关联数组
		if(self::$result){
			$count=0;
			$data=array();
			while($row=mysql_fetch_array(self::$result)){
				$data[$count]=$row;
				$count++;
				}
			//print_r($data);
			return $data;
			}else
			{
			echo "没有读取到数据";	
				}
		}
		
	public function fetch_object(){//从记录集中取得一行作为对象
		if(self::$result){
		$row=mysql_fetch_object(self::$result);
		$count=0;
		$data=array();
		while($row){
			$data[$count]=$row;
			$count++;
			}
		return $data;
		}else
		{
			echo "没有读取到数据";	
		}
	}
	
	public function num_rows(){//从记录集中取得行数
		if(self::$result){
			return mysql_num_rows(self::$result);
		}
	}
	
	public function insert_id(){//取得上一插入数据的ID
		if(self::$result){
			return mysql_insert_id(self::$result);
		}
	}
	public function mysql_result($resoure,$row=0){//取得上一插入数据的ID
		if(self::$result){
			return mysql_result(self::$result,$row);
		}
	}
		//事务处理
	//定义事务
	public function begintranscation(){
		mysql_query("SET AUTOCOMMIT=0");
		mysql_query("BEGIN");
	}
	//事务回滚
	public function rollback(){
		mysql_query("ROLLBACK");
	}
	//提交执行
	public function commit(){
		mysql_query("COMMIT");
	}
	//public function error(){}
	
	public function __call($function_name,$args){
		echo "<br><font color=#ff0000>你所调用的方法 $function_name 不存在</font><br>\n";
	}
	
	public function close(){
		mysql_free_result(self::$result);//释放查询结果
		}
		
	public function escapestring($str){
		return mysql_escape_string($str);//使用转义字符保证系统安全
		}
	}
?>