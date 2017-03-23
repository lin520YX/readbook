<?php
    include "common/config.inc.php";
    include "session.php";
    require "common/header.php";
    $id=$_GET["id"];
    $sql="select * from dingdan where id='$id'";
    $result=mysql_query($sql);
    $rows=mysql_fetch_array($result);
?>
<div id="main">
    <div class="container" style="background:rgba(255, 255, 255, 0.3); margin-bottom:15px;">
        <div class="bac" >
             <div class="col-xs-12 col-sm-12 col-md-12" >
	            <table width="100%" cellpadding="0px" cellspacing="0px" border="1px" align="center">
                    <tr>
                        <td colspan="2" align="center"><font size="+1"><b>下单信息</b></font></td></tr>
                    <tr>
                        <td align="right">下单账户</td>
                        <td><?php echo $rows["users"];?></td>
                    </tr>
                    <tr>
                        <td align="right">领票凭证</td>
                        <td><?php echo $rows["shenfen"];?></td>
                    </tr>
                    <tr>
                        <td align="right">付款方式</td>
                        <td><?php echo $rows["pay"];?></td>
                    </tr>
                    <tr>
                        <td align="right">下单时间</td>
                        <td><?php echo $rows["shijian"];?></td>
                    </tr>
                </table>
                    <?php
                    $select="select * from info where did='$id'";
                    $resu=mysql_query($select);
                    ?>
                  <div class="col-xs-12 col-sm-4 col-md-3" pro_pic_bg>
                  </div>
		          <div class="col-xs-12 col-sm-4 col-md-3" pro_pic_bg>
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