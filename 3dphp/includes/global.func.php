<?php 




function _alert_back($_no){
  echo "<script type='text/javascript'>alert('".$_no."');history.back();</script>";
  exit();
}

function _alert_close($_info) {
	echo "<script type='text/javascript'>alert('$_info');window.close();</script>";
	exit();
}

function _location($_tishi, $_url){
  //为了某些需求 跳转不需要提示执行
  //如果需要提示,执行下面这句话
  if(!empty($_tishi)){
    echo "<script type='text/javascript'>alert('".$_tishi."');location.href='$_url';</script>";
    exit();
 //如果不需要提示,执行下面这句话
} else{
    header('Location:'.$_url);
  }
}

function _page($_sql, $_size){
  //将所有参数取出来  外部可以访问
  global $_pagesize, $_pagenum, $_pageabsolute, $_page, $_num;

  if (isset($_GET['page'])) {
    $_page = @$_GET['page'];
    if (empty($_page) || $_page < 0 || !is_numeric($_page)) {
      $_page = 1;
    }
  } else {
      //取整
      $_page = 1;
  }

  $_pagesize = $_size;
  $_pagenum = ($_page - 1) * $_pagesize;
  //首页获取数据总和
  $_num = mysql_num_rows(mysql_query($_sql));
  //页码的变量
  //数据库为0条数据的情况下默认第一页

  if ($_num == 0) {
    $_pageabsolute = 1;
  } else {
    $_pageabsolute = ceil($_num / $_pagesize);
  }
  if ($_page > $_pageabsolute) {
      $_page = $_pageabsolute;
  }

}
function _paging($_type){
  
  global $_page, $_pageabsolute, $_num;
  
  if ($_type == 1) {
    echo '<div id="page_num">';
    echo '<ul>';
      for ($i = 0; $i < $_pageabsolute; $i ++) {
        if($_page == ($i + 1)) {
          echo '<li><a href="'.SCRIPT.'.php?page='.($i + 1).'" class="selected">'.($i + 1).'</a></li>';
        } else {
          echo '<li><a href="'.SCRIPT.'.php?page='.($i + 1).'">'.($i + 1).'</a></li>';
        }
      }
    echo '</ul>';
    echo '</div>';
} else if ($_type == 2) { 
    echo '<div id="page_text">';
    echo '<ul>';
    echo '<li>'.$_page.'/'.$_pageabsolute.' 页 | </li>';
    echo '<li>共有 <strong>'.$_num.'</strong> 条数据 </li>';
        if ($_page == 1) {
        	echo '<li>首页 | </li>';
        	echo '<li>上一页 | </li>';
        } else {
            //别的页面调取这块分页代码可以使用
            //PHP自带的函数 来连接目录SCRIPT = $_SERVER['SCRIPT_NAME'];
            //自定义的方法来连接目录
        	echo '<li><a href="'.SCRIPT.'.php">首页</a> | </li>';
        	echo '<li><a href="'.SCRIPT.'.php?page='.($_page-1).'">上一页</a> | </li>';
        }
        if ($_page == $_pageabsolute) {
        	echo '<li>下一页 | </li>';
        	echo '<li>尾页| </li>';
        } else {
        	echo '<li><a href="'.SCRIPT.'.php?page='.($_page+1).'">下一页</a> | </li>';
        	echo '<li><a href="'.SCRIPT.'.php?page='.($_pageabsolute).'">尾页</a> | </li>';
        }
  echo '</ul>';
  echo '</div>';
  }
}

function _session_destroy(){
	session_destroy();
}

function _mysql_string($_string) {
	if (GPC) {
		if (is_array($_string)) {
			foreach ($_string as $_key => $_value) {
				$_string[$_key] = _mysql_string($_value);   //这里采用了递归，如果不理解，那么还是用htmlspecialchars
			}
		} else {
			$_string = addslashes($_string);
		}
	} 
	return $_string;
}

function _check_code($_first_code, $_end_code){
  if($_first_code != $_end_code){
    _alert_back('验证码不正确');
  }
}

function code($width = 75, $height = 25, $_rnd_code = 5){
  $_nmsg = '';
  for ($i = 0; $i < $_rnd_code; $i++) {
    $_nmsg.=dechex(mt_rand(0,15));
  }
  $_SESSION['code'] = $_nmsg;
  //图像宽和高
  //   $width = 75;
  //   $height = 25;
  //创建图像
  $img = imagecreatetruecolor($width, $height);
  //给图片分配颜色
  $_white = imagecolorallocate($img,255,255,255);
  //创建边框
  $colorBorder = imagecolorallocate($img,0,0,0);
  imagerectangle($img,0,0,$width-1,$height-1,$colorBorder);
  //创建线条
  for ($i = 0; $i < 3; $i++) {
    $rand_color = imagecolorallocate($img,mt_rand(50,255),mt_rand(50,255),mt_rand(50,255));
    imageline($img,mt_rand(0,$width),mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$rand_color);
  }
  //创建雪花
  for ($i = 0; $i < 100; $i++) {
    $rnd_color = imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
    imagestring($img,1,mt_rand(1,$width),mt_rand(1,$height),'-',$rnd_color);
  }
  //填充
  imagefill($img,0,0,$_white);
  //输出验证码
  for ($i = 0; $i < strlen($_SESSION['code']); $i++) {
    $rnd_color = imagecolorallocate($img,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));
    imagestring($img,5,$i*$width/$_rnd_code+mt_rand(1,10),mt_rand(1,$height/2),$_SESSION['code'][$i],$rnd_color);
  }
  //输出图像
  header('Content-type:image/png');
  imagepng($img);
  //清理图像
  imagedestroy($img);
}

function _title($_string, $_strlen){
	if (mb_strlen($_string,'utf-8') > $_strlen){
      $_string = mb_substr($_string, 0, $_strlen, 'utf-8').'..';
	}
	return $_string;
}

function _html ($string) {
  if (is_array($string)) {
  	 foreach ($string as $_key => $_value) {
  	 	$string[$_key] = _html($_value);//递归函数 不理解就不用了
  	 }
  } else {
  	$string = htmlspecialchars($string);
  }
  return $string;
}
?>