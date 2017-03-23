<?php
require "common/header.php";
if(isset($_GET["id"]))
{
  $id=$_GET["id"];
}
else
{
  $id=0;
}
?>
<script language="javascript">

function checksignup()
{
	if( document.form1.username.value == '' )
	{
	    window.alert('«Î ‰»Îµ«¬º’Àªß!!');
		document.form1.username.focus();
	 }
	 else
	 if( document.form1.password.value == '' )
	{
	    window.alert('«Î ‰»Îµ«¬º√‹¬Î!!');
		document.form1.password.focus();
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
        <div id="title" style=" text-align:center; padding-bottom:6px;">ª·‘±µ«¬º</div>
            <form action="include/admin.fun.php?deal=login&id=0" method="post" name="form1" enctype="multipart/form-data" onSubmit="return checksignup()">
             <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr height="20px">
                    <td></td>
                </tr>
                <tr height="30px">
                 <td align="center">µ«¬Ω’ ªß£∫<input type="text" name="username"  style="height:25px; width:200px; border:solid 1px #cadcb2; font-size:12px; color:#999999;"></td>
                </tr>
                <tr height="10px">
                    <td></td>
                </tr>
                <tr height="30px">
                    <td align="center">µ«¬Ω√‹¬Î£∫<input type="password" name="password"  style="height:25px; width:200px; border:solid 1px #cadcb2; font-size:12px; color:#999999;"></td>
                </tr>
                <tr height="20px">
                    <td></td>
                </tr>
                <tr>
                    <td height="30" align="center">
                    <input type="submit" name="submit" value="µ«¬º" style="width:60px; height:25px; border:0px; background-color:#0081BC; color:#FFFFFF;">
                    &nbsp;&nbsp;
                    <input type="reset" name="reset" value="÷ÿ÷√" style="width:60px; height:25px; border:0px; background-color:#0081BC; color:#FFFFFF;">
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
</body>
</html>