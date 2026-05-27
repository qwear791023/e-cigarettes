<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
$perpage=30;
$page=(int)$_GET['page'];


if(!$page)
	$page=1;

  
$smarty->assign('nav',4);
$sql="SELECT  SQL_CALC_FOUND_ROWS * FROM `PRIZE` WHERE TYPE in ('10000','5000','2000')   ORDER BY PR_ID DESC LIMIT ".$perpage*($page-1).",$perpage ";
$itemList=$db->get_results($sql);
$result1 = $db->query_first("SELECT FOUND_ROWS() AS C;");
$total = $result1['C'];

$url=Pagebar::getCurrentPageUrl();
$pagebar=new Pagebar($perpage,$page,$total,$url,'#');
//print_r($itemList);
$smarty->assign('itemList',$itemList);


$smarty->assign('pagebar',$pagebar->show());
//$smarty->caching =2;
//if(!$smarty->isCached('index.html')){
//bloger
//}
//$smarty->cache_lifetime = 36000;
$smarty->display("adm/prizeadmin.html");
