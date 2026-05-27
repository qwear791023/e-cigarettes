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

  
$smarty->assign('nav',3);
$sql="SELECT  SQL_CALC_FOUND_ROWS * FROM `INVOICE`  ORDER BY UID DESC LIMIT ".$perpage*($page-1).",$perpage ";
$itemList=$db->get_results($sql);
$result1 = $db->query_first("SELECT FOUND_ROWS() AS C;");
$total = $result1['C'];
foreach((array)$itemList as $key2=>$item){
	$sql="SELECT * FROM `INVOICE_DATA` WHERE UID={$item['UID']}";
	$taxList=$db->get_results($sql);
	foreach($taxList as $key=>$sn){
		$sn['ITYPE']=$invoiceType[$sn['TYPE']];
		$taxList[$key]=$sn;
	}
	$item['TAX']=$taxList;
	$itemList[$key2]=$item;
}

$url=Pagebar::getCurrentPageUrl();
$pagebar=new Pagebar($perpage,$page,$total,$url,'#');
//print_r($itemList);
$smarty->assign('itemList',$itemList);
$smarty->assign('invoiceType',$invoiceType);

$smarty->assign('pagebar',$pagebar->show());
//$smarty->caching =2;
//if(!$smarty->isCached('index.html')){
//bloger
//}
//$smarty->cache_lifetime = 36000;
$smarty->display("adm/taxuseradmin.html");
