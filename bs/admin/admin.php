<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>电影购票后台</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/js.js"></script>
<base target="frameBord" />
</head>
<body id="index">
<h1>电影购票后台</h1>
<div id="userInfo">欢迎登录“基于响应式布局的电影购票平台的开发”管理中心</div>
<ul id="globalNav">
	<li>
	    <a href="loginout.php" target="_top">退出系统</a>
	</li>
	<li>
	    <a href="insert_admin.php">添加管理</a>
	</li>
	<li>
	    <a href="select_admin.php">管理中心</a>
	</li>
	<li>
	    <a href="select_users.php">会员中心</a>
	</li>
	<li>
	    <a href="insert_pay.php">添加支付</a>
	</li>
	<li>
	    <a href="select_pay.php">支付管理</a>
	</li>
	<li>
	    <a href="insert_fangying.php">添加地址</a>
    </li>
    <li>
        <a href="select_fangying.php">放映管理</a>
    </li>
	<li>
	    <a href="insert_type.php">添加分类</a>
	</li>
	<li>
	    <a href="select_type.php">分类管理</a>
	</li>
    <li>
        <a href="select_order.php">订票中心</a>
    </li>
	<li>
	    <a href="insert_news.php">添加公告</a>
	</li>
    <li>
        <a href="select_news.php">公告中心</a>
    </li>
	<li>
	    <a href="insert_movie.php">上传电影</a>
	</li>
	<li class="select">
	    <a href="select_movie.php">电影中心</a>
	</li>
</ul>
<iframe id="frameBord" name="frameBord" frameborder="0" width="100%" height="100%" src="select_movie.php"></iframe>
</body>
</html>
