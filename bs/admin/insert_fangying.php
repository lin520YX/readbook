<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
<!--//
function checksignup()
{
	if( document.form1.title.value == '' )
	{
	    window.alert('请输入影片放映厅名称!!');
		document.form1.title.focus();
	 }
    else
  if( document.form1.seat.value == '' )
	{
	    window.alert('请输入影片放映厅席位数!!');
		document.form1.seat.focus();
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
<form action="include/movie.fun.php?deal=fangying"  method="post" name="form1" enctype="multipart/form-data" onSubmit="return checksignup()">
<h2 style=" background-color:#0065AF;">&nbsp;&nbsp;添加放映厅名称</h2>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>
            <div style="margin-left:100px; float:left;">放映厅名称：&nbsp;&nbsp;<input type="text" name="title" value="" style="width:200px; height:16px; background-color:#FFFFFF;" />
            </div>
        </td>
      </tr>
      <tr>
        <td>
            <div style="margin-left:100px; float:left;">放映厅席位：&nbsp;&nbsp;<input type="text" name="seat" value="" style="width:200px; height:16px; background-color:#FFFFFF;" />
            </div>
        </td>
      </tr>
      <tr>
        <td>
            <div style="margin-left:100px; float:left;"><input type="submit" name="submit" value="提 交" style="background-color:#E3EFFB;"/></div>
            </td>
      </tr>
</table>
</form>
</body>
</html>
