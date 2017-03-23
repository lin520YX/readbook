<?php
require "common/header.php";
?>

<div class="main">
  <div class="container" style="background:rgba(255, 255, 255, 0.3); margin-bottom:15px;">
    <div class="bac" >
      
      <div class="col-xs-12 col-sm-12 col-md-12" >
	  
         <div class="col-xs-12 col-sm-4 col-md-4" pro_pic_bg>
 
            <div class="thumbnail pro_pic">
                <a href="show_movie.php?id=<?php echo mid();?>">
                    <img  src="<?php echo picture();?>" class="img-thumbnail"/ width="413" height="338">
                </a>
              <h4>
                <a href=="show_movie.php?id=<?php echo mid();?>" ><?php echo title();?></a>
              </h4>
            </div>
			
			<div style="text-align:center; margin-bottom:10px;">111分钟&nbsp;-&nbsp;<?php echo type();?><br><?php echo pianchang();?><br><br>
			    <a href="show_movie.php?id=<?php echo mid();?>"><img src="images/order.png" width="150px" height="39px" /></a>
			</div>
			<div class="thumbnail pro_pic">
			    <a href="show_movie.php?id=<?php echo mid2();?>">
			        <img  src="<?php echo picture2();?>" class="img-thumbnail"/ width="413" height="338">
			    </a>
              <h4>
                <a href=="show_movie.php?id=<?php echo mid2();?>" title="精品玉石"><?php echo title2();?></a>
              </h4>
            </div>
			
			<div style="text-align:center; margin-bottom:10px;">111分钟&nbsp;-&nbsp;<?php echo type2();?><br><?php echo pianchang2();?><br><br>
			    <a href="show_movie.php?id=<?php echo mid2();?>">
			        <img src="images/order.png" width="150px" height="39px" />
			    </a>
			</div>
          </div>
		  <div class="col-xs-12 col-sm-8 col-md-8">
		  <?php 
                $sql="select * from movie order by Movie_id desc limit 1,12";
                $result=mysql_query($sql);

            ?>
		  <?php

            while($row=mysql_fetch_array($result))
             {
    
	    echo "<div class='col-xs-12 col-sm-4 col-md-4 pro_pic_bg'>
		 <div class='thumbnail pro_pic'>
		    <a href=\"show_movie.php?id=".$row["Movie_id"]."\">
		        <img  src=\"".$row["Movie_picture"]."\"  class='img-thumbnail'/ >
		    </a>
              <h4>
                <a href=\"show_movie.php?id=".$row["Movie_id"]."\" >".$row["Movie_title"]."</a>
              </h4>
            </div>
			<div style='text-align:center; margin-bottom:10px;'>".$row["Movie_pianchang"]."&nbsp;-&nbsp;".$row["Movie_type"]."<br>
			".$row["Movie_fangying"]."
			<br>
			    <a href=\"show_movie.php?id=".$row["Movie_id"].">
			        <img src=\"images/order.png\"  width=\"90px\"  height=\"25px\" />
			    </a>
			</div>
        
          </div>";
           }
        ?>
          </div>
         </div>
        </div>
      </div>
<?php
require "common/footer.php";
?>
</body>
</html>


