<?php
include "../common/config.inc.php";
include "session.php";
$Page_size=8; 
$sql="select * from admin where Admin_quanxian='0'";
$result=mysql_query($sql);   
$count=mysql_num_rows($result);   
$page_count = ceil($count/$Page_size); 
$init=1;   
$page_len=7;   
$max_p=$page_count;   
$pages=$page_count;
//�жϵ�ǰҳ��   
if(empty($_GET['page'])||$_GET['page']<0){   
$page=1;   
}else {   
$page=$_GET['page'];   
}
$offset=$Page_size*($page-1); 
$sql="select * from admin where Admin_quanxian='0' order by Admin_id desc limit $offset,$Page_size"; 
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body id="page">
<h2 style=" background-color:#0065AF;">&nbsp;&nbsp;�û�����</h2>
<table width="100%" cellpadding="0px" cellspacing="0px" border="0px" align="center">
<tr bgcolor="#E3EFFB">
<td height="30px" width="10%" align="center">�û��˻�</td>
<td align="center" width="16%">�û�����</td>
<td align="center" width="16%">���֤��</td>
<td align="center" width="10%">�û��绰</td>
<td align="center" width="10%">�û�����</td>
<td align="center" width="25%">�û�סַ</td>
<td align="center" width="15%">ע������</td>
</tr>
<tr>   
<td colspan="7" bgcolor="#E0EEE0"></td>   
</tr> 
<?php 
$i=1;
$result=mysql_query($sql);   
while ($row=mysql_fetch_array($result)) {   
?>
<tr>  
<td height="30px" width="30px" align="center"><?php echo $row['Admin_name'];?> </td>   
<td align="center"><?php echo $row['Admin_xingming'];?></td> 
<td align="center"><?php echo $row['Admin_shenfen'];?> </td>
<td align="center"><?php echo $row['Admin_phone'];?> </td> 
<td align="center"><?php echo $row['Admin_email'];?> </td> 
<td align="center"><?php echo $row['Admin_where'];?> </td> 
<td align="center"><?php echo $row['Admin_date'];?> </td>
</tr>  
 <tr>   
<td colspan="7" bgcolor="#E3EFFB" height="2px"></td>   
</tr> 
<?php   
}   
$page_len = ($page_len%2)?$page_len:$pagelen+1;//ҳ�����   
$pageoffset = ($page_len-1)/2;//ҳ���������ƫ����    
$key='<div class="page">';   
$key.="<span>��&nbsp;$page/$pages&nbsp;ҳ</span>&nbsp;&nbsp; "; //�ڼ�ҳ,����ҳ   
if($page!=1){   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1\">&nbsp;��ҳ&nbsp;</a> "; //��һҳ   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."\">&nbsp;��һҳ&nbsp;</a>"; //��һҳ   
}else {   
$key.="&nbsp;��ҳ&nbsp; ";//��һҳ   
$key.="&nbsp;��һҳ&nbsp;"; //��һҳ   
}   
if($pages>$page_len){   
//�����ǰҳС�ڵ�����ƫ��   
if($page<=$pageoffset){   
$init=1;   
$max_p = $page_len;   
}else{//�����ǰҳ������ƫ��   
//�����ǰҳ����ƫ�Ƴ�������ҳ��   
if($page+$pageoffset>=$pages+1){   
$init = $pages-$page_len+1;   
}else{   
//����ƫ�ƶ�����ʱ�ļ���   
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
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."\">&nbsp;��һҳ&nbsp;</a> ";//��һҳ   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}\">&nbsp;βҳ&nbsp;</a>"; //���һҳ   
}else {   
$key.="&nbsp;��һҳ&nbsp; ";//��һҳ   
$key.="&nbsp;βҳ&nbsp;"; //���һҳ   
}   
$key.='</div>';   
?> 
<tr>   
<td colspan="7" bgcolor="#E3EFFB"><div align="center"><?php echo $key?></div></td>   
</tr>    
</table>
<?php
mysql_close();
?>
</body>
</html>
