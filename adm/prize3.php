<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';

$start_time=$_POST['START_TIME'].' 00:00:00';
$end_time=$_POST['END_TIME'].' 23:59:59';
$quanity=(int)$_POST['QUANITY'];
$sql="SELECT distinct S.FB_ID,S.NAME,S.EMAIL,S.ICOOK_ID FROM `SHARE_USER` AS S WHERE S.CREATE_TIME>='$start_time' AND S.CREATE_TIME<='$end_time' AND S.FB_ID!='1234567890' AND S.EMAIL!='' AND S.FB_ID NOT IN (SELECT FB_ID FROM PRIZE_USER WHERE TYPE='share')  GROUP BY S.FB_ID ORDER BY RAND() LIMIT 0,$quanity ";
$itemList=$db->get_results($sql);
echo json_encode($itemList);
?>
