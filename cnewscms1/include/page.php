<?php
	class page
	{
		private $pagesize;
		private $lastpage;
		private $totalpages;
		private $nums;
		private $numPage=1;

		function __construct($page_size,$total_nums)
		{
			$this->pagesize=$page_size;		//ÿҳ��ʾ����������
			$this->nums=$total_nums;		//�ܵ���������
			$this->lastpage=ceil($this->nums/$this->pagesize);		//���һҳ
			$this->totalpages=ceil($this->nums/$this->pagesize);	//�ܵ÷�ҳ��
			if(!empty($_GET[page]))
			{
				$this->numPage=$_GET[page];
				if(!is_int($this->numPage))	$this->numPage=(int)$this->numPage;
				if($this->numPage<1)	$this->numPage=1;
				if($this->numPage>$this->lastpage)	$this->numPage=$this->lastpage;
			}
		}

    	function show_page_result()
		{
			$row_num=(($this->numPage)-1) * $this->pagesize; //��ʾÿһҳ�ӵڼ������ݿ�ʼ��ʾ
			$row_num=$row_num.",";
   	 		$SQL="SELECT * FROM `test` LIMIT $row_num $this->pagesize";
    		$db=new database();
    		$query=$db->execute($SQL);
    		while($row=mysql_fetch_array($query))
    		{
   		 		echo "<b>".$row[name]." | ".$row[sex]."<hr>";
    		}
    		$db=null;
		}

		function show_page_way_1()	//��"��ҳ ��һҳ ��һҳ βҳ"��ʽ��ʾ
		{
			$url=$_SERVER["REQUEST_URI"];
			$url=parse_url($url);	//parse_url -- ���� URL����������ɲ���,ע: �˺��������·���� URL �������á�
			$url=$url[path];
			if($this->nums > $this->pagesize)		//�ж��Ƿ������ҳ����
			{
				echo " �� $this->totalpages ҳ ��ǰΪ��<font color=red><b>$this->numPage</b></font>ҳ �� $this->nums �� ÿҳ��ʾ $this->pagesize ��";
				if($this->numPage==1)
				{
					echo " ��ҳ ";
					echo "��һҳ ";
				}
				if($this->numPage >= 2 && $this->numPage <= $this->lastpage)
				{
					echo " <a href=$url?page=1>��ҳ</a> " ;
					echo "<a href=$url?page=".($this->numPage-1).">��һҳ</a> " ;
				}

				if($this->numPage==$this->lastpage)
				{
					echo "��һҳ ";
					echo "βҳ<br>";
				}
				if($this->numPage >= 1 && $this->numPage < $this->lastpage)
				{
					echo "<a href=$url?page=".($this->numPage+1).">��һҳ</a> ";
					echo "<a href=$url?page=$this->lastpage>βҳ</a><br> ";
				}
			}
			else	return;
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
				for($i=1;$i<=$this->totalpages;$i++)
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

		function show_page_way_3()
		{
			global $c_id;
			$url=$_SERVER["REQUEST_URI"];
			$url=parse_url($url);	//parse_url -- ���� URL����������ɲ���,ע: �˺��������·���� URL �������á�
			$url=$url[path];
			if($this->nums > $this->pagesize)		//�ж��Ƿ������ҳ����
			{
				if($c_id)
				{
					echo "����<select name='select1' onChange=\"location.href='$url?c_id=$c_id&page='+this.value+'&pagesize=$this->pagesize'\">";
				}
				else	echo "����<select name='select1' onChange=\"location.href='$url?page='+this.value+'&pagesize=$this->pagesize'\">";
				for($i = 1;$i <= $this->totalpages;$i++)
				echo "<option value='" . $i . "'" . (($this->numPage == $i) ? 'selected' : '') . ">" . $i . "</option>";
      			echo "</select>ҳ, ÿҳ��ʾ";
      			if($c_id)
      			{
      				echo "<select name=select2 onChange=\"location.href='$url?c_id=$c_id&page=$this->numPage&pagesize='+this.value+''\">";
      			}
      			else	echo "<select name=select2 onChange=\"location.href='$url?page=$this->numPage&pagesize='+this.value+''\">";
				for($i = 0;$i < 5;$i++) // ����������Ϊ����ѡ��
				{
					$choice= ($i+1)*4;
					echo "<option value='" . $choice . "'" . (($this->pagesize == $choice) ? 'selected' : '') . ">" . $choice . "</option>";
				}
     		 	echo "</select>��";
			}
			else	return;		//echo "û����ҳ��";

		}
	}
?>



