<?php
require "../common/config.inc.php";
require "../common/function.php";
$id=$_POST["id"];
session_start();
if(!isset($_SESSION["admin"]))
{
  echo "<script language=\"javascript\">alert(\"���ȵ�¼����\");location.href=\"../login.php?id=".$id."\";</script>";
  exit;
}
$username=$_SESSION["admin"];
$time=date("Y-m-d H:i:s");
$Variable=$_GET['deal'];
switch($Variable)
{
   case "insert":
   $title=$_POST["title"];
   $price=$_POST["price"];
   $seat=$_POST["seat"];
   foreach($seat as $value)
   {
      $insert="insert into cart(title,price,seat,nums,users) value('$title','$price','$value','1','$username')";//ÿ����λ��Ʊ��Ӧһ������
	  $result=mysql_query($insert);
   }
   if($result)
   {
       echo "<script language=\"javascript\">alert(\"����ɹ�����\");location.href=\"../mycart.php\";</script>";
   }
   else
   {
      echo "<script language=\"javascript\">alert(\"����ʧ�ܣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   break;
   case "delete":
   $id=$_GET["id"];
   $delete="delete from cart where id='$id'";
   if(mysql_query($delete))
   {
       echo "<script language=\"javascript\">alert(\"ɾ���ɹ�����\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   else
   {
       echo "<script language=\"javascript\">alert(\"ɾ��ʧ�ܣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   break;
   case "all":
   $delete="delete from cart where users='$username'";
   if(mysql_query($delete))
   {
       echo "<script language=\"javascript\">alert(\"��ճɹ�����\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   else
   {
       echo "<script language=\"javascript\">alert(\"���ʧ�ܣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   break;
   case "order":
   $pay=$_POST["pay"];
   $shenfen=$_POST["shenfen"];
   $pay1="select * from pay where title='$pay'";
   $resu=mysql_query($pay1);
   $rows=mysql_fetch_array($resu);
   $payid=$rows["id"];
   $insert="insert into dingdan(users,shijian,pay,payid,shenfen) value('$username','$time','$pay','$payid','$shenfen')";
   if(mysql_query($insert))
   {
        $did=mysql_insert_id();
		$sql="select * from cart where users='$username'";
        $result=mysql_query($sql);
        while($rows2=mysql_fetch_array($result))
		{
		    $title=$rows2["title"];
			$price=$rows2["price"];
			$seat=$rows2["seat"];
			$nums=$rows2["nums"];
			$pid=pid($title);
			$fangying=fangying($title);
			if(select_seat($title,$seat))
			{
			    $insert2="insert into info(did,pid,price,nums,seat,fangying,users,shijian) value('$did','$pid','$price','$nums','$seat','$fangying','$username','$time')";
			    $result2=mysql_query($insert2);
			    mysql_query("delete from cart where users='$username'");
			}
		}
		if($insert2)
		{
		    echo "<script language=\"javascript\">alert(\"�µ��ɹ�����\");location.href=\"../index.php\";</script>";
		}
   } 
   else
   {
       echo "<script language=\"javascript\">alert(\"�µ�ʧ�ܣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   break;
   case "tuipiao":
   $id=$_GET["id"];
   $sql="select * from dingdan where id='$id'";
   $result=mysql_query($sql);
   $count=mysql_fetch_array($result);
   if($count)
   {
       $delete="delete from dingdan where id='$id'";
	   if(mysql_query($delete))
	   {
	      echo "<script language=\"javascript\">alert(\"��Ʊ�ɹ�����\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
		  mysql_query("delete from info where did='$id'");
	   }
	   else
	   {
	      echo "<script language=\"javascript\">alert(\"��Ʊʧ�ܣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
	   }
   }
   else
   {
       echo "<script language=\"javascript\">alert(\"�ö��������ڣ���ˢ��ҳ�棡��\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   break;
   case "qupiao":
   $id=$_GET["id"];
   $sql="select * from dingdan where id='$id'";
   $result=mysql_query($sql);
   $count=mysql_fetch_array($result);
   if($count)
   {
       $update="update dingdan set zhuangtai='1'";
	   if(mysql_query($update))
	   {
	      echo "<script language=\"javascript\">alert(\"ȡƱ�ɹ�����\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
	   }
	   else
	   {
	      echo "<script language=\"javascript\">alert(\"ȡƱʧ�ܣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
	   }
   }
   else
   {
       echo "<script language=\"javascript\">alert(\"�ö��������ڣ���ˢ��ҳ�棡��\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   break;
}
?>