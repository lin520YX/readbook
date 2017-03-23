<?php
include "../common/config.inc.php";
include "session.php";
session_start();
$username=$_SESSION['admin'];
$lei="select * from type";
$lei_result=mysql_query($lei);
if(isset($_POST['submit']))
{
    $slei=$_POST["leibie"];
	$Page_size=7; 
   $sql="select * from movie where Movie_type='$slei'";
   $result=mysql_query($sql);   
   $count=mysql_num_rows($result);   
   $page_count = ceil($count/$Page_size); 
   $init=1;   
   $page_len=7;   
   $max_p=$page_count;   
   $pages=$page_count;
//判断当前页码   
   if(empty($_GET['page'])||$_GET['page']<0){   
   $page=1;   
   }else {   
   $page=$_GET['page'];   
   }
   $offset=$Page_size*($page-1); 
   $sql="select * from movie where Movie_type='$slei' order by Movie_id desc limit $offset,$Page_size"; 

}
else
{
$Page_size=7; 
$sql="select * from movie";
$result=mysql_query($sql);   
$count=mysql_num_rows($result);   
$page_count = ceil($count/$Page_size); 
$init=1;   
$page_len=7;   
$max_p=$page_count;   
$pages=$page_count;
//判断当前页码   
if(empty($_GET['page'])||$_GET['page']<0){   
$page=1;   
}else {   
$page=$_GET['page'];   
}
$offset=$Page_size*($page-1); 
$sql="select * from movie order by Movie_id desc limit $offset,$Page_size"; 
}
?>
<!DOCTYPE html>
    <html >
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body id="page">
    <h2 style=" background-color:#0065AF;">&nbsp;&nbsp;影片管理中心</h2>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<form method="post" action="" >
&nbsp;&nbsp;&nbsp;&nbsp;影片类别：&nbsp;&nbsp;<select name="leibie" style="width:100px;">
<?php
while($rows=mysql_fetch_array($lei_result))
{
 echo "<option value=\"".$rows[title]."\">".$rows[title]."</option>";
}
?>
</select>&nbsp;&nbsp;
<input type="submit" name="submit" value="搜 索" style="background-color:#71AD24; color:#FFFFFF;"/>
</form>
</td>
  </tr>
</table>
<form action="include/movie.fun.php?deal=delete_movie"  method="post" enctype="multipart/form-data" >
<table width="100%" cellpadding="0px" cellspacing="0px" border="0px" align="center">
<tr bgcolor="#E3EFFB">
<td height="30px" width="8%" align="center">选择</td>
<td align="center" width="20%">影片名称</td>
<td align="center" width="10%">放映厅</td>
<td align="center" width="15%">放映时间</td>
<td align="center" width="10%">影片类别</td>
<td align="center" width="8%">票价</td>
<td align="center" width="8%">产地</td>
<td align="center" width="11%">操作</td>
</tr>
<tr>   
<td colspan="8" bgcolor="#E0EEE0"></td>   
</tr> 
<?php 
$i=1;
$result=mysql_query($sql);   
while ($row=mysql_fetch_array($result)) {   
?>
<tr>  
<td height="30px" width="30px" align="center">
<input type="checkbox" name="tupianid[]" value="<?php echo $row['Movie_id'];?>" /> </td>   
<td align="center"><?php echo $row['Movie_title'];?></td> 
<td align="center"><?php echo $row['Movie_fangying'];?> </td>
<td align="center"><?php echo $row['Movie_date'];?> </td>
<td align="center"><?php echo $row['Movie_type'];?> </td> 
<td align="center"><?php echo $row['Movie_price'];?> 元</td> 
<td align="center"><?php echo $row['Movie_where'];?> </td>
<td align="center"><a href="update_movie.php?id=<?php echo $row['Movie_id'];?>">更新</a></td> 
</tr>  
 <tr>   
<td colspan="8" bgcolor="#E3EFFB" height="2px"></td>   
</tr> 
<?php   
}   
$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数   
$pageoffset = ($page_len-1)/2;//页码个数左右偏移量    
$key='<div class="page">';   
$key.="<span>共&nbsp;$page/$pages&nbsp;页</span>&nbsp;&nbsp; "; //第几页,共几页   
if($page!=1){   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">&nbsp;首页&nbsp;</a> "; //第一页   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">&nbsp;上一页&nbsp;</a>"; //上一页   
}else {   
$key.="&nbsp;首页&nbsp; ";//第一页   
$key.="&nbsp;上一页&nbsp;"; //上一页   
}   
if($pages>$page_len){   
//如果当前页小于等于左偏移   
if($page<=$pageoffset){   
$init=1;   
$max_p = $page_len;   
}else{//如果当前页大于左偏移   
//如果当前页码右偏移超出最大分页数   
if($page+$pageoffset>=$pages+1){   
$init = $pages-$page_len+1;   
}else{   
//左右偏移都存在时的计算   
$init = $page-$pageoffset;   
$max_p = $page+$pageoffset;   
}   
}   
}   
for($i=$init;$i<=$max_p;$i++){   
if($i==$page){   
$key.=' <span>'.$i.'</span>';   
} else {   
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\">".$i."</a>";   
}   
}   
if($page!=$pages&&$pages!=0){   
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">&nbsp;下一页&nbsp;</a> ";//下一页   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">&nbsp;尾页&nbsp;</a>"; //最后一页   
}else {   
$key.="&nbsp;下一页&nbsp; ";//下一页   
$key.="&nbsp;尾页&nbsp;"; //最后一页   
}   
$key.='</div>';   
?> 
<tr> 
<td bgcolor="#E3EFFB" width="100px" align="center"><input type="submit" name="submit" value="删 除" style="background-color:#71AD24; color:#FFFFFF;"/></td>  
<td colspan="7" bgcolor="#E3EFFB"><div align="center"><?php echo $key;?></div></td>   
</tr>    
</table>
</form>
<?php
mysql_close();
?>
</body>
</html>
