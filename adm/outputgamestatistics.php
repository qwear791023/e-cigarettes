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
	$cond=" AND G.`DATE`>='$sdate'";
}
if($_GET['edate']){
	$edate=trim($_GET['edate']);
	$cond.=" AND G.`DATE`<='$edate'";
}

  $sql="SELECT SQL_CALC_FOUND_ROWS G.`DATE`,CONCAT('https://www.facebook.com/',G.`FB_ID`),S.`NAME`,S.`EMAIL`, G.`IP`,G.MODIFY_TIME FROM `GAME` AS G JOIN `SHARE_USER` AS S ON G.SID=S.ID WHERE 1=1 AND PRIZE='Y' $cond ORDER BY G.`DATE` DESC ";
$itemlist=$db->get_results($sql);

$head[]="DATE";
$head[]="FB";
$head[]="NAME";
$head[]="EMAIL";
$head[]="IP";
$head[]="MODIFY_TIME";
$params['header']=$head;
$params['data']=$itemlist;
excel($params);
ctionLog($adminuser,'exportvote');


?>
