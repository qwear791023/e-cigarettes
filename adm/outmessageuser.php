<?php
ini_set("memory_limit","600M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');
$params['header']=array('ID','FROM','TO','Message','EMAIL','IP','建立時間');

$sql="SELECT FMID ,NAME,TO_FBNAME,MESSAGE,EMAIL,IP,CREATE_TIME FROM `FB_MESSAGE` " ;
$rs=$db->get_results("$sql");
//print_r($rs);
$params['data']=$rs;
excel($params);
 actionLog($adminuser,'exportvote');


?>
