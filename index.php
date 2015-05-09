<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
include("config.php"); 
$sql = "select * from msgboard order by date DESC,id DESC"; 
$result = mysql_query($sql,$con);
$sql1= "select * from articles order by id DESC";
$result1 = mysql_query($sql1,$con);
$sql2 = "select * from friends";
$result2 = mysql_query($sql2,$con);
$tagsSql = "select tag from articles";
$tagsRes = mysql_query($tagsSql,$con);
$perNumber=5;  
$page=$_GET['page'];  
$count=mysql_query("select count(*) from articles");  
$rs=mysql_fetch_array($count); 
$totalNumber=$rs[0];
$totalPage=ceil($totalNumber/$perNumber);  
if (!isset($page)) {
 $page=1;
}  
$startCount=($page-1)*$perNumber;  
$result3=mysql_query("select * from articles order by id DESC limit $startCount,$perNumber");
?>
<head> 
<title>sheilaCat | sheilaCat的技术日志,前端开发,软件工程,程序员,WEB开发</title>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<meta name="description" content="sheilaCat的技术日志,前端开发,软件工程,程序员,WEB开发">
<meta name="keywords" content="sheilaCat的技术日志,前端开发,软件工程,程序员,WEB开发">
<link rel="shortcut icon" href="images/logo.ico" type="images/x-icon"/>
<link rel="icon" href="images/logo.png" type="images/gif"/>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>sheila'blog</title>
<link rel="stylesheet" href="css/common.css">
</head>
<body>

	<div id="container">
		<div id="wrap">
			<header id="header">
				<div id="banner">
					<img src="images/banner.png">
				</div>
				<ul>
					<li><a href="#">主页</a></li>
					<li><a href="archives.php">归档</a></li>
					<li><a href="about.php">关于我</a></li>
				</ul>
			</header>
		</div>
 
		<aside>
			<div id="profile">
			<img class = "profile img-circle loading" src= "images/me.jpg" />
			<p>大脸猫</p>
			<p>大三，软件工程在读</p>
			</div>
			<div id="article-catalog">
				<h1 class="catalog">文章分类</h1>
				<ul>
				<?php
				while($row = mysql_fetch_array($tagsRes)){
				?>
				<li><a href="#"><?php echo $row[0] ?></a></li>
				<?php
				}
				?>
				</ul>
			</div>
			<div id="friend-link">
				<h1 class="catalog">友情链接</h1>
				<ul>
				<?php
				while($row = mysql_fetch_array($result2)){
				?>
				<li><a href="#"><?php echo $row[0] ?></a></li>
				<?php
				}
				?>
				</ul>
			</div>
			<div id="last-comments">
				<h1 class="catalog">最新评论</h1>
				<ul>
				<?php
				$i = 1;
				while($i < 10)
				{$row = mysql_fetch_array($result);
				?>
				<li><?php echo $row[1] ?>&nbsp;&nbsp;	<?php echo $row[2] ?></li>
				<?php
				$i++;
				}
				?></ul>
			</div>
		</aside>
		
				<?php
				while ($row=mysql_fetch_array($result3)) {
				?><div class="article-inner">
				<div class="article-header"><h1 class="article-title"><a href = "article.php?id=<?php echo $row[0]; ?>"><?php echo $row[1] ?></a></h1>
				<p>发表于<?php echo $row[3] ?></p>
				<p>分类于<?php echo $row[2] ?></p></div>
				<div class="article-body"><p class="content"><?php echo $row[4] ?></p><p><a href = "article.php?id=<?php echo $row[0]; ?>" class="article-more-link">阅读全文 >></a></p>
				</div>
				</div>
				<?php
				}
				if ($page != 1) {
				?>
				<a href="index.php?page=<?php echo $page - 1;?>"><h1 class="page">上一页</h1></a>
				<?php
				}
				for ($i=1;$i<=$totalPage;$i++) { 
				?>
				<a href="index.php?page=<?php echo $i;?>"><h1 class="page"><?php echo $i ;?></h1></a>
				<?php
				}
				if ($page<$totalPage) {  
				?>
				<a href="index.php?page=<?php echo $page + 1;?>"><h1 class="page">下一页</h1></a>
				<?php
				} 
				?>

		</div>

	<footer>
		   <p>All content copyright <a href="/">sheilaCat</a> &copy; 2015 &bull; All rights reserved.</p>
    <div class="foot-nav">
      <a href="/" title="Home"><img src="images/me.jpg" title="sheilaCat" /></a>
      <a href="http://my.oschina.net/sheila/blog" target="_blank">oschina</a>
      <span>/</span>
      <a href="https://github.com/sheilaCat" target="_blank">Github</a></div>
	</footer>

</body>
</html>
