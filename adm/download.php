<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
$res=array("status"=>false,"msg"=>"nothing");
//echo $item->T1;
$prid=(int)$_GET['prid'];
//$prize=Prize::model()->findByPk($prid);
$sql="SELECT * FROM `PRIZE` WHERE PR_ID=$prid";
$item=$db->query_first($sql);
if(in_array($item['TYPE'],array('10000', '5000', '2000'))){
	$sql="SELECT I.NAME,I.EMAIL,I.PHONE,ID.SN,I.IP FROM `PRIZE_USER` AS PU JOIN `INVOICE_DATA` AS ID ON PU.IID=ID.IID JOIN `INVOICE` AS I ON I.UID=ID.UID WHERE PU.PR_ID=$prid";
	$prize=$db->get_results($sql);
	$head[]="名稱";
	$head[]="EMAIL";
	$head[]="phone";
	$head[]="發票號碼";
	$head[]="IP";

	foreach($prize as $item){
		$data[]=array(
				$item['NAME'],$item['EMAIL'],"=\"{$item['PHONE']}\"",$item['SN'],
				$item['IP']
			     );
	}
}elseif(in_array($item['TYPE'],array('joy-machine','joy-movie','joy-disk'))){
	$sql="SELECT I.NICKNAME,I.TITLE , I.URL FROM `PRIZE_USER` AS PU JOIN `ICOOK_DATA` as I ON I.ICOOK_ID=PU.ICOOK_ID WHERE PU.PR_ID=$prid";
	$prize=$db->get_results($sql);
	$head[]="名稱";
        $head[]="食譜名稱";
        $head[]="url";
	foreach($prize as $item){
		$data[]=array(
				$item['NICKNAME'],$item['TITLE'],$item['URL']
			     );
	}


}else{
	$sql="SELECT S.NAME,S.EMAIL,I.TITLE FROM `PRIZE_USER` AS PU JOIN `SHARE_USER` AS S ON S.FB_ID=PU.FB_ID JOIN `ICOOK_DATA` as I ON I.ICOOK_ID=PU.ICOOK_ID WHERE PU.PR_ID=$prid GROUP BY S.FB_ID";
	$prize=$db->get_results($sql);
	$head[]="名稱";
        $head[]="EMAIL";
        $head[]="發享食譜名稱";
	foreach($prize as $item){
		$data[]=array(
				$item['NAME'],$item['EMAIL'],$item['TITLE'],
			     );
	}



}
$params['header']=$head;
$params['data']=$data;
excel($params);
?>
