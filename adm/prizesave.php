<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
$res=array("status"=>false,"msg"=>"nothing");
//echo $item->T1;
//        $item=array();
$type=$_POST['TYPE'];
$start_time=$_POST['START_TIME'];
$end_time=$_POST['END_TIME'];
$quanity=(int)$_POST['QUANITY'];
$score=(int)$_POST['SCORE'];
if($_POST){
	try {
		$ip=getIP();
		$sql="INSERT INTO PRIZE SET TYPE='$type',START_TIME='$start_time', END_TIME='$end_time',QUANITY='$quanity',IP='$ip' ,CREATE_TIME=CURRENT_TIMESTAMP";
		if($type=='10000' ||$type=='5000' || $type=='2000')
			$stype='invoice';
		else if(in_array($type,array('joy-machine','joy-movie','joy-disk')))
			$stype='joy';
		else
			$stype='share';
			
			
		$rs=$db->query("$sql");
		$pr_id=$db->insert_id();
		if($rs){
			if($stype=='invoice'){
				foreach($_POST['UID'] as $key =>$uid){
					$iid=(int)$_POST['IID'][$key];
					$sql="INSERT INTO `PRIZE_USER` SET PR_ID=$pr_id,TYPE='$stype',INVOICE_UID='$uid',IID=$iid";
					
					if(!$rs=$db->query("$sql")){
						throw new Exception('prize user cannot be saved.');
					}
				}
			}elseif($stype=='joy'){
				foreach($_POST['ICOOK_ID'] as $key =>$icookid){
					$sql="INSERT INTO `PRIZE_USER` SET PR_ID=$pr_id,TYPE='$stype',ICOOK_ID=$icookid";
					if(!$rs=$db->query("$sql")){
						throw new Exception('prize user cannot be saved.');
					}
				}

			}else{
				foreach($_POST['FB_ID'] as $key =>$fbid){
					$icookid=$_POST['ICOOK_ID'][$key];
					$sql="INSERT INTO `PRIZE_USER` SET PR_ID=$pr_id,TYPE='$stype',FB_ID='$fbid',ICOOK_ID=$icookid";
					if(!$rs=$db->query("$sql")){
						throw new Exception('prize user cannot be saved.');
					}
				}
			}
			$res['status']=true;
			$res['msg']="save ok";
		}else{
			throw new Exception('model cannot be saved.');
		}
	} catch (Exception $e) {
		$res['status']=false;
		$res['msg']=$e->getMessage();
	}
echo json_encode($res);
}
?>
