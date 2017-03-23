<?php
    require "common/header.php";
    require "session.php";
    $username=$_SESSION["admin"];
    $sql="select * from cart where users='$username' order by id desc ";
    $result=mysql_query($sql);
?>
<div class="main">
  <div class="container" style="background:rgba(255, 255, 255, 0.3); margin-bottom:15px;">
    <div class="bac" >
       <div class="col-xs-12 col-sm-6 col-md-4"  style="text-align:center;">
        <img src="file/1463384991.jpg" width="270px"  height="405px" />
       </div>
            <div class="col-xs-12 col-sm-6 col-md-8" >
            <div style=" margin-top:30px; padding:30px">
                <form action="include/cart.fun.php?deal=order"  method="post" name="form1" enctype="multipart/form-data" onSubmit="return checksignup()">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr height="30px" bgcolor="#0081BC" align="center">
                            <td colspan="5">
                                <font color="#FFFFFF" size="+2"><b>电影信息</b>
                                 </font>
                            </td>
                        </tr>
                        <tr bgcolor="#0081BC" height="30px">
                            <td >
                                <font color="#FFFFFF"><b>名称</b></font>
                            </td>
                            <td align="center">
                                <font color="#FFFFFF"><b>席位</b></font>
                            </td>
                            <td align="center" >
                                <font color="#FFFFFF"><b>票价</b></font>
                            </td>
                            <td align="left">
                                <font color="#FFFFFF"><b>数量</b></font>
                            </td>
                            <td align="center" >
                                <font color="#FFFFFF"><b>小计</b></font>
                            </td>
                        </tr>
                        <tr height="20"><td colspan="5"></td></tr>
                            <?php
                            $num=0;
                            while($rows=mysql_fetch_array($result))
                            {
                              if(select_seat($rows["title"],$rows["seat"]))
                              {
                            ?>
                        <tr>
                            <td><?php echo $rows["title"];?></td>
                            <td align="center"><?php echo $rows["seat"];?></td>
                            <td align="center"><?php echo $rows["price"];?></td>
                            <td align=" left"><?php echo $rows["nums"];?></td>
                            <td align="center"><?php echo $rows["price"]*$rows["nums"];$num=$num+$rows["price"]*$rows["nums"];?></td>
                        </tr>
                        <tr height="2" bgcolor="#0081BC"><td colspan="5"></td></tr>
                        <?php
                              }
                            }
                            $pay="select * from pay";
                            $result2=mysql_query($pay);
                        ?>
                        <tr height="20"><td colspan="5"></td></tr>
                        <tr height="30px" bgcolor="#0081BC">
                            <td colspan="5" align="right">
                                <font color="#FFFFFF" size="+2">
                                   <b>总金额：<?php echo $num;?></b>
                                        </font>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <tr height="20"><td colspan="5"></td></tr>
                        <tr height="30px" bgcolor="#0081BC" align="center">
                            <td colspan="5"><font color="#FFFFFF" size="+2"><b>购买信息</b></font></td>
                        </tr>
                        <tr height="20"><td colspan="5"></td></tr>
                        <tr height="30px">
                        <td colspan="1"></td>
                        <td colspan="2">方式：<select name="pay" style="width:100px;  background-color:#FFFFFF;">
                        <?php
                            while($rows2=mysql_fetch_array($result2))
                            {
                             echo "<option value=\"".$rows2["title"]."\">".$rows2["title"]."</option>";
                            }
                        ?>
                        </select>
                        </td>
                            <td colspan="2"></td>
                        </tr>
                        <tr height="30px">
                            <td colspan="1"></td>
                            <td colspan="2">六位数字：<input type="text" name="shenfen" value="" style="width:200px; height:16px; background-color:#FFFFFF;" /><font color="#FF0000">作为领票时的凭证</font></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr height="20"><td colspan="5"></td></tr>
                        <tr height="30px"><td colspan="5" align="center"><input type="submit" name="submit" value="提 交" style="width:60px; min-height:20px; background-color:#0081BC; border:1px solid #0081BC;"></td></tr>
                </table>
                </form>
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