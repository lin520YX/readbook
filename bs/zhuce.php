<?php
require "common/header.php";
?>
<?php
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/index.css\" />";
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

<div id="title" style=" text-align:center; padding-bottom:6px;">��Աע��</div>
<form action="include/admin.fun.php?deal=register"  method="post" name="form1" enctype="multipart/form-data" onSubmit="return checksignup()">
<table width="100%" cellpadding="0" cellspacing="0" border="0"  >
<tr height="40px">
    <td width="42%" align="right">��¼�˺ţ�</td>
	<td>
	    <input type="text" name="yonghu" id="usename" id="zc_zh" /><font >*</font>
          	 </td>
  </tr>
  <tr  height="40px">
    <td width="45%" align="right">��¼���룺</td>
	<td>
	    <input type="password" name="password"id="zc_zh" /><font >*</font>
	    </td>
  </tr>
  <tr height="40px">
    <td width="42%" align="right">��Ա������</td>
	<td>
	    <input type="text" name="xingming" id="zc_zh" /><font>*</font>
	    </td>
  </tr>
  <tr height="40px">
    <td width="42%" align="right">���֤�ţ�</td>
	<td>
	    <input type="text" name="shenfen"id="zc_zh"/><font>*</font>
	</td>
  </tr>
   <tr height="40px">
    <td width="42%" align="right">��ϵ�绰��</td>
	<td>
	    <input type="text" name="dianhua" id="zc_zh" /><font>*</font>
	</td>
  </tr>
   <tr height="40px">
    <td width="42%" align="right" >��Ա�ʼ���</td>
	<td>
	    <input type="text" name="email"id="zc_zh" /><font>*</font>
	    </td>
  </tr>
   <tr height="40px" >
    <td width="42%" align="right" >��Աסַ��</td>
	<td>
	    <input type="text" name="where"id="zc_zh" /><font>*</font>
	</td>
  </tr>
  <tr  height="50px">
    <td colspan="2">
<div style=" text-align:center; color:#FFFFFF;">
    <input type="submit" name="submit" value="ע ��" style="background-color:#0081BC; border:1px #0081BC solid;"/>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="reset" name="reset" value="�� ��" style="background-color:#0081BC; border:1px #0081BC solid;"/></div>
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