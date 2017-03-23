<?php
require "common/config.inc.php";
require "common/function.php";
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>基于响应式布局的电影购票平台的开发的设计与实现</title>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/style.css" rel="stylesheet"/>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.event.drag-1.5.min.js"></script>
<script type="text/javascript" src="js/jquery.touchSlider.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$(".main_visual").hover(function(){
		$("#btn_prev,#btn_next").fadeIn()
	},function(){
		$("#btn_prev,#btn_next").fadeOut()
	});
	
	$dragBln = false;
	
	$(".main_image").touchSlider({
		flexible : true,
		speed : 200,
		btn_prev : $("#btn_prev"),
		btn_next : $("#btn_next"),
		paging : $(".flicking_con a"),
		counter : function (e){
			$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
		}
	});
	
	$(".main_image").bind("mousedown", function() {
		$dragBln = false;
	});
	
	$(".main_image").bind("dragstart", function() {
		$dragBln = true;
	});
	
	$(".main_image a").click(function(){
		if($dragBln) {
			return false;
		}
	});
	
	timer = setInterval(function(){
		$("#btn_next").click();
	}, 5000);
	
	$(".main_visual").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		},5000);
	});
	
	$(".main_image").bind("touchstart",function(){
		clearInterval(timer);
	}).bind("touchend", function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		}, 5000);
	});
	
});
</script>
</head>

<body>
<div id="top"> 
<table width="850" align="center" cellpadding="0" cellspacing="0" border="0">
<tr height="15px"><td colspan="5" align="right"></td></tr>
<tr height="15px"><td colspan="5" align="right">
<?php
if(isset($_SESSION["admin"]))
{
?>
<a href="myorder.php">订单中心</a> |<a href="mycart.php">购物车</a> | <a href="update.php">编辑资料</a> | <a href="exit.php">退出系统</a>

<?php
}else
{?>
<a href="zhuce.php">会员注册</a> | <a href="login.php">会员登录</a>
<?php
}
?>
</td></tr>
<tr height="15px"><td colspan="5" align="right"></td></tr>
<tr>
<td width="100px"><a href="index.php"><font color="#0081BC"><b>首页</b></font></a></td>
<td width="100px"><a href="movie.php"><font color="#0081BC"><b>最新影片</b></font></a></td>
<td width="100px"><a href="news.php"><font color="#0081BC"><b>最新公告</b></font></a></td>
<td width="350px">
<form action="search.php" method="post">
<input type="text" name="title" value="" style="width:300px; min-height:30px; height:auto; border:2px solid #0081BC; background-color:#FFFFFF; border-radius: 15px;" />
<input type="submit" name="submit" value="搜索" style="width:45px; min-height:45px; border-radius: 22px; background-color:#0081BC; color:#FFFFFF;  border:0px solid #0081BC;" />
</form>
</td>
</tr>
</table>
</div>
<div id="lunbo">
<div class="main_visual">
	<div class="flicking_con">
		<a href="#">1</a>
		<a href="#">2</a>
		<a href="#">3</a>
	</div>
	<div class="main_image">
		<ul>
			<li><span class="img_3"></span></li>
			<li><span class="img_1"></span></li>
			<li><span class="img_2"></span></li>
		</ul>
		<a href="javascript:;" id="btn_prev"></a>
		<a href="javascript:;" id="btn_next"></a>
	</div>
</div>
</div>
