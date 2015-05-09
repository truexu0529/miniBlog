<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include("config.php");//引入数据库连接文件
$sql = "select * from articles order by id DESC";
$result = mysql_query($sql,$con);
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
					<li><a href="index.php">主页</a></li>
					<li><a href="#">归档</a></li>
					<li><a href="about.php">关于我</a></li>
				</ul>
			</header>
		</div>
 

		<div class="article-inner">
		<div class="article-body">
		<?php
		while($row = mysql_fetch_array($result))
		{
		?>
		<p><a href = "article.php?id=<?php echo $row[0]; ?>"><?php echo $row[1] ?></a>
		<br/><?php echo $row[3] ?></p>
		<?php
		}
		?>
		</div></div>

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