<?php
  include "../../common/config.inc.php";
  session_start();
  $username=$_SESSION['admin'];
  $time=date("Y-m-d H:i:s");
  $Variable=$_GET['deal'];
  switch($Variable)
  {
     case "movie_type":
     $fenlei=$_POST["fenlei"];
     $sql="select * from type where title='$fenlei'";
     $result=mysql_query($sql);
     $count=mysql_num_rows($result);
     if(!$count)
     {
       $insert="insert into type(title,shijian) value('$fenlei','$time')";
       $result2=mysql_query($insert);
       if($result2)
       {
       	   echo "<script language=\"javascript\">alert(\"添加成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
       }
       else
       {
       	  echo "<script language=\"javascript\">alert(\"添加失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
       }
     }
     else
     {
     	 echo "<script language=\"javascript\">alert(\"该类别已存在，请重新输入！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     }
     break;
     case "update_type":
     $id=$_POST["id"];
     $fenlei=$_POST["fenlei"];
     $sql="update type set title='$fenlei' where id='$id'";
     $result=mysql_query($sql);
     if($result)
     {
     	 $sql2="update movie set Movie_type='$fenlei' where Movie_typeid='$id'";
         $result2=mysql_query($sql2);
         if($result2)
         {
         	echo "<script language=\"javascript\">alert(\"更新成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
         }
         else
         {
         	echo "<script language=\"javascript\">alert(\"更新失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
         }
     }
     break;
     case "delete_type":
     $id=$_GET["id"];
     $sql="select * from movie where Movie_typeid='$id'";
     $result=mysql_query($sql);
     $count=mysql_num_rows($result);
     if($count)
     {
     	$delete="delete from movie where Movie_typeid='$id'";
     	$result2=mysql_query($delete);
     	if($result2)
     	{
     		$delete2="delete from type where id='$id'";
     	    $result3=mysql_query($delete2);
     	    if($result3)
     	    {
     	    	echo "<script language=\"javascript\">alert(\"删除成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	    }
     	    else
     	    {
     	    	echo "<script language=\"javascript\">alert(\"删除失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	    }
     	}
     	else
     	{
     		echo "<script language=\"javascript\">alert(\"删除失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	}
     }
     else
     {
     	$delete4="delete from type where id='$id'";
     	$result5=mysql_query($delete4);
     	if($result5)
     	{
     	   echo "<script language=\"javascript\">alert(\"删除成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	}
       else
     	{
     	    echo "<script language=\"javascript\">alert(\"删除失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	}
     }
     break;
	 case "fangying":
     $title=$_POST["title"];
	 $seat=$_POST["seat"];
     $sql="select * from fangying where title='$fenlei'";
     $result=mysql_query($sql);
     $count=mysql_num_rows($result);
     if(!$count)
     {
       $insert="insert into fangying(title,shijian,seat) value('$title','$time','$seat')";
       $result2=mysql_query($insert);
       if($result2)
       {
       	   echo "<script language=\"javascript\">alert(\"添加成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
       }
       else
       {
       	  echo "<script language=\"javascript\">alert(\"添加失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
       }
     }
     else
     {
     	 echo "<script language=\"javascript\">alert(\"该放映厅已存在，请重新输入！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     }
	 break;
	 case "update_fangying":
     $id=$_POST["id"];
     $title=$_POST["title"];
	 $seat=$_POST["seat"];
     $sql="update fangying set title='$title',seat='$seat' where id='$id'";
     $result=mysql_query($sql);
     if($result)
     {
     	 $sql2="update movie set Movie_fangying='$title' where Movie_fangyingid='$id'";
         $result2=mysql_query($sql2);
         if($result2)
         {
         	echo "<script language=\"javascript\">alert(\"更新成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
         }
         else
         {
         	echo "<script language=\"javascript\">alert(\"更新失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
         }
     }
     break;
     case "delete_fangying":
     $id=$_GET["id"];
     $sql="select * from movie where Movie_fangyingid='$id'";
     $result=mysql_query($sql);
     $count=mysql_num_rows($result);
     if($count)
     {
     	$delete="delete from movie where Movie_fangyingid='$id'";
     	$result2=mysql_query($delete);
     	if($result2)
     	{
     		$delete2="delete from fangying where id='$id'";
     	    $result3=mysql_query($delete2);
     	    if($result3)
     	    {
     	    	echo "<script language=\"javascript\">alert(\"删除成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	    }
     	    else
     	    {
     	    	echo "<script language=\"javascript\">alert(\"删除失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	    }
     	}
     	else
     	{
     		echo "<script language=\"javascript\">alert(\"删除失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	}
     }
     else
     {
     	$delete4="delete from fangying where id='$id'";
     	$result5=mysql_query($delete4);
     	if($result5)
     	{
     	   echo "<script language=\"javascript\">alert(\"删除成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	}
       else
     	{
     	    echo "<script language=\"javascript\">alert(\"删除失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	}
     }
     break;
	 case "movie_pay":
     $title=$_POST["title"];
     $sql="select * from pay where title='$title'";
     $result=mysql_query($sql);
     $count=mysql_num_rows($result);
     if(!$count)
     {
       $insert="insert into pay(title) value('$title')";
       $result2=mysql_query($insert);
       if($result2)
       {
       	   echo "<script language=\"javascript\">alert(\"添加成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
       }
       else
       {
       	  echo "<script language=\"javascript\">alert(\"添加失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
       }
     }
     else
     {
     	 echo "<script language=\"javascript\">alert(\"该支付方式已存在，请重新输入！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     }
     break;
     case "update_pay":
     $id=$_POST["id"];
     $title=$_POST["title"];
     $sql="update pay set title='$title' where id='$id'";
     $result=mysql_query($sql);
     if($result)
     {
     	 $sql2="update dingdan set pay='$title' where payid='$id'";
         $result2=mysql_query($sql2);
         if($result2)
         {
         	echo "<script language=\"javascript\">alert(\"更新成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
         }
         else
         {
         	echo "<script language=\"javascript\">alert(\"更新失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
         }
     }
     break;
     case "delete_pay":
     $id=$_GET["id"];
     $sql="select * from dingdan where payid='$id'";
     $result=mysql_query($sql);
     $count=mysql_num_rows($result);
     if($count)
     {
     	$delete="delete from pay where payid='$id'";
     	$result2=mysql_query($delete);
     	if($result2)
     	{
     		$delete2="delete from pay where id='$id'";
     	    $result3=mysql_query($delete2);
     	    if($result3)
     	    {
     	    	echo "<script language=\"javascript\">alert(\"删除成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	    }
     	    else
     	    {
     	    	echo "<script language=\"javascript\">alert(\"删除失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	    }
     	}
     	else
     	{
     		echo "<script language=\"javascript\">alert(\"删除失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	}
     }
     else
     {
     	$delete4="delete from pay where id='$id'";
     	$result5=mysql_query($delete4);
     	if($result5)
     	{
     	   echo "<script language=\"javascript\">alert(\"删除成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	}
       else
     	{
     	    echo "<script language=\"javascript\">alert(\"删除失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     	}
     }
     break;
	 case "insert_movie":
	 function fileExtName ($fStr)
      {
         $retval="";
         $pt=strrpos($fStr,".");
         if($pt)
         $retval=substr($fStr,$pt+1,strlen($fStr)-$pt);
         return($retval);
       }
	 $type=$_POST["type"];
     $fangying=$_POST["fangying"];
	 $title=$_POST["title"];
	 $price=$_POST["price"];
	 $shijian=$_POST["shijian"];
	 $daoyan=$_POST["daoyan"];
	 $bianji=$_POST["bianji"];
	 $where=$_POST["where"];
	 $gongsi=$_POST["gongsi"];
	 $time=$_POST["time"];
	 $content=$_POST["content"];
	 $uploaddir='../file/';
	 $uploaddir2='../../file/';
     $ext=fileExtName($_FILES["picture"]["name"]);
     $ext=strtolower($ext);
     $uploadfile=$uploaddir.time().".".$ext;
	 $uploadfile2=$uploaddir2.time().".".$ext;
	 $photo=ltrim($uploadfile,"./");
	 $sql="select * from type where title='$type'";
	 $result=mysql_query($sql);
	 if($result)
	 {
	 $rows=mysql_fetch_array($result);
	 $typeid=$rows["id"];
	 }
	 $sql="select * from fangying where title='$fangying'";
	 $result=mysql_query($sql);
	 if($result)
	 {
	 $rows=mysql_fetch_array($result);
	 $fangyingid=$rows["id"];
	 }
	 $select="select * from movie where Movie_title='$title'";
	 $result2=mysql_query($select);
	 $count=mysql_num_rows($result2);
	 if(!$count)
	 {
	      $insert="insert into movie(Movie_type,Movie_typeid,Movie_fangying,Movie_fangyingid,Movie_title,Movie_price,Movie_pianchang,Movie_daoyan,Movie_bianji,Movie_where,Movie_gongsi,Movie_picture,Movie_content,Movie_date) value('$type','$typeid','$fangying','$fangyingid','$title','$price','$shijian','$daoyan','$bianji','$where','$gongsi','$photo','$content','$time')";
		  if(mysql_query($insert))
		  {
		      echo "<script language=\"javascript\">alert(\"添加成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
			  move_uploaded_file($_FILES["picture"]["tmp_name"],$uploadfile2);
		  }
		  else
		  {
		      echo "<script language=\"javascript\">alert(\"添加失败！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
		  }
	 }
	 else
	 {
	     echo "<script language=\"javascript\">alert(\"该影片已存在，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
	 }	 
	 break;
	 case "delete_movie":
     $movieid=$_POST["movieid"];
     if(!empty($movieid))
     {
         foreach($movieid as $value)
         {
         	$sql="delete from movie where Movie_id='$value'";
     	    $result=mysql_query($sql);
         }
         if($result)
         {
            echo "<script language=\"javascript\">alert(\"删除成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
         }
        else
         {
           echo "<script language=\"javascript\">alert(\"删除失败，请确认！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
         }
     }
     else
     {
     	echo "<script language=\"javascript\">alert(\"请选择要删除的！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     }
     break;
     case "update_movie":
	 function fileExtName ($fStr)
      {
         $retval="";
         $pt=strrpos($fStr,".");
         if($pt)
         $retval=substr($fStr,$pt+1,strlen($fStr)-$pt);
         return($retval);
       }
	 $id=$_POST["id"];
	 $type=$_POST["type"];
     $fangying=$_POST["fangying"];
	 $title=$_POST["title"];
	 $price=$_POST["price"];
	 $shijian=$_POST["shijian"];
	 $daoyan=$_POST["daoyan"];
	 $bianji=$_POST["bianji"];
	 $where=$_POST["where"];
	 $gongsi=$_POST["gongsi"];
	 $time=$_POST["time"];
	 $content=$_POST["content"];
	 $uploaddir='../file/';
	 $uploaddir2='../../file/';
     $ext=fileExtName($_FILES["picture"]["name"]);
     $ext=strtolower($ext);
     $uploadfile=$uploaddir.time().".".$ext;
	 $uploadfile2=$uploaddir2.time().".".$ext;
	 $photo=ltrim($uploadfile,"./");
	 $sql="select * from type where title='$type'";
	 $result=mysql_query($sql);
	 if($result)
	 {
	 $rows=mysql_fetch_array($result);
	 $typeid=$rows["id"];
	 }
	 $sql="select * from fangying where title='$fangying'";
	 $result=mysql_query($sql);
	 if($result)
	 {
	 $rows=mysql_fetch_array($result);
	 $fangyingid=$rows["id"];
	 }

	 $update="update movie set Movie_type='$type',Movie_typeid='$typeid',Movie_fangying='$fangying',Movie_fangyingid='$fangyingid',Movie_price='$price',Movie_pianchang='$shijian',Movie_daoyan='$daoyan',Movie_bianji='$bianji',Movie_where='$where',Movie_gongsi='$gongsi',Movie_picture='$photo',Movie_content='$content',Movie_date='$time' where Movie_id='$id'"; 
	 if(mysql_query($update))
	 {
		 echo "<script language=\"javascript\">alert(\"更新成功！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
		 move_uploaded_file($_FILES["picture"]["tmp_name"],$uploadfile2);
	 }
	 else
	 {
		 echo "<script language=\"javascript\">alert(\"更新失败！！\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
	 }
	 break;
  }
?>
