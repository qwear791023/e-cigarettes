<?php
ini_set("memory_limit","600M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');
$cond="";
if($_GET['sdate']){
	$sdate=trim($_GET['sdate']);
	$cond=" AND CREATE_TIME>='$sdate 00:00:00'";
}
if($_GET['edate']){
	$edate=trim($_GET['edate']);
	$cond=" AND CREATE_TIME<='$edate 23:59:59'";
}

$start=($page-1)*($perpage-1);
$sql="SELECT SQL_CALC_FOUND_ROWS `DATE`,COUNT(`UID`) AS `P_TOTAL` ,CONCAT(' ') AS `T_TOTAL` FROM `INVOICE` WHERE 1=1 $cond  GROUP BY `DATE` ORDER BY `DATE` DESC ";
$rows = $db->get_results($sql);
$list=array();

foreach((array)$rows as $row){
            //$sql="SELECT count(*) AS T FROM `GAME` WHERE DATE='".$row['DATE']."' GROUP BY UID";
	$sql="SELECT count(*) AS I_TOTAL FROM `INVOICE_DATA` WHERE UID IN (SELECT UID FROM `INVOICE` WHERE `DATE`='".$row['DATE']."') ";
	$d=$db->query_first();

	$row['I_TOTAL']=$d['I_TOTAL'];
	$list[]=$row;

}
$head[]="DATE";
$head[]="人數";
$head[]="張數";
$params['header']=$head;
$params['data']=$list;
excel($params);
ctionLog($adminuser,'exportvote');


?>
