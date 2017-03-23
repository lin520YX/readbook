<?php
include "../common/config.inc.php";
include "session.php";
require "common/function.php";
$id=$_GET["id"];
$sql="select * from dingdan where id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body id="page">
    <h2 style=" background-color:#0065AF;">&nbsp;&nbsp;订单详情</h2>
        <table width="100%" cellpadding="0px" cellspacing="0px" border="0px" align="center">
            <tr>
                <td colspan="2" align="center"><font size="+1"><b>下单信息</b></font></td>
            </tr>
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
        <table width="100%" cellpadding="0px" cellspacing="0px" border="0px" align="center">
            <tr>
                <td colspan="9" align="center"><font size="+1"><b>电影信息</b></font></td>
            </tr>
            <tr>
                <td>影片名称</td>
                <td>影片类别</td>
                <td>放映厅</td>
                <td>影片票价</td>
                <td>订票数量</td>
                <td>席位</td>
                <td>影片产地</td>
                <td>放映时间</td>
                <td>小计</td>
            </tr>
            <?php
            $zongqian=0;
            while($row=mysql_fetch_array($resu))
            {
            ?>
            <tr>
                <td><?php echo title($row["pid"]);?></td>
                <td><?php echo type($row["pid"]);?></td>
                <td><?php echo fangying($row["pid"]);?></td>
                <td><?php echo $row["price"];?></td>
                <td><?php echo $row["nums"];?></td>
                <td><?php echo $row["seat"];?></td>
                <td><?php echo chandi($row["pid"]);?></td>
                <td><?php echo shijian($row["pid"]);?></td>
                <td><?php echo $row["price"]*$row["nums"];$zongqian=$zongqian+$row["price"]*$row["nums"];?></td>
            </tr>
<?php
}
?>
<tr><td colspan="9" align="right">总金额：<?php echo $zongqian;?></tr>
</table>
</body>
</html>
