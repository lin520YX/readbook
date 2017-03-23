<?php
require "common/header.php";
$id=$_GET["id"];
$sql="select * from movie where Movie_id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
?>
    <script language="javascript">

    function checksignup()
    {
        if( document.form1.seat.value == '' )
        {
            window.alert('请选择座位号!!');
            document.form1.seat.focus();
         }
      else
       {
        return true;
        }
        return false;
    }
    </script>

<div class="main">
  <div class="container" style="background:rgba(255, 255, 255, 0.3); margin-bottom:15px;">
    <div class="bac" style=" text-align: left;">
        <div class="col-xs-12 col-sm-6 col-md-4"  style="text-align:center;">
            <img src="<?php echo $rows["Movie_picture"];?>" width="270px"  height="405px" />
        </div>
              <?php
                $fangid=$rows["Movie_fangyingid"];
                $select="select * from fangying where id='$fangid'";
                $result=mysql_query($select);
                $rows1=mysql_fetch_array($result);
                $seat=$rows1["seat"];
              ?>
    <div class="col-xs-12 col-sm-6 col-md-8" >
        <form action="include/cart.fun.php?deal=insert" method="post" name="form1" enctype="multipart/form-data">
            <table width="100%" cellpadding="0" cellspacing="0" border="0" align="left">
                 <tr align="left">
                    <td>
                        <font size="+2"><b><?php echo $rows1["title"]?></b></font>&nbsp;&nbsp;共有&nbsp;&nbsp;<font size="+2"><b><?php echo $seat;?></b></font>个席位</td>
                        </tr>
                             <tr height="30px">
                                <td>
                                    <input type="hidden" name="title" value="<?php echo $rows["Movie_title"];?>" />
                                 </td>
                             </tr>
                            <tr align="left">
                                <input type="hidden" name="price" value="<?php echo $rows["Movie_price"];?>" />
                                <input type="hidden" name="id" value="<?php echo $id;?>" />
                              <td>
                                <?php
                                    for($i=1;$i<=$seat;$i++)
                                    {
                                      if($i%6==0)
                                      {
                                         if(!select_seat($rows["Movie_title"],$i))
                                         {
                                             echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"images/seat2.png\" alt=\"".$i."座\" title=\"".$i."座\">";
                                             echo "<br >";
                                          }
                                          else
                                          {
                                             echo "<input type=\"checkbox\" name=\"seat[]\" value=\"".$i."\"/><img src=\"images/seat1.png\" alt=\"".$i."座\" title=\"".$i."座\">";
                                             echo "<br >";
                                          }
                                      }
                                      else
                                      {
                                        if(!select_seat($rows["Movie_title"],$i))
                                         {
                                           echo "&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"images/seat2.png\" alt=\"".$i."座\" title=\"".$i."座\">";
                                         }
                                         else
                                          {
                                             echo "<input type=\"checkbox\" name=\"seat[]\" value=\"".$i."\"/><img src=\"images/seat1.png\" alt=\"".$i."座\" title=\"".$i."座\">";
                                          }
                                      }

                                    }
                                ?>
                              </td>
                            </tr>
                        <tr height="30px">
                            <td>
                            </td>
                        </tr>
                        <tr height="30px">
                            <td align="center"><img src="images/seat1.png" />可选座位<img src="images/seat2.png" />不可选座位</td>
                        </tr>
                        <tr height="30px">
                            <td></td>
                        </tr>
                        <tr align="left">
                            <td>
                                <input type="image" src="images/order.png" name="submit" />
                            </td>
                        </tr>
              </table>
        </form>
            </div>
        </div>
      </div>
 </div>
    <?php
    require "common/footer.php";
    ?>
</body>
</html>

