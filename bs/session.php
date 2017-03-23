<?php
session_start();
if($_SESSION["admin"]=="")
{
	echo "<script>javascript:alert('对不起，请您先登陆！');location.href='login.php';</script>";
	exit;
}
?>