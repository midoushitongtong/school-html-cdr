<?php 
  session_start();
  define('IN_TG',true);
  require dirname(__FILE__).'/includes/common.inc.php';
  //接受
  if(@$_GET['action'] == 'contact'){
    _check_code($_POST['code'],$_SESSION['code']);
    //验证文件
    include './includes/check.func.php';
    
      
    if (time() - @$_COOKIE['post_time'] < 60) {
    	_alert_back('请休息一会在留言');
    }
    $_clean = array();
    $_clean['content'] = _check_content($_POST['content']);
    $_clean = _mysql_string($_clean);
    //写入数据库
    _query("INSERT INTO 3d_comments(
                                    comment_content,
                                    comment_author,
                                    comment_date
                                    )
                                    VALUES(
                                    '{$_clean['content']}',
                                    '{$_SERVER["REMOTE_ADDR"]}',
                                    NOW()                              
                                    )
    ");
    if(_affected_rows() == 1 ){
      setcookie('post_time',time());
      //关闭数据库
      _close();
      //关闭数据库
      _session_destroy();
      //注册成功跳转
      _location('提交成功','contact.php');
      //注册成功跳转
    }else{
      //关闭数据库
      _close();
      //关闭数据库
      _session_destroy();
      //注册成功跳转
      _location('提交失败','register.php');
      //注册成功跳转
    } 
  }
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>	
	<link type="text/css" rel="stylesheet" href="style/basic.css">
	<link type="text/css" rel="stylesheet" href="style/contact.css">
	<link rel="shortcut icon" href="images/favico.ico">
	<meta charset="UTF-8">
<title>contact</title>
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
					<li><a href="show.php">模型展示</a></li>
					<li><a href="activity.php">活动中心</a></li>
					<li><a href="about.php">关于我们</a></li>
					<li><a href="contact.php" class="nav_first">联系我们</a></li>
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
			<h2>
				<img src="images/contact.jpg" alt="contact">
			</h2>
			<h3>
				<p class="p0">联系方式：XX人<span>手机：19000000000</span></p>
				<p class="p1">地址：XX市XX区XX路XX地址</p>
			</h3>
			<div id="content_center">
				<div id="c_c_top">
					<h1><a href="javascript:;">欢迎来电咨询、合作、我们将竭诚为你服务</a></h1>
				</div>
				<div id="c_c_footer">
					<h2>给我留言</h2>
					<form action="?action=contact" method="post">
						<textarea name="content" id="" required placeholder="留言:" ></textarea>
						<span class="yzm"><input type="text" name="code" class="text" required placeholder="验证码："/><img src="code.php" id="code" name="code" /></span>
						<span class="contact">(我们会在<i>24小时内</i>与你联系！)</span>
						<input type="submit" class="submit" />
					</form>							
				</div>
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
	<script type="text/javascript" src="js/code.js"></script>
	<script type="text/javascript" src="js/message.js"></script>
	<!-- public -->
</body>
</html>