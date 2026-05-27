<?php
session_start();

require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', 1);

$noPhone = array();
$noEmail = array();

$fp = fopen('outlottery.csv', 'w');

$start=($page-1)*($perpage-1);
$sql="SELECT email,name,ip,phone,address FROM `share_user` union SELECT email,name,ip,phone,address FROM `lottery_user` ORDER BY rand() limit 0,20";
$items=$db->get_results($sql);
foreach($items as $item) {
    $noPhone[] = $item['phone'];
    $noEmail[] = $item['email'];
}
$first = $items;
$smarty->assign('first', $first);

fwrite($fp,"藍眼淚紀念酒禮盒\n");
fwrite($fp,"\"{$item['name']}\", \"{$item['email']}\", \"{$item['phone']}\"\n");

$cond = " AND `email` not in ('".implode("','", $noEmail)."')";
$cond .= " AND `phone` not in ('".implode("','", $noPhone)."')";
$sql="SELECT email,name,ip,phone,address FROM `share_user` WHERE 1=1 $cond union SELECT email,name,ip,phone,address FROM `lottery_user` WHERE 1=1 $cond ORDER BY rand() limit 0,1";
$items=$db->get_results($sql);
fwrite($fp,"Philips 飛利浦渦輪氣旋健康氣炸鍋\n");
foreach ((array)$items as $key => $item) {
	$noPhone[] = $item['phone'];
	$noEmail[] = $item['email'];
	
	fwrite($fp, "\"{$item['name']}\", \"{$item['email']}\", \"{$item['phone']}\"\n");
}
$smarty->assign('second',(array) $items);
/*
$cond = " AND `email` not in ('".implode("','", $noEmail)."')";
$cond .= " AND `phone` not in ('".implode("','", $noPhone)."')";
$sql="SELECT * FROM `user`  WHERE 1=1 $cond ORDER BY rand() limit 0,3";
$items=$db->get_results($sql);
fwrite($fp,"發發獎-大潤發禮券1000元\n");
foreach ((array)$items as $key => $item) {
	$noPhone[] = $item['phone'];
	$noEmail[] = $item['email'];
	fwrite($fp, "\"{$item['name']}\", \"{$item['email']}\", \"{$item['phone']}\"\n");
}
$smarty->assign('third', (array)$items);
fwrite($fp,"參加獎-益富益力壯PLUS 2罐	\n");
$cond = " AND `email` not in ('".implode("','", $noEmail)."')";
$cond .= " AND `phone` not in ('".implode("','", $noPhone)."')";
$sql="SELECT * FROM `user` WHERE 1=1 $cond ORDER BY rand() limit 0,50";
$items=$db->get_results($sql);
foreach ((array)$items as $key => $item) {
	
	fwrite($fp, "\"{$item['name']}\", \"{$item['email']}\", \"{$item['phone']}\"\n");
}
$smarty->assign('fourth', (array)$items);
 */
//$smarty->assign('pagebar',$pagebar->show());
$smarty->assign('nav', 3);


//$smarty->cache_lifetime = 36000;
$smarty->display("adm/lottery.html");
