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
fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

$start=($page-1)*($perpage-1);
$sql="SELECT email,name,ip,phone,address FROM `share_user`
        ORDER BY rand() limit 0,1";
$items=$db->get_results($sql);
foreach($items as $item) {
    $noPhone[] = $item['phone'];
    $noEmail[] = $item['email'];
}
$first = $items;
$smarty->assign('first', $first);

fwrite($fp,"禮券2000元\n");
fwrite($fp,"\"{$item['name']}\", \"{$item['email']}\", \"{$item['phone']}\"\n");

$cond = " AND `email` not in ('".implode("','", $noEmail)."')";
$cond .= " AND `phone` not in ('".implode("','", $noPhone)."')";
$sql="SELECT email,name,ip,phone,address FROM `share_user` WHERE 1=1 $cond
    ORDER BY rand() limit 0,30";
$items=$db->get_results($sql);
fwrite($fp, "時光快樂長久\n");
foreach ((array)$items as $key => $item) {
	$noPhone[] = $item['phone'];
	$noEmail[] = $item['email'];
	fwrite($fp, "\"{$item['name']}\", \"{$item['email']}\", \"{$item['phone']}\"\n");
}
$smarty->assign('second',(array) $items);
$cond = " AND `email` not in ('".implode("','", $noEmail)."')";
$cond .= " AND `phone` not in ('".implode("','", $noPhone)."')";
$sql="SELECT email,name,ip,phone,address FROM `share_user` WHERE 1=1 $cond
    ORDER BY rand() limit 0,5";
$items=$db->get_results($sql);
fwrite($fp, "時光麵麵有福\n");
foreach ((array)$items as $key => $item) {
	$noPhone[] = $item['phone'];
	$noEmail[] = $item['email'];
	
	fwrite($fp, "\"{$item['name']}\", \"{$item['email']}\", \"{$item['phone']}\"\n");
}
$smarty->assign('third',(array) $items);
/*
$cond = " AND `email` not in ('".implode("','", $noEmail)."')";
$cond .= " AND `phone` not in ('".implode("','", $noPhone)."')";
$sql="SELECT email,name,ip,phone,address FROM `share_user` WHERE 1=1 $cond
    ORDER BY rand() limit 0,5";
$items=$db->get_results($sql);
*/
/*
fwrite($fp, "行動電源\n");
foreach ((array)$items as $key => $item) {
	$noPhone[] = $item['phone'];
	$noEmail[] = $item['email'];
	
	fwrite($fp, "\"{$item['name']}\", \"{$item['email']}\", \"{$item['phone']}\"\n");
}
$smarty->assign('fouth',(array) $items);
$cond = " AND `email` not in ('".implode("','", $noEmail)."')";
$cond .= " AND `phone` not in ('".implode("','", $noPhone)."')";
$sql="SELECT email,name,ip,phone,address FROM `share_user` WHERE 1=1 $cond
    ORDER BY rand() limit 0,30";
$items=$db->get_results($sql);
fwrite($fp, "保鮮盒\n");
foreach ((array)$items as $key => $item) {
    $noPhone[] = $item['phone'];
    $noEmail[] = $item['email'];

    fwrite($fp, "\"{$item['name']}\", \"{$item['email']}\", \"{$item['phone']}\"\n");
}
$smarty->assign('fifth',(array) $items);
*/
//$smarty->assign('pagebar',$pagebar->show());
$smarty->assign('nav', 2);


//$smarty->cache_lifetime = 36000;
$smarty->display("adm/lottery.html");
