<?php 
  define('IN_TG',true);
  define('SCRIPT','news');
  require dirname(__FILE__).'/includes/common.inc.php';
  _page("SELECT id FROM 3d_posts WHERE post_status = 'publish'AND
                            id in(SELECT object_id FROM 3d_term_relationships WHERE term_taxonomy_id = 10)",15);
  $_result = _query("SELECT
                            id,post_title,comment_count,post_modified,post_status,post_type
                       FROM
                            3d_posts
                      WHERE
                            post_status = 'publish'
                        AND
                            id in (SELECT object_id FROM 3d_term_relationships WHERE term_taxonomy_id= 10)
                   ORDER BY
                            post_modified
                       DESC
                            LIMIT
      $_pagenum,$_pagesize
      ");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>	
	<link type="text/css" rel="stylesheet" href="style/basic.css">
	<link type="text/css" rel="stylesheet" href="style/news.css">
	<link rel="shortcut icon" href="images/favico.ico">
	<meta charset="UTF-8">
<title>news</title>
</head>
<body>
	<!-- header -->
	<div id="header">
		<div id="header_main">
			<h1 class="logo">
				<img src="images/logo.png" />
			</h1>
			<div class="nav">
				<ul>
					<li><a href="index.php">网站首页</a></li>
					<li><a href="classroom.php">教学展示</a></li>
					<li><a href="lore.php">3D知识课堂</a></li>
					<li><a href="news.php" class="nav_first">新闻中心</a></li>
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
	<!-- content -->
	<div id="content">
		<div id="content_main">
			<div id="left">
				<h1><a href="#">3D新闻中心</a></h1>
				<div>
					<ul>
						<li class="bg"><a href="news.php">唯识创梦新闻</a></li>
						<li><a href="trade.php">3D行业新闻</a></li>
					</ul>
				</div>
			</div>
			<div id="center">
				<div>
					<ul id="wrap">
					<?php 
                      $_htmllist = array();   
                      while(!!$_rows = _fetch_array_list($_result)){
                          $_htmllist['id'] = $_rows['id'];
                          $_htmllist['read'] = $_rows['comment_count'];
                          $_htmllist['date'] = $_rows['post_modified'];
                          $_htmllist['title'] = $_rows['post_title'];
                          $_htmllist = _html($_htmllist);                          
                          echo '<li><a href="news-content.php?id='.$_htmllist['id'].'">'._title($_htmllist['title'],23.3).'</a><strong>('._title($_htmllist['read'],2).') 阅读</strong><em>'.$_htmllist['date'].'</em></li>';                       
                      }
                      _free_result($_result);
                    ?>
					</ul>
					<?php 
					   _paging(1);
					?>
				</div>
			</div>
			<div id="right">
				<img src="images/right_img_1.png" alt="123"/>
				<img src="images/right_img_2.png" alt="123"/>
			</div>
		</div>
	</div>
	<!-- footer -->
	<?php 
	 require dirname(__FILE__).'/includes/footer.inc.php';
	?>
	
	
	<!-- public -->
	<script type="text/javascript" src="js/public_h.js" ></script>
	<script type="text/javascript" src="js/public_h2.js" ></script>
		<script type="text/javascript">
			$.nicenav(260);
		</script>
	<!-- public -->

</body>
</html>