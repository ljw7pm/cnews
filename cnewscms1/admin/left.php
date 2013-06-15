<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type=text/css>
BODY {
	BACKGROUND: #EFEFEF;
	MARGIN: 0px;
	FONT: 12px 宋体;
}
TABLE {
	BORDER-RIGHT: 0px;
	BORDER-TOP: 0px;
	BORDER-LEFT: 0px;
	BORDER-BOTTOM: 0px
}
TD {
	FONT: 12px 宋体
}
IMG {
	BORDER-RIGHT: 0px;
	BORDER-TOP: 0px;
	VERTICAL-ALIGN: bottom;
	BORDER-LEFT: 0px;
	BORDER-BOTTOM: 0px
}
A {
	FONT: 12px 宋体;
	COLOR: #000000;
	TEXT-DECORATION: none
}
A:hover {
	COLOR: #333333;
	TEXT-DECORATION: underline
}
. {
	BORDER-RIGHT: white 1px solid;
	OVERFLOW: hidden;
	BORDER-LEFT: white 1px solid;
	BORDER-BOTTOM: white 1px solid;
	background-color: #FFFFFF;
}
.menu_title {
}
.menu_title A {
	FONT: 12px 宋体;
	COLOR: #FFFFFF;
	TEXT-DECORATION: none
}
.menu_title A:hover {
	FONT: 12px 宋体;
	COLOR: #FFFFFF;
	TEXT-DECORATION: underline
}
.menu_title SPAN {
	FONT-WEIGHT: normal;
	LEFT: 8px;
	COLOR: #FFFFFF;
	POSITION: relative;
	TOP: 2px;
	font-size: 14px;
}
.menu_title2 {
}
.menu_title2 SPAN {
	FONT-WEIGHT: normal;
	LEFT: 8px;
	COLOR: #FFFFFF;
	POSITION: relative;
	TOP: 2px;
	font-size: 14px;
}
</style>
<script language=javascript1.2>
function showfunctionmenu(sid){
	whichEl = eval("functionmenu" + sid);
	if (whichEl.style.display == "none"){
		eval("functionmenu" + sid + ".style.display=\"\";");
	}else{
		eval("functionmenu" + sid + ".style.display=\"none\";");
	}
}
</script>
</head>
<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width=100% cellpadding="0" cellspacing="0" border=0 align=left>
  <tr>
    <td valign=top background="images/menu_2.gif" class="menu_title2"><table cellpadding=0 cellspacing=0 width=162 align=center >
        <tr>
          <td width="160" height=25 background=images/menu_1.gif class=menu_title id=menuTitle0 onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title';><span><a href="index.php?do=main" target=main><b>管理首页</b></a> | <a href="inadmin.php?action=logout" target="_parent" ><b>退出</b></a></span></td>
        </tr>
        <tr>
          <td style="display:" id='functionmenu0'><div class= style="width:158">
              <table width=158 align=center cellpadding=0 cellspacing=0>
                
                <tr>
                  <td height=25><a href="../index.php" target="_blank">站点首页</a></td>
                </tr>
                <tr>
                  <td height=20>用户名：
                  </td>
                </tr>
                <tr>
                  <td height=20>权&nbsp;&nbsp;限：后台管理员</td>
                </tr>
              </table>
            </div>
            <div  style="width:158"><table cellpadding=0 cellspacing=0 align=center width=130>
                <tr>
                  <td height=20></td>
                </tr>
              </table>

