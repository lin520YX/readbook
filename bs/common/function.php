<?php
function chinesesubstr($str,$star,$len)
{//定义一个函数，规定你要截取的字符串，开始位置，结束位置
	$strlen=$star+$len;//定义你要截取字符 的长度
	$tmpstr="";
	for($i=0;$i<$strlen;$i++)
	{
		if (ord(substr($str, $i,1))>0xa0)
		{
			
			$tmpstr.=substr($str,$i,2);
			$i++;
		
	     }
	    else 
	    {
		$tmpstr.=substr($str,$i,1);
		
	     }
	}
	return $tmpstr;	
}

function mid()
{
   $sql="select * from movie order by Movie_id desc limit 1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_id"];
}

function title()
{
   $sql="select * from movie order by Movie_id desc limit 1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_title"];
}

function type()
{
   $sql="select * from movie order by Movie_id desc limit 1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_type"];
}

function pianchang()
{
   $sql="select * from movie order by Movie_id desc limit 1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_pianchang"];
}

function picture()
{
   $sql="select * from movie order by Movie_id desc limit 1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_picture"];
}

function price()
{
   $sql="select * from movie order by Movie_id desc limit 1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_price"];
}









function select_seat($title,$seat)
{
   $sql="select * from movie where Movie_title='$title'";
   $result=mysql_query($sql);
   $count=mysql_num_rows($result);
   if($count)
   {
      $rows=mysql_fetch_array($result);
      $mid=$rows["Movie_id"];
	  $select="select * from info where pid='$mid' and seat='$seat'";
	  $resu=mysql_query($select);
	  $count2=mysql_num_rows($resu);
	  if($count2)
	  {
	     return 0;
	  }
	  else
	  {
	     return 1;
	  }
	  
   }
   else
   {
      return 0;
   }
}

function pid($title)
{
   $sql="select * from movie where Movie_title='$title'";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_id"];
}

function fangying($title)
{
   $sql="select * from movie where Movie_title='$title'";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_fangying"];
}

function title1($id)
{
  $sql="select * from movie where Movie_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);
  return $rows["Movie_title"];
}

function fangying1($id)
{
  $sql="select * from movie where Movie_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);
  return $rows["Movie_fangying"];
}

function type1($id)
{
  $sql="select * from movie where Movie_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);
  return $rows["Movie_type"];
}

function chandi1($id)
{
  $sql="select * from movie where Movie_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);
  return $rows["Movie_where"];
}

function shijian1($id)
{
  $sql="select * from movie where Movie_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);
  return $rows["Movie_date"];
}







function mid2()
{
   $sql="select * from movie order by Movie_id desc limit 1,1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_id"];
}

function title2()
{
   $sql="select * from movie order by Movie_id desc limit 1,1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_title"];
}

function type2()
{
   $sql="select * from movie order by Movie_id desc limit 1,1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_type"];
}

function pianchang2()
{
   $sql="select * from movie order by Movie_id desc limit 1,1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_pianchang"];
}

function picture2()
{
   $sql="select * from movie order by Movie_id desc limit 1,1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_picture"];
}

function price2()
{
   $sql="select * from movie order by Movie_id desc limit 1,1";
   $result=mysql_query($sql);
   $rows=mysql_fetch_array($result);
   return $rows["Movie_price"];
}
?>





