<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';

$type=$_POST['TYPE'];
$start_time=$_POST['START_TIME'].' 00:00:00';
$end_time=$_POST['END_TIME'].' 23:59:59';
$quanity=(int)$_POST['QUANITY'];
$score=(int)$_POST['SCORE'];
 $sql="SELECT distinct IND.SN,IND.UID,IND.IID, I.NAME,I.PHONE,I.EMAIL,I.DATE,I.IP FROM INVOICE_DATA AS IND JOIN INVOICE AS I ON IND.UID=I.UID WHERE I.CREATE_TIME>='$start_time' AND I.CREATE_TIME<='$end_time' AND IND.UID NOT IN (SELECT INVOICE_UID FROM PRIZE_USER WHERE TYPE='invoice')  GROUP BY I.PHONE ORDER BY RAND() LIMIT 0,$quanity ";
$itemList=$db->get_results($sql);
echo json_encode($itemList);
?>