</div></td>
        </tr>
      </table>

      <table cellpadding=0 cellspacing=0 width=158 align=center>
        <tr>
          <td height=25 class=menu_title onmouseover=this.className='menu_title3'; onmouseout=this.className='menu_title'; background="images/menu_1.gif" id=menuTitle3 onClick="showfunctionmenu(3)" style="cursor:hand;"><span>新闻网管理</span> </td>
        </tr>
        <tr>
          <td style="display:''" id='functionmenu3'><div class= style="width:158">
              <table cellpadding=0 cellspacing=0 align=center width=130>
                <tr>
                  <td height=20 align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="15" height=20 align="right"><img src="images/left_fold.gif"></td>
                  <td width="115">&nbsp;<a href="article.php?action=add" target="main">添加文章</a></td>
                </tr>
                <tr>
                  <td width="15" height=20><img src="images/left_fold.gif"></td>
                  <td height=20>&nbsp;<a href="article.php" target="main">文章管理</a></td>
                </tr>
                <tr>
                  <td height=20><img src="images/left_fold.gif"></td>
                  <td height=20><a href="productpic.php" target="main"> &nbsp;图片管理</a></td>
                </tr>
                <tr>
                  <td height=20><img src="images/left_fold.gif"></td>
                  <td height=20>&nbsp;<a href="article.php?visible=0&act=user" target="main">审核文章</a></td>
                </tr>
                <tr>
                  <td width="15" height=20><img src="images/left_fold.gif"></td>
                  <td height=20>&nbsp;<a href="article.php?visible=0" target="main">草稿箱管理</a></td>
                </tr>
                <tr>
                  <td width="15" height=20 align="right"><img src="images/left_fold.gif"></td>
                  <td width="115">&nbsp;<a href="articletype.php" target="main">自定义属性</a></td>
                </tr>
                <tr>
                  <td width="15" height=20><img src="images/left_fold.gif"></td>
                  <td height=20>&nbsp;<a href="comment.php" target="main">评论管理</a></td>
                </tr>
              </table>
            </div>
            <div style="width:158">
              <table cellpadding=0 cellspacing=0 align=center width=130>
                <tr>
                  <td height=20></td>
                </tr>
              </table>
            </div></td>
        </tr>
      </table>

      <table cellpadding=0 cellspacing=0 width=158 align=center>
        <tr>
          <td height="25" background="images/menu_1.gif" class=menu_title id=menuTitle2 style="cursor:hand;" onClick="showfunctionmenu(2)" onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title';><span>网站管理</span> </td>
        </tr>
        <tr>
          <td style="display:''" id='functionmenu2'><div class= style="width:158">
              <table cellpadding=0 cellspacing=0 align=center width=130>
				<tr>
				  <td height=20 align="right">&nbsp;</td>
				  <td>&nbsp;</td>
			    </tr>
				<tr>
                  <td width="15" height=20 align="right"><img src="images/left_fold.gif"></td>
                  <td width="115">&nbsp;<a href="config.php" target="main">系统设置</a></td>
                </tr>
                <tr>
                  <td width="15" height=20><img src="images/left_fold.gif"></td>
                  <td height=20>&nbsp;<a href="catalog.php" target="main">栏目管理</a> | <a href="catalog.php?do=add" target="main">添加</a></td>
                </tr>
                <tr>
                  <td width="15" height=20><img src="images/left_fold.gif"></td>
                  <td height=20>&nbsp;<a href="account.php" target="main">账号管理</a> | <a href="account.php?action=add" target="main">添加</a></td>
                </tr>
                <tr>
                  <td width="15" height=20><img src="images/left_fold.gif"></td>
                  <td height=20>&nbsp;<a href="link.php" target="main">友情链接</a> | <a href="link.php?do=add" target="main">添加</a></td>
                </tr>
		
                <tr>
                  <td width="15" height=20><img src="images/left_fold.gif"></td>
                  <td height=20>&nbsp;<a href="advertise.php" target="main">广告管理</a> | <a href="advertise.php?do=add" target="main">添加</a></td>
                </tr>
                <tr>
                  <td width="15" height=20><img src="images/left_fold.gif"></td>
                  <td height=20>&nbsp;<a href="message.php" target="main">留言管理</a></td>
                </tr>
                <tr>
                  <td width="15" height=20><img src="images/left_fold.gif"></td>
                  <td height=20>&nbsp;<a href="file.php" target="main">文件管理</a></td>
                </tr>
              </table>
              <table cellpadding=0 cellspacing=0 align=center width=130>
                <tr>
                  <td width="15" height=20><img src="images/left_fold.gif"></td>
                  <td width="115" height=20>&nbsp;<a href="user.php" target="main">会员管理</a></td>
                </tr>
              </table>
          </div>
              <div style="width:158">
                <table cellpadding=0 cellspacing=0 align=center width=130>
                  
                  <tr>
                    <td height=20></td>
                  </tr>
                </table>
              </div></td>
        </tr>
      </table>
      <table cellpadding=0 cellspacing=0 width=158 align=center>
        <tr>
          <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/menu_1.gif" id=menuTitle9><span>SISE 信息</span> </td>
        </tr>
        <tr>
          <td><div class= style="width:158">
              <table cellpadding=0 cellspacing=0 align=center width=150>
                <tr>
                  <td height=20><br>
                    版权所有：华软学院<br>
                    设计制作：&nbsp;<a href='tencent://message/?uin=416942767'>梁家旺</a><br>                    <br>
                  </td>
                </tr>
              </table>
            </div></td>
        </tr>
      </table>
</table>
</body>
</html>
