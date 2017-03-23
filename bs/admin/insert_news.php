<?php
include "../common/config.inc.php";
include "session.php";
session_start();
$username=$_SESSION['admin'];
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="style/js1.js"></script>
<script charset="utf-8" src="../kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="../kindeditor/lang/zh_CN.js"></script>
<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true
				});
			});
		</script>
<script language="javascript">
<!--//
function checksignup()
{
	if( document.form1.title.value == '' )
	{
	    window.alert('请输入公告标题!!');
		document.form1.title.focus();
	 }
	 else 
   {
	return true;
	}
	return false;
}
//-->
</script>
</head>
<body id="page">
<form action="include/news.fun.php?deal=insert"  method="post" name="form1" enctype="multipart/form-data" onSubmit="return checksignup()">
    <h2 style=" background-color:#0065AF;">&nbsp;&nbsp;添加公告</h2>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="140px" align="right">公告标题<input type="hidden" name="leibie" value="通知公告" /></td>
                <td><input type="text" name="title" value="" style="width:400px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
              </tr>
              <tr>
                <td width="140px" align="right">内容简介</td>
                <td><textarea style="width:400px; height:60px;  background-color:#FFFFFF;" name="zhaiyao"></textarea><input type="hidden" name="zhuti" value="" style="width:400px; height:16px;" /></td>
              </tr>
               <tr>
                <td width="140px" align="right">公告内容</td>
                <td><textarea name="content" style="width:400px; height:300px; visibility:hidden;"></textarea><input type="hidden" name="create" value="<?php echo $username;?>" /></td>
              </tr>

              <tr>
                <td colspan="2">
                 <div style="margin-left:100px; float:left;"><input type="submit" name="submit" value="提 交" style="background-color:#E3EFFB;"/></div>
                 </td>
              </tr>
        </table>
</form>
</body>
</html>
