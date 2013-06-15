<?php
class page{
	private $pagesize;//ÿҳ��ʾ����
	private $pagetotals;//�ܹ�ҳ��
	private $lastpage;//���һҳ
	private $nums;//�ܹ�����
	private $numpage=1;//��ǰ�ڼ�ҳ
	private $table;
	public function __construct($pagesize,$total_nums){
		$this->pagesize=$pagesize;
		$this->nums=$total_nums;
		$this->lastpage=ceil($this->nums/$this->pagesize);
		$this->pagetotals=ceil($this->nums/$this->pagesize);
		if(!empty($_GET['page'])){
			$this->numpage=$_GET['page'];
			if(!is_int($this->numpage)) $this->numpage=(int)$this->numpage;
			if($this->numpage < 1) $this->numpage=1;
			if($this->numpage > $this->lastpage) $this->numpage=$this->lastpage;
		}
	}
	public function show_page_result($table){
		$this->table=$table;
		$row_num=($this->numpage-1)*$this->pagesize;
		$row_num.=",";
		$sql="SELECT * from $this->table LIMIT $row_num $this->pagesize";
		$rs=Mysql::getMysql();
		$rs->query($sql);
		$result=$rs->fecth_array();
		return $result;
	}
	public function show_page_way_1(){
		$url=$_SERVER['REQUEST_URI'];
		$url=parse_url($url);
		$url=$url[path];
		if($this->nums > $this->pagesize){
		echo "�� $this->pagetotals ҳ,��ǰΪ��<font color=red> $this->numpage</font> ҳ,�� $this->nums ��,ÿҳ��ʾ $this->pagesize ��&nbsp;&nbsp;";
		if($this->numpage==1){
			echo"��ҳ&nbsp;";
			echo"��һҳ&nbsp;";
		}
		if($this->numpage >=2 && $this->numpage <=$this->lastpage){
			echo"<a href=$url?page=1>��ҳ&nbsp;</a>";
			echo"<a href=$url?page=".($this->numpage-1).">��һҳ&nbsp;</a>";
		}
		if($this->numpage==$this->lastpage){
			echo"��һҳ&nbsp;&nbsp;";
			echo"βҳ";
		}
		if($this->numpage>=1 && $this->numpage<$this->lastpage){
			echo"<a href=$url?page=".($this->numpage+1).">��һҳ&nbsp;</a>";
			echo"<a href=$url?page=$this->lastpage>βҳ</a>";
		}
	  }else{
	  	return;
	  }
	}
	function show_page_way_2()		//��������ʽ��ʾ"��ҳ 1 2 3 4 βҳ"
	{
		$url=$_SERVER["REQUEST_URI"];
		$url=parse_url($url);	//parse_url -- ���� URL����������ɲ���,ע: �˺��������·���� URL �������á�
		$url=$url[path];
		if($this->nums > $this->pagesize)
		{
			if($this->numPage==1)	echo "��ҳ";
			else	echo "<a href=$url?page=1>��ҳ</a>";
			for($i=1;$i<=$this->pagetotals;$i++)
			{
			if($this->numPage==$i)
			{
			echo " ".$i." ";
			}
			else
			{
			echo " <a href=$url?page=$i>$i</a> ";
			}
	
			}
			if($this->numPage==$this->lastpage)		echo "βҳ";
			else	echo "<a href=$url?page=$this->lastpage>βҳ</a>";
			}
			}
}
?>



