<?php
function title($id)
{
  $sql="select * from movie where Movie_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);
  return $rows["Movie_title"];
}
function fangying($id)
{
  $sql="select * from movie where Movie_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);
  return $rows["Movie_fangying"];
}
function type($id)
{
  $sql="select * from movie where Movie_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);
  return $rows["Movie_type"];
}
function chandi($id)
{
  $sql="select * from movie where Movie_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);
  return $rows["Movie_where"];
}
function shijian($id)
{
  $sql="select * from movie where Movie_id='$id'";
  $result=mysql_query($sql);
  $rows=mysql_fetch_array($result);
  return $rows["Movie_date"];
}
?>