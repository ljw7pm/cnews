<?php
/*
����ģʽ����ֻ��һ��ʵ�������ܱ��ⲿnew��ʽʵ������ͨ������Ҫʵ���������ڲ�static��̬���������Խк��棩
����������ѡ�����ݿ���
*/
class Mysql{
	private static $links=null;
	private static $conn;
  //private static $DBName;
	private static $result;
	private function __construct(){//pravite���캯����ֹ�ⲿNEWʵ����
		require_once("config.php");//���������ļ�
		self::$conn=mysql_connect($ServerName,$UserName,$Password);//��������
		if(self::$conn){
			mysql_select_db($DBName,self::$conn);//ѡ�����ݿ�
			mysql_query("SET NAMES $charset");//�����ַ�
			}else
			{
			 echo "û�����ӵ�����";
				}
		}
		
	public static function getMysql(){
		if(null==self::$links){
			self::$links=new Mysql();//���Ϊ�գ��ڲ�����ʵ����
			}
		    return self::$links;//�����Ϊ�շ��ص�ǰ����
		}
		
	public function query($sql){//ִ�в�ѯ���
		self::$result=mysql_query($sql,self::$conn);
		return self::$result;
		}
		
	public function fecth_array_args(){
		if(self::$result){
			$row=mysql_fetch_array(self::$result);
			//var_dump($row);����
			return $row;
		}else
			{
			echo "û�ж�ȡ������";	
				}
	 }
	public function fecth_array(){//�Ӽ�¼����ȡ��һ����Ϊ��������
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
			echo "û�ж�ȡ������";	
				}
		}
		
	public function fetch_object(){//�Ӽ�¼����ȡ��һ����Ϊ����
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
			echo "û�ж�ȡ������";	
		}
	}
	
	public function num_rows(){//�Ӽ�¼����ȡ������
		if(self::$result){
			return mysql_num_rows(self::$result);
		}
	}
	
	public function insert_id(){//ȡ����һ�������ݵ�ID
		if(self::$result){
			return mysql_insert_id(self::$result);
		}
	}
	public function mysql_result($resoure,$row=0){//ȡ����һ�������ݵ�ID
		if(self::$result){
			return mysql_result(self::$result,$row);
		}
	}
		//������
	//��������
	public function begintranscation(){
		mysql_query("SET AUTOCOMMIT=0");
		mysql_query("BEGIN");
	}
	//����ع�
	public function rollback(){
		mysql_query("ROLLBACK");
	}
	//�ύִ��
	public function commit(){
		mysql_query("COMMIT");
	}
	//public function error(){}
	
	public function __call($function_name,$args){
		echo "<br><font color=#ff0000>�������õķ��� $function_name ������</font><br>\n";
	}
	
	public function close(){
		mysql_free_result(self::$result);//�ͷŲ�ѯ���
		}
		
	public function escapestring($str){
		return mysql_escape_string($str);//ʹ��ת���ַ���֤ϵͳ��ȫ
		}
	}
?>