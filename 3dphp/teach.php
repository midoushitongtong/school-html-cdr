<?php 
  define('IN_TG',true);
  define('SCRIPT','teach');
  require dirname(__FILE__).'/includes/common.inc.php';
  _page("SELECT id FROM 3d_posts WHERE post_status = 'publish' AND
                              id in(SELECT object_id FROM 3d_term_relationships WHERE term_taxonomy_id = 19)",12);
  $_result = _query("SELECT
                            id,post_title,post_content,post_status
                       FROM
                            3d_posts
                      WHERE
                            post_status = 'publish'
                        AND
                            id in (SELECT object_id FROM 3d_term_relationships WHERE term_taxonomy_id = 19)
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
	<link type="text/css" rel="stylesheet" href="style/teach.css">
	<link type="text/css" rel="stylesheet" href="style/images.css" />
	<script src="js/jquery.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/public.js"></script>
	<!--[if IE 6]>
	<script src="js/ie6PNG.js" type="text/javascript"></script>
	<script type="text/javascript">DD_belatedPNG.fix('*');</script>
	<![endif]-->
	<link rel="shortcut icon" href="images/favico.ico">
	<meta charset="UTF-8">
<title>teach</title>
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
					<li><a href="classroom.php" class="nav_first">教学展示</a></li>
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
	<!-- content -->
	<div id="content">
		<div id="content_main">
			<div id="left">
				<h1><a href="#">教学展示</a></h1>
				<div>
					<ul>
						<li class="bg"><a href="teach.php">学生作品</a></li>
						<li><a href="classroom.php">精彩课堂</a></li>
						<li><a href="school.php">教学环境</a></li>
					</ul>
				</div>
			</div>
			<div id="center">
				<div id="wrap">
					<!--图库弹出层 开始-->
					<div class="mskeLayBg"></div>
					<div class="mskelayBox">
					  <div class="mske_html">
					  </div>
					  <img class="mskeClaose" src="images/teach/mke_close.png" width="27" height="27" />
					</div>
					<!--图库弹出层 结束-->
					<ul id="msKeimgBox">
					 <?php 
                      $_html = array();   
                      while(!!$_rows = _fetch_array_list($_result)){
                          $_html['id'] = $_rows['id'];
                          $_html['content'] = $_rows['post_content'];
                          $_html['title'] = $_rows['post_title'];
                    ?>
						<div class="images">
							<a href="#"><?php echo $_html['content']?></a>
							<span class="zp"><?php echo _title($_html['title'],11)?></span>
							<span class="hidden">
								<span class="imgshow"><?php echo $_html['content']?></span>
							</span>
						</div>
				    <?php
				      }  
				      _free_result($_result);                
				    ?>
					</ul>
					<?php 
					 _paging(1);
					?>
				</div>
			</div>
			<!-- <div id="right">
				<img src="images/right_img_1.jpg" alt="123"/>
				<img src="images/right_img_2.jpg" alt="123"/>
			</div> -->
		</div>
	</div>	
		
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