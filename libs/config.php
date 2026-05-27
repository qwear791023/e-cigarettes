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
define('DB_EVENT_DATABASE','igtag');
define('ROOT_DN','powpi2000.dyndns.org');
}else{
define('DB_EVENT','bfmdb.cbtd2lntlxjd.us-west-2.rds.amazonaws.com');
define('DB_EVENT_USER','matsucny');
//define('DB_R_EVENT_USER','eventdb');
define('DB_EVENT_PASS','ZuqHmDJfdSamHVEh');
//define('DB_R_EVENT_PASS','jXmOkw.93');
define('DB_EVENT_DATABASE','igtag');
define('HASH','2012TAIWANLOTTERY');
define('ROOT_DN','wumu.bfm.com.tw');
}
define('SECRECT','qhufhwehfqpuhfqhwuhrqgqrijqrjgpqhgpuqhpqhqrpqhrqp');
define('ROOT_DIR',dirname(dirname(__FILE__)));

//define('COOKIE_PATH','/');
define('COOKIE_DN','campaign.pr.icook.com.tw');

define('EVENT_URL','http://'.ROOT_DN.'/igtag');
define('EVENT_DIR',ROOT_DIR.'/igtag');

//define('FB_APP_URL','http://apps.facebook.com/yam_okuraya/');
//define('OKURAYA_FANS_ID','223502717661725');
//define('PEAR_DIR','/usr/local/share/pear');
define('LIBS_DIR',EVENT_DIR.'/libs');
define('CLASS_DIR',EVENT_DIR.'/class');
define('FACEBOOK_SDK_V4_SRC_DIR', LIBS_DIR.'/facebook-php-sdk-v4-4.0-dev/src/Facebook/');
require(LIBS_DIR.'/facebook-php-sdk-v4-4.0-dev/autoload.php');
ini_set('error_reporting', E_ALL & ~E_NOTICE);
error_reporting(E_ERROR | E_PARSE);
error_reporting( E_ALL & ~E_NOTICE & ~E_WARNING);
//facebook
define('FB_APP_ID','2058893270804267');
define('APP_KEY','bc16be43b1229e106087148bf1b5b7b2');
define('FB_PAGE_ID','256057653836');
define('CURRENT_URL','http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
;
header("Content-Type:text/html; charset=utf-8");


/*
$ip=getIP();
if($ip!='10.1.103.253')
{
  echo 'access deny';
}
*/
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
