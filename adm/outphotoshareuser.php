<?php
set_time_limit(0);
ini_set("memory_limit","800M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');
$params['header']=array('ID','NAME','FB','EMAIL','IP','share time');

$sql="SELECT ID ,NAME,CONCAT('https://www.facebook.com/',FB_ID) AS FB,EMAIL,IP,CREATE_TIME FROM `PHOTO_SHARE_USER` " ;
$rs=$db->get_results("$sql");
//print_r($rs);
$params['data']=$rs;
excel($params);
 actionLog($adminuser,'exportvote');


?>
