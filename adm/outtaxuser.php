<?php
ini_set("memory_limit","600M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');
$params['header']=array('ID','NAME','EMAIL','PHONE','統一發票號碼 1','統一發票號碼 2','統一發票號碼 3','統一發票號碼 4','統一發票號碼 5','統一發票號碼 6','IP','建立時間');

$sql="SELECT  UID,NAME,EMAIL,CONCAT(' ',PHONE) AS P,CONCAT(' ') AS TAX1,CONCAT(' ') AS TAX2,CONCAT(' ') AS TAX3,CONCAT(' ') AS TAX4
,CONCAT(' ') AS TAX5,CONCAT(' ') AS TAX6 ,IP,CREATE_TIME FROM `INVOICE` " ;
$rs=$db->get_results("$sql");
foreach($rs as $key2=> $item){
	$sql="SELECT * FROM `INVOICE_DATA` WHERE UID={$item['UID']}";
	$taxList=$db->get_results($sql);
	$sntext="";
	foreach($taxList as $key=>$sn){
		$sntext=$sn['SN'].$invoiceType[$sn['TYPE']]." ";
		$item['TAX'.($key+1)]=$sntext;
	}
	
	$rs[$key2]=$item;
}
//print_r($rs);
$params['data']=$rs;
excel($params);
 actionLog($adminuser,'exportvote');


?>
