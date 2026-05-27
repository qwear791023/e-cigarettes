<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';

$quanity=(int)$_POST['QUANITY'];
$sql="SELECT `ICOOK_ID` FROM `ICOOK_DATA` WHERE USERNAME IN ('100006180394426','100000085946801','locamami',
	'100001386398010','mom560226','lovejojo','royal0325','ching39','charminglydia','100000278301608','100000187905273','1769100998')
	UNION ALL SELECT ICOOK_ID FROM `ICOOK_DATA` WHERE USERNAME IN (SELECT USERNAME FROM `PRIZE_USER` AS PU  JOIN `ICOOK_DATA` AS I ON PU.ICOOK_ID=I.ICOOK_ID
	 WHERE PU.TYPE='joy')";
$itemList=$db->get_results($sql);
foreach((array) $itemList as $item)
	$icookids.=$item['ICOOK_ID'].",";
 $icookids=trim($icookids,',');
$sql="SELECT ICOOK_ID,TITLE,NICKNAME FROM `ICOOK_DATA` AS I WHERE I.ICOOK_ID NOT IN ($icookids) GROUP BY USERNAME  ORDER BY RAND() LIMIT 0,$quanity ";
$itemList=$db->get_results($sql);
echo json_encode($itemList);
?>
