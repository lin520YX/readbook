<?php
require "common/header.php";
require "session.php";
$username=$_SESSION["admin"];
$sql="select * from admin where Admin_name='$username'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
?>
<script language="javascript">

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

</script>
<div class="main">

  <div class="container" style="background:rgba(255, 255, 255, 0.3); margin-bottom:15px;">
  <div class="bac" style=" text-align: left;">	

<div id="title" style=" text-align:center; padding-bottom:6px;">���ϱ༭</div>
<form action="include/admin.fun.php?deal=update"  method="post" name="form1" enctype="multipart/form-data" onSubmit="return checksignup()">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr height="40px">
    <td width="42%" align="right">��¼�˺ţ�</td>
	<td><input type="text" name="yonghu" value="<?php echo $rows["Admin_name"];?>" style="width:200px; height:25px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
  <tr  height="40px">
    <td width="45%" align="right">��¼���룺</td>
	<td><input type="password" name="password" value="<?php echo $rows["Admin_pass"];?>" style="width:200px; height:25px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
  <tr height="40px">
    <td width="42%" align="right">��Ա������</td>
	<td><input type="text" name="xingming" value="<?php echo $rows["Admin_xingming"];?>" style="width:200px; height:25px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
  <tr height="40px">
    <td width="42%" align="right">���֤�ţ�</td>
	<td><input type="text" name="shenfen" value="<?php echo $rows["Admin_shenfen"];?>" style="width:200px; height:25px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
   <tr height="40px">
    <td width="42%" align="right">��ϵ�绰��</td>
	<td><input type="text" name="dianhua" value="<?php echo $rows["Admin_phone"];?>" style="width:200px; height:25px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
   <tr height="40px">
    <td width="42%" align="right" >��Ա�ʼ���</td>
	<td><input type="text" name="email" value="<?php echo $rows["Admin_email"];?>" style="width:200px; height:25px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
   <tr height="40px" >
    <td width="42%" align="right" >��Աסַ��</td>
	<td><input type="text" name="where" value="<?php echo $rows["Admin_where"];?>" style="width:200px; height:25px; background-color:#FFFFFF;" /><font color="#FF0000">*</font></td>
  </tr>
  
  <tr  height="50px">
    <td colspan="2">
	<div style="text-align:center; color:#FFFFFF;"><input type="submit" name="submit" value="�� ��" style="background-color:#0081BC; border:1px #0081BC solid;"/>
</td>
  </tr> 
</table>
</form>
</div>
</div>
</div>

<?php
require "common/footer.php";
?>