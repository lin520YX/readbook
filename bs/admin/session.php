<?php
session_start();
if($_SESSION["admin"]=="")
{
	echo "<script>javascript:alert('�Բ��������ȵ�½��');location.href='login.php';</script>";
	exit;
}
?>