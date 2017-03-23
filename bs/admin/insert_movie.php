<?php
require "../common/config.inc.php";
require "session.php";
$lei="select * from type";
$result1=mysql_query($lei);
$fang="select * from fangying";
$result2=mysql_query($fang);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
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
	if( document.form1.type.value == '' )
	{
	    window.alert('请先添加影片类别!!');
		document.form1.type.focus();
	 }
	 else 
	if( document.form1.fangying.value == '' )
	{
	    window.alert('请先添加放映厅!!');
		document.form1.fangying.focus();
	 }
	 else 
	if( document.form1.title.value == '' )
	{
	    window.alert('请输入影片名字!!');
		document.form1.title.focus();
	 }
	  else 
	if( document.form1.price.value == '' )
	{
	    window.alert('请输入影片票价!!');
		document.form1.price.focus();
	 }
	 else 
	if( document.form1.shijian.value == '' )
	{
	    window.alert('请输入影片时间!!');
		document.form1.shijian.focus();
	 }
	 else 
	if( document.form1.daoyan.value == '' )
	{
        window.alert('请输入影片导演!!');
		document.form1.daoyan.focus();
	 }
	  else 
	if( document.form1.bianji.value == '' )
	{
        window.alert('请输入影片编剧!!');
		document.form1.bianji.focus();
	 }
	  else 
	if( document.form1.where.value == '' )
	{
        window.alert('请输入影片产地!!');
		document.form1.where.focus();
	 }
	  else 
	if( document.form1.gongsi.value == '' )
	{
        window.alert('请输入发行公司!!');
		document.form1.gongsi.focus();
	 }
	  else 
	if( document.form1.time.value == '' )
	{
        window.alert('请输入影片放映时间!!');
		document.form1.time.focus();
	 }
	  else 
	if( document.form1.picture.value == '' )
	{
        window.alert('请上传影片海报!!');
		document.form1.picture.focus();
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
<form action="include/movie.fun.php?deal=insert_movie"  method="post" name="form1" enctype="multipart/form-data" onSubmit="return checksignup()">
    <h2 style=" background-color:#0065AF;">&nbsp;&nbsp;添加影片</h2>
    <table width="100%" cellpadding="0px" cellspacing="0px" border="0px" align="center">
        <tr>
            <td width="100px" align="center">影片类别</td>
            <td>
                <select name="type" style="width:100px;  background-color:#FFFFFF;">
                <?php
                while($rows1=mysql_fetch_array($result1))
                {
                 echo "<option value=\"".$rows1["title"]."\">".$rows1["title"]."</option>";
                }
                ?>
                </select></td></tr>
                <tr><td width="100px" align="center">放映厅</td>
                <td><select name="fangying" style="width:100px;  background-color:#FFFFFF;">
                <?php
                while($rows2=mysql_fetch_array($result2))
                {
                 echo "<option value=\"".$rows2["title"]."\">".$rows2["title"]."</option>";
                }
                ?>
            </select>
            </td>
          </tr>
          <tr>
            <td width="100px" align="center">影片名称</td>
            <td><input type="text" name="title" value="" style="width:300px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
          </tr>
          <tr>
            <td width="100px" align="center">影片票价</td>
            <td><input type="text" name="price" value="" style="width:300px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
          </tr>
          <tr><td width="100px" align="center">影片时间</td>
            <td><input type="text" name="shijian" value="" style="width:300px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
          </tr>
          <tr><td width="100px" align="center">影片导演</td>
            <td><input type="text" name="daoyan" value="" style="width:300px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
          </tr>
          <tr><td width="100px" align="center">影片编剧</td>
            <td><input type="text" name="bianji" value="" style="width:300px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
          </tr>
          <tr><td width="100px" align="center">影片产地</td>
            <td><input type="text" name="where" value="" style="width:300px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
          </tr>
          <tr>
            <td width="100px" align="center">发行公司</td>
            <td><input type="text" name="gongsi" value="" style="width:300px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
          </tr>
          <tr>
            <td width="100px" align="center">播放时间</td>
            <td><input type="text" name="time" value="" style="width:300px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
          </tr>
          <tr>
            <td width="100px" align="center">影片海报</td>
            <td><input type="file" name="picture" value="" style="width:300px; height:26px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
          </tr>
          <tr>
            <td width="100px" align="center">影片说明</td>
            <td><textarea name="content" style="width:400px; height:300px; visibility:hidden;"></textarea></td>
          </tr>
          <tr>
            <td width="100px" align="center"></td>
            <td><input type="submit" name="submit" value="添  加" style="width:60px; height:16px; color:#FFFFFF;"/></td>
          </tr>
        </table>
</form>
</body>
</html>
