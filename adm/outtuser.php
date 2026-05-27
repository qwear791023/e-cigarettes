<?php
set_time_limit(0);
ini_set("memory_limit","800M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');
$params['header']=array('ID','NAME','PHONE','EMAIL',"BLOG_ID",'IP','share time');

$sql="SELECT FBS_ID ,NAME,PHONE,EMAIL,CONCAT('https://blog.icook.tw/posts/',BLOG_ID),IP,CREATE_TIME FROM `FB_BLOG_SHARE` " ;
$rs=$db->get_results("$sql");
//print_r($rs);
$params['data']=$rs;
excel($params);
 actionLog($adminuser,'exportvote');


?>
