<?php
 $url="localhost/dingyingjike/";
 $host= "localhost";//设置Mysql服务器
 $user="root";//设置登录数据库用户名
 $pass="root";//设置登录数据库密码
 $db="dianyingxiangyingshi";//设置数据库名字
 $conn = @mysql_connect($host,$user,$pass) or die("数据库链接错误");
 mysql_select_db($db, $conn);//连接数据库
 mysql_query("set names 'gbk'"); //使用GBK中文编码;
?>