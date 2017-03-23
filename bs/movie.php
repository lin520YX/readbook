<?php
require "common/header.php";
?>
<div class="main">
  <div class="container" style="background:rgba(255, 255, 255, 0.3); margin-bottom:15px;">
    <div class="bac" >
      <div class="col-xs-12 col-sm-12 col-md-12" >
	   <div class="cat_title">
	   <?php
            $sql="select * from type order by id limit 0,12 ";
            $result=mysql_query($sql);
            while($rows=mysql_fetch_array($result))
                                                     {
 
             echo "<span> <a href=\"movie.php?type=".$rows["id"]."\">".$rows["title"]."</a></span>";
           }
        ?>
	            </div>
                 <?php
                    if(isset($_GET["type"]))
                    {
                       $typeid=$_GET["type"];
                       $sql="select * from movie where Movie_typeid='$typeid' order by Movie_id desc limit 0,12";
                    }
                    else
                    {
                    $sql="select * from movie order by Movie_id desc  limit 0,12";
                    }
                    $result=mysql_query($sql);

                    while($row=mysql_fetch_array($result))
                  {
                    echo "<div class='col-xs-12 col-sm-4 col-md-3 pro_pic_bg'>
		 <div class='thumbnail pro_pic'>
		        <a href=\"show_movie.php?id=".$row["Movie_id"]."\"><img  src=\"".$row["Movie_picture"]."\"  class='img-thumbnail'/ ></a>
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



