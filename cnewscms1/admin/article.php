<?php
require_once("../global.php");
require_once(ADMIN_PATH.'inadmin.php');
require_once(ADMIN_PATH.'class/article.class.php');
require_once(INCLUDE_PATH.'pages.php');
//require_once('fckeditor/fckeditor.php');
require_once('sinaeditor.class.php');
session_start();
$article=new article();
$count=$article->countArticle();
$pagesize=30;
$page=new page($pagesize,$count);
$list=$page->show_page_result('article');
?>
<style type="text/css">
body{
font-family:"宋体";
font-size:12px;
margin:0;
padding:0;
text-align:center;
}
td{
font-family:"宋体";
font-size:12px;
text-align:center;
line-height:20px;
}
</style>
<script language="JavaScript" type="text/javascript">
function selAll()
{
	for(i=0;i<document.listform.id.length;i++)
	{
		if(!document.listform.id[i].checked)
		{
			document.listform.id[i].checked=true;
		}
	}
}
function noSelAll()
{
	for(i=0;i<document.listform.id.length;i++)
	{
		if(document.listform.id[i].checked)
		{
			document.listform.id[i].checked=false;
		}
	}
}
</script>
<?php
if($_GET['action']=='')
{
?>
<table width="98%" border="0" align=center cellpadding="2" cellspacing="1" bgcolor="#FFFFFF" class="border">
  <tr> 
    <td height=22 colspan="8" class="topbg">内容管理</td>
  </tr>
  <tr class="bgcolor">
  <td width="4%" height=22 align="center">ID</td>
  <td width="4%" align="center">选择</td>
  <td width="30%" align="center">标 题</td>
  <td width="18%" align="center">发布时间</td>
  <td width="7%" align="center">点</td>
  <td width="20%" align="center">操作</td>
  </tr><form action="article.php" method="post" name="listform" id="listform">
  <?php
  	if($list){
		foreach($list as $key=>$value){
  ?>
  <tr bgcolor="#FFFFFF">
    <td height=22 align="center" class="tdbg"><?php echo $value['id']?></td>
    <td align="center" class="tdbg"><input name="id[]" type="checkbox" id="id" value="<?php echo $value['id']?>" /></td>
    <td class="tdbg"><a href="" target="_blank"><?php echo $value['title']?></a></td>
    <td align="center" class="tdbg"><?php echo get_date("Y-m-d H:i:s",$value['pubdate'])?></td>
    <td align="center" class="tdbg"><?php echo $value['hits']?></td>
    <td align="center" class="tdbg"><a href="article.php?do=updateHTML&id=<?php echo $value['id']?>"></a> | <a href="article.php?action=add&id=<?php echo $value['id']?>">编辑</a> | <a href="article.php?action=del&id=<?php echo $value['id']?>"onClick="return confirm('确定要删除<?php echo $value['title']?>');">删除</a></td>
  </tr>
	<?php 
	}
		}else{
	?>
  <tr bgcolor="#FFFFFF">
    <td height=22 colspan="8" align="center" class="tdbg">暂无内容</td>
    </tr>
  <?php
		}
  ?>
  <tr bgcolor="#FFFFFF">
    <td height=22 colspan="8" class="tdbg"><input name="button" type="button" onclick="selAll();" value="全选" />
      <input name="" type="button" onclick="noSelAll();" value="取消" />　批量操作：
        <input type="radio" name="action" value="del" />
      删除　
      </td>
  </tr></form>
  <tr bgcolor="#FFFFFF">
    <td height=22 colspan="8" align="right" class="tdbg"><?php $page->show_page_way_1();?></td>
  </tr>
</table>
<?php
}
if($_GET['action']=='add')
{
	$id=$_GET['id'];
	$result=$article->editorArticle($id);
?>
<form action="article.php?action=save" method="post" enctype="multipart/form-data" onsubmit="return checkform(this);">
<table width="98%" border="0" align=center cellpadding="2" cellspacing="1" bgcolor="#F6F6F6" class="border">
  <tr> 
    <td height=22 colspan="4" class="topbg">添加内容</td>
  </tr>
  <tr>
  <td width="9%" height=23 class="tdbg">标题：</td>
  <td width="38%" height=23 class="tdbg"><input name="title" id="title" value="<?php echo $result['title']?>" size="30" /></td>
  <td width="50%" class="tdbg">&nbsp;</td>
  <td width="3%" class="tdbg">&nbsp;</td>
  </tr>
  
  <tr>
  <td height=23 class="tdbg">出处：</td>
  <td height=23 class="tdbg"><input name="source" id="source" value="<?php echo $result['source']?>" size="30" /></td>
  <td height=23 class="tdbg">&nbsp;</td>
  <td height=23 class="tdbg">&nbsp;</td>
  </tr>

  <tr>
  <td height=23 class="tdbg">发布时间：</td>
  <td height=23 class="tdbg"><input id="pubdate" value="<?php echo( empty($id) ? get_date("Y-m-d H:i:s"):get_date("Y-m-d H:i:s",$result['pubdate']))?>" name="pubdate" /></td>
  <td height=23 class="tdbg">&nbsp;</td>
  <td height=23 class="tdbg">&nbsp;</td>
  </tr>
  <tr>
  <td height=23 colspan="4" class="tdbg">
  <?php 
  /*$editor = new FCKeditor('content') ;
  $editor->BasePath='editor/';
  $editor->Value=$result['body'];
  $editor->CreateHtml();
  $editor->Create();
  */
  $editor=new sinaEditor('gently_editor');//gently_editor
  $editor->Value=stripslashes($result['body']);
  $editor->BasePath='sinaEditor';
  $editor->Height=600;
  $editor->Width=800;
  $editor->AutoSave=false;
  $editor->Create();
  ?>
  </td>
  </tr>
  <tr>
  <td height=23 colspan="4" align="center" class="tdbg"><input name="aid" type="hidden" id="aid" value="<?php echo $id?>" />
    <input name="action" type="hidden" id="action" value="save" />
    <input type="submit" value="提交" /> 　　 
    <input type="reset" value="重置" /></td>
  </tr>
</table>
</form>
<script language="JavaScript" type="text/javascript">

function checkform(f){
	if(f.title.value==''){
		alert("标题不能为空!")
		f.title.focus();
		return false;
	}
}
</script>
<?php
}
?>
<?php 
  if($_GET['action']=='save'){
		extract($_POST);
        extract($_GET);
        unset($_POST,$_GET);
		$aid		= addslashes(htmlspecialchars($aid));
		$title		= addslashes(htmlspecialchars($title));
		$source		= addslashes(htmlspecialchars($source));
		$pubdate	= strtotime($pubdate);
		$body	= addslashes(htmlspecialchars($gently_editor));
		$article->saveArticle($aid,$title,$source,$body,$pubdate);
  }
  if($_GET['action']=='del'){
	$id=$_GET['id'];
	if($id){
		$article->delAtricle($id);
  		}
  	}
?>
