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
	    window.alert('���������Ա�˻�!!');
		document.form1.username.focus();
	 }
	 else 
	if( document.form1.password.value == '' )
	{
	    window.alert('���������Ա����!!');
		document.form1.password.focus();
	 }
	 else 
	if( document.form1.xingming.value == '' )
	{
	    window.alert('���������Ա����ʵ����!!');
		document.form1.xingming.focus();
	 }
	  else 
	if( document.form1.shenfen.value == '' )
	{
	    window.alert('���������Ա�����֤��!!');
		document.form1.shenfen.focus();
	 }
	 else 
	if( document.form1.dianhua.value == '' )
	{
	    window.alert('���������Ա�绰!!');
		document.form1.dianhua.focus();
	 }
	 else 
	if( document.form1.email.value == '' )
	{
        window.alert('���������Ա��������!!');
		document.form1.email.focus();
	 }
	  else 
	if( document.form1.where.value == '' )
	{
        window.alert('���������Ա��ͥסַ!!');
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
<h2 style=" background-color:#0065AF;">&nbsp;&nbsp;���������˻�</h2>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="140px" align="right">����Ա�˺�</td>
	<td><input type="text" name="yonghu" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td width="140px" align="right">����Ա����</td>
	<td><input type="password" name="password" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td width="140px" align="right">����Ա����</td>
	<td><input type="text" name="xingming" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
  <tr>
    <td width="140px" align="right">���֤��</td>
	<td><input type="text" name="shenfen" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
   <tr>
    <td width="140px" align="right">����Ա�绰</td>
	<td><input type="text" name="dianhua" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
   <tr>
    <td width="140px" align="right">����Ա�ʼ�</td>
	<td><input type="text" name="email" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
   <tr>
    <td width="140px" align="right">����Աסַ</td>
	<td><input type="text" name="where" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
  
  <tr>
    <td colspan="2">
<div style="margin-left:100px; float:left;"><input type="submit" name="submit" value="�� ��" style="background-color:#E3EFFB;"/></div>
</td>
  </tr> 
</table>

</form>
</body>
</html>
