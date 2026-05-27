<?php
set_time_limit(0);
ini_set("memory_limit","800M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');
$params['header']=array('ID','TITLE','作者' ,"ICOOK",'LIKE_COUNT','SHARE_COUNT','publish time');

$order=$_GET['order'];
if($order=='like')
	$orderStr=" ORDER BY LIKE_COUNT DESC";
else
	$orderStr=" ORDER BY SHARE_COUNT DESC ";
$sql="SELECT ID ,TITLE,NICKNAME,CONCAT('http://icook.tw/recipes/',ICOOK_ID),LIKE_COUNT,
SHARE_COUNT,PUBLISH_TIME FROM `ICOOK_DATA` $orderStr" ;
$rs=$db->get_results("$sql");
//print_r($rs);
$params['data']=$rs;
excel($params);
 actionLog($adminuser,'exportvote');


?>
