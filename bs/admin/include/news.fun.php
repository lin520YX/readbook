<?php
  include "../../common/config.inc.php";
  session_start();
  $username=$_SESSION['admin'];
  $time=date("Y-m-d H:i:s");
  $Variable=$_GET['deal'];
  switch($Variable)
  {
     case "insert":
     $leibie=$_POST["leibie"];
     $title=$_POST["title"];
     $zhaiyao=$_POST["zhaiyao"];
     $content=$_POST["content"];
     $create=$_POST["create"];
	 $select="select * from news where News_title='$title'";
	 $result2=mysql_query($select);
	 $count=mysql_num_rows($result2);
	 if(!$count)
	 {
	 	$insert="insert into news(News_leibie,News_title,News_jianjie,News_content,News_create,News_date) value('$leibie','$title','$zhaiyao','$content','$create','$time')";
             $result3=mysql_query($insert);
             if($result3)
             {
             	echo "<script language=\"javascript\">alert(\"��ӳɹ�����\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
             }
            else
            {
            	echo "<script language=\"javascript\">alert(\"���ʧ�ܣ���ȷ�ϣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
            }
	 }
	 else
	 {
	 	echo "<script language=\"javascript\">alert(\"�ñ����Ѵ��ڣ���ȷ�ϣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
	 }
     break;
     case "delete":
     $newsid=$_POST["newsid"];
     if(!empty($newsid))
     {
         foreach($newsid as $value)
         {
         	$sql="delete from news where News_id='$value'";
     	    $result=mysql_query($sql);
         }
         if($result)
         {
            echo "<script language=\"javascript\">alert(\"ɾ���ɹ�����\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
         }
        else
         {
           echo "<script language=\"javascript\">alert(\"ɾ��ʧ�ܣ���ȷ�ϣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
         }
     }
     else
     {
     	echo "<script language=\"javascript\">alert(\"��ѡ��Ҫɾ���ģ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
     }
     break;
     case "update":
     $id=$_POST["id"];
     $leibie=$_POST["leibie"];
     $title=$_POST["title"];
     $zhaiyao=$_POST["zhaiyao"];
     $content=$_POST["content"];
     $create=$_POST["create"];
	 $select="select * from news where News_id='$id'";
	 $result2=mysql_query($select);
	 $count=mysql_num_rows($result2);
	 if($count)
	 {
            $update="update news set News_leibie='$leibie',News_title='$title',News_jianjie='$zhaiyao',News_content='$content',News_create='$create',News_date='$time' where News_id='$id'";
            $result5=mysql_query($update);
            if($result5)
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
	 	echo "<script language=\"javascript\">alert(\"�����²����ڣ���ȷ�ϣ���\");location.href=\"".$_SERVER["HTTP_REFERER"]."\";</script>";
	 }
     break;
  }
?>
