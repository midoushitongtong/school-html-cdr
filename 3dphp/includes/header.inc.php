<?php 
  if(!defined('IN_TG')){
  	exit('非法操作');
  }
?>
<div id="header">
		<div id="header_main">
			<h1 class="logo">
				<img src="images/logo.png" />
			</h1>
			<div class="nav">
				<ul>
					<li><a href="./" class="nav_first">网站首页</a></li>
					<li><a href="classroom.php">教学展示</a></li>
					<li><a href="lore.php">3D知识课堂</a></li>
					<li><a href="news.php">新闻中心</a></li>
					<li><a href="show.php">模型展示</a></li>
					<li><a href="activity.php">活动中心</a></li>
					<li><a href="about.php">关于我们</a></li>
					<li><a href="contact.php">联系我们</a></li>
					<div id="buoy"></div>
				</ul>
			</div>
			<div class="search">
				<form action="" method="">
					<input type="submit" class="submit">
					<input type="text" name="search" class="text" required placeholder="搜索">
				</form>
			</div>
		</div>
	</div>