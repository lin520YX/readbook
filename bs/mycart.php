<?php
require "common/header.php";
require "session.php";
$username=$_SESSION["admin"];
?>
<div class="main">
  <div class="container" style="background:rgba(255, 255, 255, 0.3); margin-bottom:15px;">
    <div class="bac" >
        <div class="col-xs-12 col-sm-6 col-md-4"  style="text-align:center;"><img src="file/1463384991.jpg" width="270px"  height="405px" /></div>
            <div class="col-xs-12 col-sm-6 col-md-8" >
                <div style=" margin-top:30px; padding:30px">
                    <?php
                    $sql="select * from cart where users='$username' order by id desc ";
                    $result=mysql_query($sql);
                    ?>
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr bgcolor="#0081BC" height="30px">
                        <td><font color="#FFFFFF"><b>名称</b></font></td>
                        <td align="center"><font color="#FFFFFF"><b>席位</b></font></td>
                        <td align="center"><font color="#FFFFFF"><b>票价</b></font></td>
                        <td align="center"><font color="#FFFFFF"><b>数量</b></font></td>
                        <td align="center"><font color="#FFFFFF"><b>小计</b></font></td>
                        <td><font color="#FFFFFF"><b>删除</b></font></td>
                    </tr>
                    <?php
                    $num=0;
                    while($rows=mysql_fetch_array($result))
                    {
                    ?>
                    <tr>
                        <td><?php echo $rows["title"];?></td>
                        <td align="center"><?php echo $rows["seat"];?></td>
                        <td align="center"><?php echo $rows["price"];?></td>
                        <td align="center"><?php echo $rows["nums"];?></td>
                        <td align="center"><?php echo $rows["price"]*$rows["nums"];$num=$num+$rows["price"]*$rows["nums"];?></td>
                        <td><a href="include/cart.fun.php?deal=delete&id=<?php echo $rows["id"];?>">删除</a></td>
                    </tr>
                    <tr height="2" bgcolor="#0081BC"><td colspan="6"></td></tr>
                    <?php
                    }?>
                    <tr height="30" ><td colspan="6"></td></tr>
                    <tr bgcolor="#0081BC" height="30px">
                        <td><font color="#FFFFFF"><b>总计：<?php echo $num?></b></font></td>
                        <td></td>
                        <td><a href="include/cart.fun.php?deal=all"><font color="#FFFFFF"><b>清空</b></font></a></td>
                        <td><a href="index.php"><font color="#FFFFFF"><b>继续</b></font></a></td>
                        <td><a href="pay.php"><font color="#FFFFFF"><b>结账</b></font></a></td>
                        <td></td>
                    </tr>
                    </table>
                </div>
            </div>
       </div>
    </div>
 </div>
<?php
require "common/footer.php";
?>
</body>
</html>
