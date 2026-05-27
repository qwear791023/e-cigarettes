<?php
set_time_limit(0);
ini_set("memory_limit","800M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');
$params['header']=array('標題','URL','分享數');

$sql="SELECT TITLE,URL,F_COUNT FROM `ICOOK_DATA` ORDER BY `SHARE_COUNT` DESC" ;
$rs=$db->get_results("$sql");
//print_r($rs);
$params['data']=$rs;
excel($params);
 actionLog($adminuser,'exportvote');


?>
