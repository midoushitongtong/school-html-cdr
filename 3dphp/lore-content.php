<?php 
  define('IN_TG',true);
  require dirname(__FILE__).'/includes/common.inc.php';
  if(@$_GET['id']){
	if(!!$_rows = _fetch_array("SELECT 
	                                     *
	                              FROM 
	                                   3d_posts 
	                             WHERE 
	                                   id='{$_GET['id']}'
	                           ")){
	                           _query("UPDATE 3d_posts SET comment_count=comment_count+1 WHERE ID='{$_GET['id']}'");
	                            //有数据之后创新
	                            $_html = array();
	                            $_html['date'] = $_rows['post_modified'];
	                            $_html['read'] = $_rows['comment_count'];
	                            $_html['title'] = $_rows['post_title'];
	                            $_html['content'] = $_rows['post_content'];
	                            $_html['url'] = 'lore-content.php?id='.$_GET['id'].'';
	}else{
	 _location('','lore.php');
	}
}else{
	_location('','lore.php');
}
$_result = _query("SELECT
                          id,post_title,comment_count,post_modified,post_status,post_type
                     FROM
                          3d_posts
                    WHERE
                          post_status = 'publish'
                 ORDER BY
                          comment_count
                          DESC
                    LIMIT
                     0,10
                  ");
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>	
	<link type="text/css" rel="stylesheet" href="style/basic.css">
	<link type="text/css" rel="stylesheet" href="style/lore_content.css">
	<link rel="shortcut icon" href="images/favico.ico">
	<meta charset="UTF-8">
<title><?php echo $_html['title']?></title>
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
					<li><a href="lore.php" class="nav_first">3D知识课堂</a></li>
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
	<div id="content">
		<div id="content_main">
			<div id="left">
				<h1><a href="#">3D知识课堂</a></h1>
				<div>
					<ul>
						<li class="bg"><a href="lore.php">3D打印知识课堂</a></li>
						<li><a href="#">3D建模知识堂</a></li>
						<li><a href="#">3D打印视频</a></li>
						<li><a href="#">3D打印教程</a></li>
						<li><a href="#">3D打印建模</a></li>
						<li><a href="#">Tinkercad</a></li>
					</ul>
				</div>
			</div>
			<div id="center">
                <div id="content">
                	<div id="h1"><?php echo $_html['title']?></div>
                    <i>来源：唯实3D教育 更新时间：<?php echo $_html['date']?> 点击次数：<?php echo $_html['read']?></i>
                   <?php echo $_html['content']?>
                </div>
    			<form action="" method="">
    					<input type="submit" class="submit" value="返回" id="return"/>
    			</form>
    			<div id="sho">
        			 <!-- 多说评论框 start -->
                	<div class="ds-thread" data-thread-key="<?php echo $_GET['id']?>" data-title="<?php echo $_html['title']?>" data-url="<?php echo $_html['url']?>"></div>
                    <!-- 多说评论框 end -->
                    <!-- 多说公共JS代码 start (一个网页只需插入一次) -->
                    <script type="text/javascript">
                    var duoshuoQuery = {short_name:"wscmcdr"};
                    	(function() {
                    		var ds = document.createElement('script');
                    		ds.type = 'text/javascript';ds.async = true;
                    		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
                    		ds.charset = 'UTF-8';
                    		(document.getElementsByTagName('head')[0] 
                    		 || document.getElementsByTagName('body')[0]).appendChild(ds);
                    	})();
                    	</script>
                    <!-- 多说公共JS代码 end -->
    			</div>
			</div>
			<div id="right">
				<h1><a href="#">热门知识</a></h1>
				<div>
					<ul>
                      <?php 
                        $_html = array();
                        while(!!$_rows = _fetch_array_list($_result)) {
                          $_htmllist['id'] = $_rows['id'];
                          $_htmllist['title'] = $_rows['post_title'];
                          $_htmllist['rea'] = $_rows['comment_count'];
                          $_url = 'lore-content.php?id='.$_GET['id'].'';
                          echo '<li><a href="lore-content.php?id='.$_htmllist['id'].'">'._title($_htmllist['title'],11).'</a><em class="hot">('._title($_htmllist['rea'],2).') 阅读</em></li>';
                        }
                      ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <?php 
      require dirname(__FILE__).'/includes/footer.inc.php';
    ?>
		<script type="text/javascript" src="js/public_h.js" ></script>
		<script type="text/javascript" src="js/public_h2.js" ></script>
		<script type="text/javascript">
			$.nicenav(260);
		</script>
</body>
</html>