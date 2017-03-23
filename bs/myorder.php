<?php
    require "common/header.php";
    session_start();
    $username=$_SESSION["admin"];
    $Page_size=8;
    $sql="select * from dingdan where users='$username'";
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
    $sql="select * from dingdan where users='$username' order by id desc limit $offset,$Page_size";
?>

<div class="main">
  <div class="container" style="background:rgba(255, 255, 255, 0.3); margin-bottom:15px;">
    <div class="bac" >
       <div class="col-xs-12 col-sm-6 col-md-4"  style="text-align:center;"><img src="file/1463384991.jpg" width="270px"  height="405px" />
       </div>
        <div class="col-xs-12 col-sm-6 col-md-8" >
            <div style=" margin-top:30px; padding:30px">
                <table width="100%" cellpadding="0px" cellspacing="0px" border="0px" align="center">
                    <tr bgcolor="#0081BC">
                        <td align="center" width="16%"><font color="#FFFFFF">凭证</font></td>
                        <td align="center" width="15%"><font color="#FFFFFF">方式</font></td>
                        <td align="center" width="15%"><font color="#FFFFFF">时间</font></td>
                        <td align="center" width="10%"><font color="#FFFFFF">状态</font></td>
                    </tr>
                    <tr>
                        <td colspan="6" bgcolor="#0081BC"></td>
                    </tr>
                    <?php
                        $i=1;
                        $result=mysql_query($sql);
                        while ($row=mysql_fetch_array($result))
                        {
                    ?>
                    <tr>
                        <td align="center"><?php echo $row['shenfen'];?> </td>
                        <td align="center"><?php echo $row['pay'];?> </td>
                        <td align="center"><?php echo $row['shijian'];?> </td>
                        <td align="center"><?php
                        if($row['zhuangtai']==0)
                        {
                           echo "<a href=\"include/cart.fun.php?deal=qupiao&id=".$row['id']."\">领票</a>&nbsp;&nbsp;<a href=\"include/cart.fun.php?deal=tuipiao&id=".$row['id']."\">退票</a>";
                        }
                        else
                        if($row['zhuangtai']==1)
                        {
                           echo "领票成功";
                        }
                        ?>
                        </td>

                    </tr>
                     <tr>
                         <td colspan="6" bgcolor="#0081BC" height="2px"></td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td bgcolor="#0081BC" width="100px" align="center"></td>
                        <td colspan="5" bgcolor="#0081BC"><font color="#FFFFFF"><div align="center"><?php echo $key;?></div></font></td>
                     </tr>
                 </table>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php
mysql_close();
?>
<?php
require "common/footer.php";
?>
</body>
</html>