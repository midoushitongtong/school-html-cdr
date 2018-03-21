<?php 
  define('IN_TG',true);
  define('SCRIPT','show');
  require dirname(__FILE__).'/includes/common.inc.php';
  
  
  _page("SELECT id FROM 3d_posts WHERE post_status = 'publish' AND id in (SELECT object_id FROM 3d_term_relationships WHERE term_taxonomy_id = 20)", 13);
  
  $_result = _query("SELECT
  												
  												id,post_title,post_content,post_status
  									 FROM
  												3d_posts
  									WHERE
  												post_status = 'publish'
  										AND
  												id in (SELECT object_id FROM 3d_term_relationships WHERE term_taxonomy_id = 20)
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
	<link type="text/css" rel="stylesheet" href="style/show.css">
	<link rel="shortcut icon" href="images/favico.ico">
	<meta charset="UTF-8">
<title>show</title>
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
					<li><a href="news.php">新闻中心</a></li>
					<li><a href="show.php" class="nav_first">模型展示</a></li>
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
			<div class="top">
			   		<h1><span>全部模型 </span>All Full model |</h1>
			   </div>
			   <?php 
			   	$_html = array();
			   	while(!!$_rows = _fetch_array_list($_result)) {
					$_html['id'] = $_rows['id'];
					$_html['title'] = $_rows['post_title'];
					$_html['content'] = $_rows['post_content'];
			   ?>
				<div class="produce">
				   <span class="pro"><?php echo $_html['content']?></span>
				   <div class="title">
				   		<!--<img src="images/show/teach_1.jpg" alt="" class="img_1"> -->
				   		<span><?php echo $_html['title']?></span>
				   </div>
				   <div class="type">
				   		<span>模型:<?php echo $_html['title']?></span>
				   </div>
				</div>
				<?php 
					}
					_free_result($_result);
				?>

			

			<div class="page">
				<?php 
					_paging(1);
				?>
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