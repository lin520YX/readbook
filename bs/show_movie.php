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
                    影片名称：<?php echo $rows["Movie_title"];?><br>
                    影片类别：<?php echo $rows["Movie_type"];?><br>
                    放&nbsp;映&nbsp;厅 ：<?php echo $rows["Movie_fangying"];?><br>
                    影片票价：<?php echo $rows["Movie_price"];?> 元<br>
                    影片长度：<?php echo $rows["Movie_pianchang"];?><br>
                    影片导演：<?php echo $rows["Movie_daoyan"];?><br>
                    影片编剧：<?php echo $rows["Movie_bianji"];?><br>
                    影片产地：<?php echo $rows["Movie_where"];?><br>
                    发行公司：<?php echo $rows["Movie_gongsi"];?><br>
                    播放时间：<?php echo $rows["Movie_date"];?><br><br>
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
