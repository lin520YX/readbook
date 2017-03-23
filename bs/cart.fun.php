<?php
require "../common/config.inc.php";
require "../common/function.php";
$id=$_POST["id"];
session_start();
if(!isset($_SESSION["admin"]))
{
  echo "<script language=\"javascript\">alert(\"请先登录！！\");location.href=\"../login.php?id=".$id."\";</script>";
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
      $insert="insert into cart(title,price,seat,nums,users) value('$title','$price','$value','1','$username')";//每个座位的票对应一行数据
	  $result=mysql_query($insert);
   }
   if($result)
   {
       echo "<script language=\"javascript\">alert(\"加入成功！！\");location.href=\"../mycart.php\";</script>";
   }
   else
   {
      echo "<script language=\"javascript\">alert(\"加入失败！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   break;
   case "delete":
   $id=$_GET["id"];
   $delete="delete from cart where id='$id'";
   if(mysql_query($delete))
   {
       echo "<script language=\"javascript\">alert(\"删除成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   else
   {
       echo "<script language=\"javascript\">alert(\"删除失败！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   break;
   case "all":
   $delete="delete from cart where users='$username'";
   if(mysql_query($delete))
   {
       echo "<script language=\"javascript\">alert(\"清空成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   else
   {
       echo "<script language=\"javascript\">alert(\"清空失败！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
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
		    echo "<script language=\"javascript\">alert(\"下单成功！！\");location.href=\"../index.php\";</script>";
		}
   } 
   else
   {
       echo "<script language=\"javascript\">alert(\"下单失败！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
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
	      echo "<script language=\"javascript\">alert(\"退票成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
		  mysql_query("delete from info where did='$id'");
	   }
	   else
	   {
	      echo "<script language=\"javascript\">alert(\"退票失败！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
	   }
   }
   else
   {
       echo "<script language=\"javascript\">alert(\"该订单不存在，请刷新页面！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
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
	      echo "<script language=\"javascript\">alert(\"取票成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
	   }
	   else
	   {
	      echo "<script language=\"javascript\">alert(\"取票失败！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
	   }
   }
   else
   {
       echo "<script language=\"javascript\">alert(\"该订单不存在，请刷新页面！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
   }
   break;
}
?>