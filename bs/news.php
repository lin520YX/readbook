<?php
require "common/header.php";
?>
<div class="main">
  <div class="container" style="background:rgba(255, 255, 255, 0.3); margin-bottom:15px;">
    <div class="bac" style="height:800px;">
	    <?php
        $Page_size=6;
        $sql="select * from news";
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
        $sql="select * from news order by News_id desc limit $offset,$Page_size";
        $result=mysql_query($sql);
        while($rows=mysql_fetch_array($result))

        {
        ?>
<h3 style=" padding-bottom:2px; border-bottom:1px solid #999999;"><a href="show_news.php?id=<?php echo $rows["News_id"];?>"  style="color:#0065AF;"><?php echo $rows["News_title"];?></a></h3>
	<div style="font-size:15px;"><?php echo chinesesubstr(strip_tags($rows["News_content"]),0,160);?></div>
<p  style=" color: #66CCCC"><?php echo $rows["News_create"];?> ������:<span> <?php echo chinesesubstr($rows["News_date"],0,16);?> </span> </p>
<?php
}
$page_len = ($page_len%2)?$page_len:$pagelen+1;//ҳ�����   
$pageoffset = ($page_len-1)/2;//ҳ���������ƫ����    
$key='<div class="page">';   
$key.="<font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;��&nbsp;$pages&nbsp;ҳ&nbsp;</span>&nbsp;&nbsp; </font>&nbsp;"; //�ڼ�ҳ,����ҳ   
if($page!=1){   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&id=".$id."\"><font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;��ҳ&nbsp;&nbsp;</span></font></a>&nbsp; "; //��һҳ   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&id=".$id."\"><font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;��һҳ&nbsp;&nbsp;</span></font></a>&nbsp;"; //��һҳ   
}else {   
$key.="<font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;��ҳ&nbsp;&nbsp;</span></font>&nbsp; ";//��һҳ   
$key.="<font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;��һҳ&nbsp;&nbsp;</span></font>&nbsp;"; //��һҳ   
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
$key.='<font color="#595757"> <span style="border:1px #CCCCCC solid; background-color:#CCCCCC; color:#FFFFFF;">&nbsp;&nbsp;'.$i.'&nbsp;&nbsp;</span></font>&nbsp;';   
} else {   
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&id=".$id."\"><font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;".$i."&nbsp;&nbsp;</span></font></a>&nbsp;";   
}   
}   
if($page!=$pages&&$pages!=0){   
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&id=".$id."\"><font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;��һҳ&nbsp;&nbsp;</span></font></a> &nbsp;";//��һҳ   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&id=".$id."\"><font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;βҳ&nbsp;&nbsp;</span></font></a>&nbsp;"; //���һҳ   
}else {   
$key.="<font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;��һҳ&nbsp;&nbsp;</span></font>&nbsp;";//��һҳ   
$key.="<font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;βҳ&nbsp;&nbsp;</span></font>&nbsp;"; //���һҳ   
}   
$key.='</div>';   
?>
<tr height="25px" align="center"><td><font size="-1"><?php echo $key;?></font></td></tr>
</table>
      </div>
         </div>
            </div>
                <?php
                require "common/footer.php";
                ?>
</body>
</html>
