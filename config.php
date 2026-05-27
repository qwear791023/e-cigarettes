<?php
mb_internal_encoding("UTF-8");
date_default_timezone_set("Asia/Taipei");
$env=getenv('APPLICATION_ENV');
if($env=="develope"){
define('DB_EVENT','localhost');
define('DB_EVENT_USER','root');
//define('DB_EVENT_USER','eventdb');
define('DB_EVENT_PASS','52bingo');
//define('DB_EVENT_PASS','jXmOkw.93');
define('DB_EVENT_DATABASE','');
define('ROOT_DN','www.powpi2000.site');
define("RECAPTCHA_Site", "6LdEXdcgAAAAAN1ITLB9ACr_mbv2-zehEDVF_Yf7");
define("RECAPTCHA_Private", "6LdEXdcgAAAAADtygIghmk2A6SK7ePc-67BoouDV");
}else{
define('DB_EVENT','localhost');
define('DB_EVENT_USER','novapeeventcom');
//define('DB_R_EVENT_USER','eventdb');
define('DB_EVENT_PASS','PdW41r84!');
//define('DB_R_EVENT_PASS','jXmOkw.93');
define('DB_EVENT_DATABASE','novapeeventcom');
define('HASH','2025novape');
define('ROOT_DN','www.novape-event.com');
define("RECAPTCHA_Site", "6LeruNsrAAAAAIVwgJz9rHflOdE1ujFcsFavmp19");
define("RECAPTCHA_Private", "AIzaSyA0Y-UFugaa3a7S4j0nQdXljy5lBcuboXw");
}
define('SECRECT','qhufhwehfqpuhfqhwuhrqgqrijqrjgpqhgpuqhpqhqrpqhrqp');
define('ROOT_DIR',dirname(__FILE__));
define('EVENT_URL','https://'.ROOT_DN.'/'.ROOT_DIR);
define('EVENT_DIR',ROOT_DIR);

//define('COOKIE_PATH','/');

//define('FB_APP_URL','http://apps.facebook.com/yam_okuraya/');
//define('OKURAYA_FANS_ID','223502717661725');
//define('PEAR_DIR','/usr/local/share/pear');
define('LIBS_DIR',EVENT_DIR.'/libs');
define('CLASS_DIR',EVENT_DIR.'/class');
ini_set('error_reporting', E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
error_reporting( E_ALL & ~E_NOTICE & ~E_WARNING);
header("Content-Type:text/html; charset=utf-8");


/*
$ip=getIP();
if($ip!='10.1.103.253')
{
  echo 'access deny';
}
*/
/*
function __autoload($class)
{
  $class=strtolower($class);
  $file=sprintf('%s/%s.%s',CLASS_DIR,$class,'class.php');
  if(file_exists($file))
  {
    require_once($file);
    return true;
  }else
    return false;
}
spl_autoload_register('__autoload');
*/
function getIP()
{
  if (empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  {
    $myip = $_SERVER['REMOTE_ADDR'];

  } else {
    $myip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    $myip = $myip[0];
  }
  return $myip;
}
