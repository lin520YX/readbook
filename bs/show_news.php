<?php
require "common/header.php";
$id=$_GET["id"];
$sql="select * from news where News_id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
?>
<div id="main"><br />
    <table width="94%" cellpadding="0" cellspacing="0" border="0" align="center">
        <tr height="10px">
            <td>
            </td>
        </tr>
        <tr height="20px" align="center">
            <td>
                <b><?php echo $rows["News_title"];?></b>
            </td>
        </tr>
        <tr height="20px" align="center">
            <td>
                <font size="-1">发布时间：<?php echo $rows["News_date"];?></font>
            </td>
        </tr>
        <tr height="20px">
            <td><?php echo $rows["News_content"];?></td>
        </tr>
    </table>
</div>
<?php
require "common/footer.php";
?>