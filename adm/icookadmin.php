<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
$perpage=15;
$page=(int)$_GET['page'];


if(!$page)
	$page=1;

  
$smarty->assign('nav',2);
$type=(int)$_GET['type'];
$cond='';
if($type){
	$cond=" AND TYPE=$type";
}
$icookid=(int)$_GET['icookid'];
if($icookid){
	$cond=" AND ICOOK_ID=$icookid";
}
$status=$_GET['status'];
if($status){
	$cond=" AND STATUS='$status'";
}
$sql="SELECT  SQL_CALC_FOUND_ROWS * FROM `ICOOK_DATA` WHERE 1=1 $cond  ORDER BY ID DESC LIMIT ".$perpage*($page-1).",$perpage ";
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
$smarty->display("adm/icookadmin.html");
