<?php
session_start();

require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', 1);
if($_GET['sdate']){
	$sdate=trim($_GET['sdate']);
	$cond=" AND CREATE_TIME>='$sdate 00:00:00'";
}
if($_GET['edate']){
	$edate=trim($_GET['edate']);
	$cond=" AND CREATE_TIME<='$edate 23:59:59'";
}
$perpage=10;
$page=(int) $_GET['page'];
if(!$page)
	$page=1;


$start=($page-1)*($perpage-1);
$sql="SELECT SQL_CALC_FOUND_ROWS DATE(CREATE_TIME) AS `DATE`,COUNT(`FMID`) AS `I_TOTAL`  FROM `FB_MESSAGE` WHERE 1=1 $cond  GROUP BY `DATE` ORDER BY `DATE` DESC LIMIT $start,$perpage";
$itemlist=$db->get_results($sql);
$sql="SELECT FOUND_ROWS() AS C;";
$result = $db->query_first($sql);;
$total = $result['C'];
foreach((array)$itemlist as $key=>$row){
    $sql="SELECT count(FB_ID) AS P_TOTAL,DATE(CREATE_TIME) AS `DATE` FROM `FB_MESSAGE` WHERE DATE(CREATE_TIME)='".$row['DATE']."' GROUP BY FB_ID";
    $t=$db->query_first($sql);

    $row['P_TOTAL']=$t['P_TOTAL'];
    $list[]=$row;
}
$url=BackendPagebar::getCurrentPageUrl();
$pagebar=new BackendPagebar('page',$perpage,$page,$total,$url);
//print_r($itemList);
$smarty->assign('itemList',$list);

$smarty->assign('pagebar',$pagebar->show());
$smarty->assign('nav',5);


//$smarty->cache_lifetime = 36000;
$smarty->display("adm/messagestatistic.html");
