<?php
  include "../common/config.inc.php";
  $time=date("Y-m-d H:i:s");
  $Variable=$_GET['deal'];
  switch($Variable)
  {
    case "login":
	$time=date("Y-m-d H:i:s");
	$id=$_GET["id"];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $ip=$_SERVER["REMOTE_ADDR"];
    $sql="select * from admin where Admin_name='$username' and Admin_pass='$password'";
	//echo $sql;
    $result=mysql_query($sql);
    if(mysql_num_rows($result)>0)
    {
        session_start();
        $_SESSION["admin"]=$username;
        mysql_query("update admin set Admin_ip='$ip',Admin_login='$time' where Admin_name='$username'");
		if($id==0)
		{
           echo "<script language=\"javascript\">alert(\"��¼�ɹ�����\");location.href=\"../index.php\";</script>";
		}
		else
		{
		   echo "<script language=\"javascript\">alert(\"��¼�ɹ�����\");location.href=\"../seat.php?id=".$id."\";</script>";
		}
    }
    else
    {
         echo "<script language=\"javascript\">alert(\"��¼ʧ�ܣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     }
	break;
    case "register":
    $yonghu=$_POST["yonghu"];
    $pass=$_POST["password"];
	$xingming=$_POST["xingming"];
	$shenfen=$_POST["shenfen"];
	$quanxian=0;
    $dianhua=$_POST["dianhua"];
    $email=$_POST["email"];
    $where=$_POST["where"];
    $sql="select * from admin where Admin_name='$yonghu'";
    $result=mysql_query($sql);
    $count=mysql_num_rows($result);
    if(!$count)
    {
        $insert="insert into admin(Admin_name,Admin_pass,Admin_xingming,Admin_quanxian,Admin_shenfen,Admin_phone,Admin_email,Admin_where,Admin_date) value('$yonghu','$pass','$xingming','$quanxian','$shenfen','$dianhua','$email','$where','$time')";
        $result2=mysql_query($insert);
        if($result2)
        {
        	echo "<script language=\"javascript\">alert(\"ע��ɹ�����\");location.href=\"../index.php\";</script>";
        }
        else
        {
        	echo "<script language=\"javascript\">alert(\"ע��ʧ�ܣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
        }
    }
    else
    {
    	echo "<script language=\"javascript\">alert(\"�û����Ѵ��ڣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
    }
    break;
	case "insert":
    $yonghu=$_POST["yonghu"];
    $pass=$_POST["password"];
	$xingming=$_POST["xingming"];
	$shenfen=$_POST["shenfen"];
	$quanxian=1;
    $dianhua=$_POST["dianhua"];
    $email=$_POST["email"];
    $where=$_POST["where"];
    $sql="select * from admin where Admin_name='$yonghu'";
    $result=mysql_query($sql);
    $count=mysql_num_rows($result);
    if(!$count)
    {
        $insert="insert into admin(Admin_name,Admin_pass,Admin_xingming,Admin_quanxian,Admin_shenfen,Admin_phone,Admin_email,Admin_where,Admin_date) value('$yonghu','$pass','$xingming','$quanxian','$shenfen','$dianhua','$email','$where','$time')";
        $result2=mysql_query($insert);
        if($result2)
        {
        	echo "<script language=\"javascript\">alert(\"ע��ɹ�����\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
        }
        else
        {
        	echo "<script language=\"javascript\">alert(\"ע��ʧ�ܣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
        }
    }
    else
    {
    	echo "<script language=\"javascript\">alert(\"�û����Ѵ��ڣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
    }
    break;
	 case "delete":
     $id=$_GET["id"];
     $sql="delete from admin where Admin_id='$id'";
     $result=mysql_query($sql);
     if($result)
     {
         echo "<script language=\"javascript\">alert(\"ɾ���ɹ�����\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     }
    else
     {
         echo "<script language=\"javascript\">alert(\"ɾ��ʧ�ܣ���ȷ�ϣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     }
     break;
	case "update":
    $yonghu=$_POST["yonghu"];
    $pass=$_POST["password"];
	$xingming=$_POST["xingming"];
	$shenfen=$_POST["shenfen"];
    $dianhua=$_POST["dianhua"];
    $email=$_POST["email"];
    $where=$_POST["where"];
    $sql="select * from admin where Admin_name='$yonghu'";
    $result=mysql_query($sql);
    $count=mysql_num_rows($result);
    if($count)
    {
		$update="update admin set Admin_pass='$pass',Admin_xingming='$xingming',Admin_shenfen='$shenfen',Admin_phone='$dianhua',Admin_email='$email',Admin_where='$where' where Admin_name='$yonghu'";
        $result2=mysql_query($update);
        if($result2)
        {
        	echo "<script language=\"javascript\">alert(\"���³ɹ�����\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
        }
        else
        {
        	echo "<script language=\"javascript\">alert(\"����ʧ�ܣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
        }
    }
    else
    {
    	echo "<script language=\"javascript\">alert(\"�û��������ڣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
    }
    break;
  }
?>
