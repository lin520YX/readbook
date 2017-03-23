<?php
include "../../common/config.inc.php";
$time=date("Y-m-d H:i:s");
$username=$_POST['username'];
$password=$_POST['password'];
$ip=$_SERVER["REMOTE_ADDR"];
$sql="select * from admin where Admin_name='$username' and Admin_pass='$password'";
$result=mysql_query($sql);
if(mysql_num_rows($result)>0)
{
   session_start();
   $_SESSION["admin"]=$username;
   mysql_query("update admin set Admin_ip='$ip',Admin_login='$time' where Admin_name='$username'");
   echo "<script language=\"javascript\">alert(\"µÇÂ¼³É¹¦£¡£¡\");location.href=\"../admin.php\";</script>";
}
else
{
   echo "<script language=\"javascript\">alert(\"µÇÂ¼Ê§°Ü£¡£¡\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
}
?>