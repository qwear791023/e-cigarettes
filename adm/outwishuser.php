<?php
set_time_limit(0);
ini_set("memory_limit","800M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');
$params['header']=array('ID','wish_type','wish_word','msg','nickname','NAME','PHONE','EMAIL',"ADDRESS",'IP','share time');

$sql="SELECT `id`,`wish_type`, `wish_word`, `msg`, `nickname`,`name`,CONCAT(' ',`phone`) AS phone,email,address,ip,create_time FROM `wish_user` " ;
$rs=$db->get_results("$sql");
//print_r($rs);
$params['data']=$rs;
excel($params);
 actionLog($adminuser,'exportvote');


?>
