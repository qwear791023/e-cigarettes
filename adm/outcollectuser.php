<?php
set_time_limit(0);
ini_set("memory_limit","800M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');
$params['header']=array('CUID','USERNAME','FB','EMAIL',"ICOOK_ID",'from_campaign','create time');

$sql="SELECT CUID ,CONCAT('https://icook.tw/users/',USERNAME),CONCAT('https://www.facebook.com/',FB_ID) AS FB,EMAIL,CONCAT('http://icook.tw/recipes/',ICOOK_ID),`FROM_CAMPAIGN`,CREATE_TIME FROM `COLLECT_USER` " ;
$rs=$db->get_results("$sql");
//print_r($rs);
$params['data']=$rs;
excel($params);
 actionLog($adminuser,'exportvote');


?>
