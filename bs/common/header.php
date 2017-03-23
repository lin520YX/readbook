<?php
require "common/config.inc.php";
require "common/function.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>电影响应式的设计与实现</title>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="css/style.css" rel="stylesheet"/>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.event.drag-1.5.min.js"></script>
<script type="text/javascript" src="js/jquery.touchSlider.js"></script>
<script src="js/bxslider.min.js"></script>
<script type="text/javascript">
<?php
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/index.css\" />";
?>
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
<header>
<!-- Fixed navbar -->
<nav class="navbar navbar-default">
    <div class="container">
	<div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 ">
          <div class="top-number">
            <p><i class="fa fa-phone-square"></i> 热线电话：400-6666 6666</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 header-f">
     <div class="denglu">
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
</div>
  </div>
    </div>
     </div>
    <!--/.container-->
          </div>
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">导航菜单</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand hidden-xs" href="index.php" >
                        <img id="header-img"src="images/logo.png" alt="logo"></a>
                     <div  class="header-search">
                        <form action="search.php" method="post">
                            <input class="search1" type="text" name="title" value="" />
                            <input class="search2" type="submit" name="submit" value="搜索"  />
                        </form>
                    </div>
                </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li class="dropdown" >
                    <a class="shouye" href="index.php" >网站首页</a>
                  </li>
                  <li class="dropdown" > <a href="movie.php" >最新影片</a>
                    <a href="" id="app_menudown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-menu-down btn-xs"></span>
                    </a>
                  </li>
                  <li class="dropdown">
                    <a href="news.php">最新公告</a>
                    <a href="" id="app_menudown" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="glyphicon glyphicon-menu-down btn-xs"></span>
                    </a>
                  </li>
                </ul>
              </div>
              <!--/.nav-collapse -->
            </div>
          </nav>
          <!-- bxslider -->
          <div class="flash">
                <ul class="bxslider">
                      <li>
                            <a href="">
                                <img src="images/img_main_2.jpg">
                            </a>
                      </li>
                      <li>
                            <a href="">
                                <img src="images/img_main_3.jpg">
                            </a>
                      </li>
                </ul>
          </div>
            <script type="text/javascript">
                $('.bxslider').bxSlider({
                  adaptiveHeight: true,
                  infiniteLoop: true,
                  hideControlOnEnd: true,
                  auto:true
                });
            </script>
        </header>

