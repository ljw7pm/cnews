<?php
require_once("../global.php");
require_once(ADMIN_PATH.'inadmin.php');
require_once("productconfig.php");
//require_once(ADMIN_PATH.'class/product.class.php');
$id=$_GET['picid'];
switch($_GET['action']){
	case "product":upmovie($id);break;
	default: upinput($id);break; 
}
function upinput($id){
?>
<form enctype="multipart/form-data" action="?action=product&picid=<?php echo $id?>" method="post">
	<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE?>" />
	<input type="file" name="uploadimg" />
	<input type="submit" value="�ύ" />
</form>
<?php 
}
function upmovie($id){
if(isset($_FILES['uploadimg'])){
	if($_FILES['uploadimg']['error']>0){
		switch($_FILES['uploadimg']['error']){
			case 1:alert('�ļ���С��������',1);break;
			case 2:alert('�ļ���С��������',1);break;
            case 3:alert('ֻ�в����ļ����ϴ�',1);break;
            case 4:alert('��û���ϴ��ļ�',1);
		}
	}
	$suffix=strtolower(substr($_FILES['uploadimg']['name'],-4));
	if(!valid_suffix($suffix,$valid_suffix)){
		alert('��֧�����ļ���׺��',1);
	}else{
		$time=time();
		$userip=ip2long($_SERVER['REMOTE_ADDR']);
		$newpath=UPLOAD_DIR. $time . 'x' . $userip . $suffix;
		if(is_uploaded_file($_FILES['uploadimg']['tmp_name'])){
			if(!move_uploaded_file($_FILES['uploadimg']['tmp_name'],$newpath)){
				alert('�ϴ�ʧ��',1);
			}else{
echo '<script language="JavaScript" type="text/javascript"> var pic=parent.document.getElementById("picurl");pic.value="'.$newpath.'";//parent.Ok();parent.close();</script>';		
			
			
			
			  //echo "<script language=JavaScript>alert(\"".$str."\");window.location='".$url."'</scrip>";
			//echo "<script>alert('�ϴ��ɹ���');window.parent.document.getElementById(\"".$id."\").value='".$newpath."';window.close();</cript>";
			  //echo "<script language='javascript'>alert('�ļ��ϴ��ɹ�!');window.parent.document.getElementById('".$id."').value='".$newpath."';";
				//echo $newpath;
				/*$productname=$_FILES['text']['value'];
				echo $productname;
				$sql="INSERT INTO product (name,picurl) values ('".$productname."','".$newpath."')";
				$rs=Mysql::getMysql();
				$result=$rs->query($sql);
				if($result){
					alert('���ͼƬ�ɹ�','product.php');
				}else{
					//alert('���ͼƬʧ��',1);
					echo $sql;
				}*/
			}
		}
	}
	}
}
?>
