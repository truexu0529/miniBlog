<?php
header("Content-Type:text/html;charset = gb2313");
include("config.php");
ini_set('date.timezone','Asia/Shanghai');
$id = mysql_num_rows(mysql_query("select * from msgboard"));
$name = $_POST['name'];
$patch = $_POST['contents'];
$article_id = $_COOKIE['article_id'];
$contents = str_replace("\n","<br>",str_replace(" ","&nbsp;",$patch));
$date = date('Y-m-d H:i:s',time());
$sql = "insert into msgboard values('$id','$name','$contents','$date','$article_id')";


if(mysql_query($sql)){

echo "<script>alert('评论成功！返回首页。');location.href = 'article.php?id='+$article_id</script>";
}

?>