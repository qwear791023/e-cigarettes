<?php
ini_set("memory_limit","800M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');
$params['header']=array('ICOOK_ID','URL','TITLE','分享數');

$sql="SELECT ICOOK_ID ,URL,TITLE,(SHARE_COUNT+FB_SHARE) FROM ICOOK_DATA " ;
$rs=$db->get_results("$sql");
//print_r($rs);
$params['data']=$rs;
excel($params);
 actionLog($adminuser,'exportvote');


?>
