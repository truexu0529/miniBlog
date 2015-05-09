<?php
$con = mysql_connect("180.178.53.34","a0423215640","65912185");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_query("set names 'gbk'");
mysql_select_db("a0423215640",$con);

?>