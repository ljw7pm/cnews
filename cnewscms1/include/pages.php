<?php
class page{
	private $pagesize;//每页显示条数
	private $pagetotals;//总共页数
	private $lastpage;//最后一页
	private $nums;//总共条数
	private $numpage=1;//当前第几页
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
		echo "共 $this->pagetotals 页,当前为第<font color=red> $this->numpage</font> 页,共 $this->nums 条,每页显示 $this->pagesize 条&nbsp;&nbsp;";
		if($this->numpage==1){
			echo"首页&nbsp;";
			echo"上一页&nbsp;";
		}
		if($this->numpage >=2 && $this->numpage <=$this->lastpage){
			echo"<a href=$url?page=1>首页&nbsp;</a>";
			echo"<a href=$url?page=".($this->numpage-1).">上一页&nbsp;</a>";
		}
		if($this->numpage==$this->lastpage){
			echo"下一页&nbsp;&nbsp;";
			echo"尾页";
		}
		if($this->numpage>=1 && $this->numpage<$this->lastpage){
			echo"<a href=$url?page=".($this->numpage+1).">下一页&nbsp;</a>";
			echo"<a href=$url?page=$this->lastpage>尾页</a>";
		}
	  }else{
	  	return;
	  }
	}
	function show_page_way_2()		//以数字形式显示"首页 1 2 3 4 尾页"
	{
		$url=$_SERVER["REQUEST_URI"];
		$url=parse_url($url);	//parse_url -- 解析 URL，返回其组成部分,注: 此函数对相对路径的 URL 不起作用。
		$url=$url[path];
		if($this->nums > $this->pagesize)
		{
			if($this->numPage==1)	echo "首页";
			else	echo "<a href=$url?page=1>首页</a>";
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
			if($this->numPage==$this->lastpage)		echo "尾页";
			else	echo "<a href=$url?page=$this->lastpage>尾页</a>";
			}
			}
}
?>



