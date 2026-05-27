<?php
set_time_limit(0);
ini_set("memory_limit","800M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');
$params['header']=array('PID','TITLE','大頭照','材料照','材料說明','擺盤照','擺盤說明','成品照','成品說明','上傳者姓名','暱稱','PHONE','ADDRESS','EMAIL','IP','share time');

$sql="SELECT `PID`,`TITLE`,`USER_IMG`,`MATERIAL_IMG`,`MATERIAL_DESC`,`DISK_IMG`,`DISK_DESC`,`FOOD_IMG`,`FOOD_DESC`,`NAME`,`NICKNAME`,`PHONE`,`ADDRESS`,`EMAIL`,IP,CREATE_TIME FROM `PHOTO` " ;
$rs=$db->get_results("$sql");
//print_r($rs);
$params['data']=$rs;
excel($params);
 actionLog($adminuser,'exportvote');


?>
