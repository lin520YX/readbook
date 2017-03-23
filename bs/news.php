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
        //判断当前页码
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
<p  style=" color: #66CCCC"><?php echo $rows["News_create"];?> 发布于:<span> <?php echo chinesesubstr($rows["News_date"],0,16);?> </span> </p>
<?php
}
$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数   
$pageoffset = ($page_len-1)/2;//页码个数左右偏移量    
$key='<div class="page">';   
$key.="<font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;共&nbsp;$pages&nbsp;页&nbsp;</span>&nbsp;&nbsp; </font>&nbsp;"; //第几页,共几页   
if($page!=1){   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&id=".$id."\"><font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;首页&nbsp;&nbsp;</span></font></a>&nbsp; "; //第一页   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&id=".$id."\"><font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;上一页&nbsp;&nbsp;</span></font></a>&nbsp;"; //上一页   
}else {   
$key.="<font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;首页&nbsp;&nbsp;</span></font>&nbsp; ";//第一页   
$key.="<font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;上一页&nbsp;&nbsp;</span></font>&nbsp;"; //上一页   
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
$key.='<font color="#595757"> <span style="border:1px #CCCCCC solid; background-color:#CCCCCC; color:#FFFFFF;">&nbsp;&nbsp;'.$i.'&nbsp;&nbsp;</span></font>&nbsp;';   
} else {   
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&id=".$id."\"><font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;".$i."&nbsp;&nbsp;</span></font></a>&nbsp;";   
}   
}   
if($page!=$pages&&$pages!=0){   
$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&id=".$id."\"><font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;下一页&nbsp;&nbsp;</span></font></a> &nbsp;";//下一页   
$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&id=".$id."\"><font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;尾页&nbsp;&nbsp;</span></font></a>&nbsp;"; //最后一页   
}else {   
$key.="<font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;下一页&nbsp;&nbsp;</span></font>&nbsp;";//下一页   
$key.="<font color=\"#595757\"><span style=\"width:30px; height:15px; border:1px #CCCCCC solid; background-color:#FFFFFF;\">&nbsp;&nbsp;尾页&nbsp;&nbsp;</span></font>&nbsp;"; //最后一页   
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
