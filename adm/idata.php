<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
$res=array("status"=>false,"msg"=>"");
if($_POST){
	$act=$_POST['ACT'];
	$icookid=(int)$_POST['ICOOK_ID'];
	if($act=="edit"){
		$title=trim($_POST['TITLE']);
		$status=$_POST['STATUS'];
		$fixed_title=$_POST['FIXED_TITLE'];
		$sql="UPDATE `ICOOK_DATA` SET TITLE='$title',STATUS='$status',FIXED_TITLE='$fixed_title' WHERE ICOOK_ID=$icookid";
		$rs=$db->query("$sql");
	}elseif($act=="delete"){
		$sql="DELETE FROM `ICOOK_DATA` WHERE ICOOK_ID=$icookid";
		$rs=$db->query("$sql");
	}
	if($rs){
		$res['status']=true;
		$res['msg']="資料處理成功";
	}else{
		$res['msg']="資料處理失敗";
	}
}
echo json_encode($res);
