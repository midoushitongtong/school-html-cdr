<?php
  if(!defined('IN_TG')){
    exit('你不能这么做');
  }
  require dirname(__FILE__).'/global.func.php';
  define('GPC',get_magic_quotes_gpc());
  
  header('Content-type:text/html;charset=utf-8');
  require dirname(__FILE__).'/mysql.func.php';
  define('DB_HOST','localhost');
  define('DB_USER','root');
  define('DB_PWD','593690203');
  define('DB_NAME','3d');
  _connect();
  _select_db();
  _set_names();
?>