<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
$res=array("status"=>false,"msg"=>"");
	$fmid=(int)$_GET['fmid'];
	$status=$_GET['status'];
    $sql="UPDATE `FB_MESSAGE` SET STATUS='$status' WHERE FMID=$fmid";
    $rs=$db->query("$sql");
	if($rs){
		$res['status']=true;
		$res['msg']="資料處理成功";
	}else{
		$res['msg']="資料處理失敗";
	}
echo json_encode($res);
