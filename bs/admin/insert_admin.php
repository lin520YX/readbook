<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="javascript">
<!--//
function checksignup()
{
	if( document.form1.username.value == '' )
	{
	    window.alert('请输入管理员账户!!');
		document.form1.username.focus();
	 }
	 else 
	if( document.form1.password.value == '' )
	{
	    window.alert('请输入管理员密码!!');
		document.form1.password.focus();
	 }
	 else 
	if( document.form1.xingming.value == '' )
	{
	    window.alert('请输入管理员的真实姓名!!');
		document.form1.xingming.focus();
	 }
	  else 
	if( document.form1.shenfen.value == '' )
	{
	    window.alert('请输入管理员的身份证号!!');
		document.form1.shenfen.focus();
	 }
	 else 
	if( document.form1.dianhua.value == '' )
	{
	    window.alert('请输入管理员电话!!');
		document.form1.dianhua.focus();
	 }
	 else 
	if( document.form1.email.value == '' )
	{
        window.alert('请输入管理员电子邮箱!!');
		document.form1.email.focus();
	 }
	  else 
	if( document.form1.where.value == '' )
	{
        window.alert('请输入管理员家庭住址!!');
		document.form1.where.focus();
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
<form action="../include/admin.fun.php?deal=insert"  method="post" name="form1" enctype="multipart/form-data" onSubmit="return checksignup()">
<h2 style=" background-color:#0065AF;">&nbsp;&nbsp;新增管理账户</h2>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="140px" align="right">管理员账号</td>
	<td><input type="text" name="yonghu" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td width="140px" align="right">管理员密码</td>
	<td><input type="password" name="password" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td width="140px" align="right">管理员姓名</td>
	<td><input type="text" name="xingming" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td width="140px" align="right">身份证号</td>
	<td><input type="text" name="shenfen" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
   <tr>
    <td width="140px" align="right">管理员电话</td>
	<td><input type="text" name="dianhua" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
   <tr>
    <td width="140px" align="right">管理员邮件</td>
	<td><input type="text" name="email" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
   <tr>
    <td width="140px" align="right">管理员住址</td>
	<td><input type="text" name="where" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
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
