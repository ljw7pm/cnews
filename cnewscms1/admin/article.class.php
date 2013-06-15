<?php
class article{
	private $rs;
	private $id;
	private $title;
	private $source;
	private $body;
	private $pubdate;
	public function __construct(){
		$this->rs=Mysql::getMysql();
	}
	public function countArticle(){
		$sql="SELECT count(*) from article order by id DESC";
		$count=$this->rs->query($sql);
		$total=$this->rs->mysql_result($count);
		return $total;
	}
	public function editorArticle($id){//$_GET['id'];
		$this->id=intval($id);
		$sql="SELECT * from article WHERE id=$this->id";
		$this->rs->query($sql);
		$result=$this->rs->fecth_array_args();
		return $result;
	}
	public function saveArticle($aid,$title,$source,$body,$pubdate){
		$this->id=$aid;
		$this->title=$title;
		$this->source=$source;
		$this->body=$body;
		$this->pubdate=$pubdate;
		if(!$this->id){
			//title,source,pic,body,filename,pubdate,hits
			$sql="INSERT INTO article (title,source,pic,body,filename,pubdate,hits) VALUES('".$this->title."','".$this->source."','0','".$this->body."','0','".$this->pubdate."','0')";
			$result=$this->rs->query($sql);
			if($result){
				alert('添加成功！','article.php');
			}else{
				alert('添加失败!',1);
				exit();
			}
		}else{
			$sql="UPDATE article SET title='".$this->title."',source='".$this->source."',body='".$this->body."',pubdate='0' WHERE id=$this->id";
			$result=$this->rs->query($sql);
			if($result){
				alert('添加成功！','article.php');
			}else{
				alert('添加失败!',1);
				exit();
			}
		}
	}
		
}
?>