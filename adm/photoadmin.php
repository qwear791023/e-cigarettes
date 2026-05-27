<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
$perpage=8;
$page=(int)$_GET['page'];



if($_POST['STATUS'] && $_POST['PID']){
	$status=$_POST['STATUS'];
	$res=array('msg' => "", 'status'=>false);
	$pid=(int)$_POST['PID'];
	$sql="UPDATE `PHOTO` SET `STATUS`='$status'  WHERE `PID` =$pid;";	
	$rs=$db->query($sql);
	if($rs){
		$res['status']=true;
		$res['msg']="處理成功";
	}
	echo json_encode($res);
	exit;
}

if(!$page)
	$page=1;
if($_GET[s]){
	$s=trim($_GET['s']);
	$cond.=" AND (`TITLE` LIKE '%$s%' || `NAME` LIKE '%$s%' || `NICKNAME` LIKE '%$s%')";
}
if($_GET[status]){
	$status=trim($_GET['status']);

	$cond.=" AND `STATUS`='$status'";
}
$smarty->assign('nav',3);
$sql="SELECT  SQL_CALC_FOUND_ROWS * FROM `PHOTO` WHERE 1=1 $cond  ORDER BY PID DESC LIMIT ".$perpage*($page-1).",$perpage ";
$itemList=$db->get_results($sql);
$result1 = $db->query_first("SELECT FOUND_ROWS() AS C;");
$total = $result1['C'];

$url=BackendPagebar::getCurrentPageUrl();
$pagebar=new BackendPagebar('page',$perpage,$page,$total,$url);
//print_r($itemList);
$smarty->assign('itemList',$itemList);

$smarty->assign('pagebar',$pagebar->show());

$smarty->display("adm/photoadmin.html");
