<?php
require "common/header.php";
$id=$_GET["id"];
$sql="select * from movie where Movie_id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
?>
<div class="main">
  <div class="container" style="background:rgba(255, 255, 255, 0.3); margin-bottom:15px;">
    <div class="bac" >
        <div class="col-xs-12 col-sm-6 col-md-4"  style="text-align:center;">
         <img src="<?php echo $rows["Movie_picture"];?>" width="270px"  height="405px" />
            </div>
             <div class="col-xs-12 col-sm-6 col-md-8" >
                <div style=" margin-left:50px; margin-top:30px; padding:30px">
                    ӰƬ���ƣ�<?php echo $rows["Movie_title"];?><br>
                    ӰƬ���<?php echo $rows["Movie_type"];?><br>
                    ��&nbsp;ӳ&nbsp;�� ��<?php echo $rows["Movie_fangying"];?><br>
                    ӰƬƱ�ۣ�<?php echo $rows["Movie_price"];?> Ԫ<br>
                    ӰƬ���ȣ�<?php echo $rows["Movie_pianchang"];?><br>
                    ӰƬ���ݣ�<?php echo $rows["Movie_daoyan"];?><br>
                    ӰƬ��磺<?php echo $rows["Movie_bianji"];?><br>
                    ӰƬ���أ�<?php echo $rows["Movie_where"];?><br>
                    ���й�˾��<?php echo $rows["Movie_gongsi"];?><br>
                    ����ʱ�䣺<?php echo $rows["Movie_date"];?><br><br>
                        <a href="seat.php?id=<?php echo $rows["Movie_id"];?>" ><img src="images/order.png"></a><br>
                <div style="margin:20px auto"> <?php echo $rows["Movie_content"];?></div>
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
