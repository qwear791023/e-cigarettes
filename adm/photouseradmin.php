<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
$perpage=8;
$page=(int)$_GET['page'];


if(!$page)
	$page=1;

  
$smarty->assign('nav',1);
$sql="SELECT  SQL_CALC_FOUND_ROWS * FROM `PHOTO_SHARE_USER`  ORDER BY ID DESC LIMIT ".$perpage*($page-1).",$perpage ";
$itemList=$db->get_results($sql);
$result1 = $db->query_first("SELECT FOUND_ROWS() AS C;");
$total = $result1['C'];

$url=BackendPagebar::getCurrentPageUrl();
$pagebar=new BackendPagebar('page',$perpage,$page,$total,$url);
//print_r($itemList);
$smarty->assign('itemList',$itemList);

$smarty->assign('pagebar',$pagebar->show());
//$smarty->caching =2;
//if(!$smarty->isCached('index.html')){
//bloger
//}
//$smarty->cache_lifetime = 36000;
$smarty->display("adm/photouseradmin.html");
