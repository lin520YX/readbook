<?php
 $url="localhost/dingyingjike/";
 $host= "localhost";//����Mysql������
 $user="root";//���õ�¼���ݿ��û���
 $pass="root";//���õ�¼���ݿ�����
 $db="dianyingxiangyingshi";//�������ݿ�����
 $conn = @mysql_connect($host,$user,$pass) or die("���ݿ����Ӵ���");
 mysql_select_db($db, $conn);//�������ݿ�
 mysql_query("set names 'gbk'"); //ʹ��GBK���ı���;
?>