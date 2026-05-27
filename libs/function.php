<?php
//require_once LIBS_PATH."/removexss.func.php";
//js轉址含訊息
function jsRedirect($url=false, $msg=false) 
{

  if($msg) 
  {
    header("Content-type: text/html; charset=utf-8"); 
    $str = sprintf("alert(\"%s\");", $msg) ;
  }

  $str .= $url?sprintf("location.href=\"%s\";", $url):"history.back(-1);" ;
  echo sprintf("<script language=\"javascript\">%s</script>", $str) ; 
  exit ;  
}

function sendmail ($FromName, $FromEmail, $Subject, $Content, $Address){
  require_once(LIBS_DIR.'/mail/phpmailer/class.phpmailer.php');
  $mlr=new PHPMailer();
  $mlr->IsSMTP();
  $mlr->IsHTML(true);
  $mlr->Host="ip1.yam.com";
  $mlr->CharSet  ="utf-8";
  $mlr->FromName = $FromName;
  $mlr->From= $FromEmail;
  $mlr->Subject= $Subject;
  $mlr->Body= $Content;
  $mlr->AddAddress($Address);
  $mlr->Send();
}

function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
} else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
}
return $pageURL;
}
function addYamiePet($yid,$petid){
  $verify=sha1('kids'.$yid.'yamie');
  $url=ADD_YAMIE_PET_API.'?yid='.$yid.'&petid='.$petid.'&h='.$verify; 
  $data=getData($url);
  if($data['code']==200 && $data['msg']=='ok'){
    return true;
  }else{
    return false;
  }
}
function getYamieFriends($yid){
  $verify=sha1('kids'.$yid.'yamie');
  $url=YAMIE_FRIEND_API.'?yid='.$yid.'&h='.$verify; 
  $data=getData($url);
  if($data['code']==200 && $data['msg']=='ok'){
    return $data['friends'];
  }else{
    return array();
  }
}
function plurkToYamieFriend($yid,$friends,$msg){
  require_once LIBS_DIR.'/Snoopy.class.php';
  $snoopy = new Snoopy;
  $snoopy->httpmethod = "POST";
  $verify=sha1('kids'.$yid.'yamie');
  $url=PLURK_YAMIE_API.'?yid='.$yid.'&h='.$verify;
  $submit_vars=array('friends'=>$friends,'msg'=>$msg);
  $snoopy->submit($url, $submit_vars);
  $res= $snoopy->results;
}
function checkIsYamieScrectBase($yid){
  $verify=sha1('kids'.$yid.'yamie');
  $url=YAMIE_SCRECTBASE_API.'?yid='.$yid.'&h='.$verify; 
  $data=getData($url);
  if($data['code']==200 && $data['msg']=='ok'){
    return $data['hasbase'];
  }else{
    return 0;
  }
}
function getData($url){
  $data=json_decode(file_get_contents($url),true);
  return $data;
}
function myYamieMsg($url){
  $res="跟你說唷，我有參加伴點奶茶揪團送奶茶的活動耶!
  如果我們的團隊人數是第1名的話就有伴點可以喝~
  (ex.隊員人數100人，即贈送伴點奶茶100箱。)
  越多隊員就越多箱喔～
  你願意加入我的隊伍嗎？

  (我有上傳一張照片喔，一起來看看吧($url)！！) ";
  return $res;
}
function mailMsg($url){
  $res="跟你說唷，我有參加伴點奶茶揪團送奶茶的活動耶!<BR/>
  如果我們的團隊人數是第1名的話就有伴點可以喝~<br />
  <span style='color:#F00;'>(ex.隊員人數100人，即贈送伴點奶茶100箱。)</span><br /><br />
  越多隊員就越多箱喔～<br /><br />
  你願意加入我的隊伍嗎？<br /><br />

  (我有上傳一張照片喔，一起來<a href='$url'>看看吧</a>！！)";
  return $res;
}

function parse_time_str($str)
{
  $reg="/([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/";
  $r=array();
  preg_match($reg,$str,$r);
  if($r)
  {
    $t= mktime($r[4],$r[5],$r[6],$r[2],$r[3],$r[1]);
    return $t;
  }else 
  return false;
}

function excel($params=array()){
 $filename="bfm".date('Y-m-d_H:i:s').".csv";
 header("Content-type: text/csv");
 header("Content-Disposition: attachment; filename=$filename");
 header("Pragma: no-cache");
 header("Expires: 0");
 $fp = fopen('php://output', 'w');
 fwrite($fp, "\xEF\xBB\xBF");
 fputcsv($fp, $params['header']);
 foreach($params['data'] as $data){
  fputcsv($fp, $data);
}
exit;
}
function getNextColumn($c=''){
  if($c==''){
    return 'A';
  }else{
    if(strlen($c)==1){
      return (ord($c)<90)?chr(ord($c)+1):'AA';
    }elseif(strlen($c)==2){
      return (ord($c[1])<90)?$c[0].chr(ord($c[1])+1):chr(ord($c[0])+1).'A';
    }else{
      die('column error');
    }
  }
}
function uploadToYfps($file_path){
  require_once dirname(__FILE__)."/Snoopy.class.php";
  $snoopy = new Snoopy;
  $snoopy->set_submit_multipart();
  $submit_files['userfile']=$file_path;
  $submit_vars=array();
  $submit_vars['PASSWORD']=YFPS_PASSWD;
  $snoopy->submit(YFPS_UPLOAD_URL, $submit_vars, $submit_files);
  $snoopy->results;
  $res=json_decode($snoopy->results,true);
  if($res[0]['CODE']=='200'){
    $imageUrl=$res[0]['URL'];
        //    shell_exec("wget $imageUrl -O /tmp/p.out >/dev/null 2>&1");
    return $imageUrl;
  }else{
    return false;
  }
}

function upload2YFPS($from){
  if(is_file($from)){
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, YFPS_UPLOAD_URL);
   curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: multipart/form-data;"));
   $post = array(
    "userfile"=>"@$from",
    'PASSWORD'=>YFPS_PASSWD
    );
   curl_setopt($ch, CURLOPT_VERBOSE, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post); 
   echo $response=curl_exec($ch);
   if($response === false){
    return false;
  }
  curl_close($ch);

  $result=json_decode($response);
  $fileurl=$result[0]->URL;
  return $fileurl;
}else
return false;
}
function encryptStr($str, $key){
  $block = mcrypt_get_block_size('des', 'ecb');
  $pad = $block - (strlen($str) % $block);
  $str .= str_repeat(chr($pad), $pad);

  return base64_encode(mcrypt_encrypt(MCRYPT_3DES, $key, $str, MCRYPT_MODE_ECB));
}

function decryptStr($str, $key){  
  $str = mcrypt_decrypt(MCRYPT_3DES, $key, base64_decode($str), MCRYPT_MODE_ECB);
  $block = mcrypt_get_block_size('des', 'ecb');
  $pad = ord($str[($len = strlen($str)) - 1]);
  return substr($str, 0, strlen($str) - $pad);
}
function actionLog($user,$action){
	global $db;
	$user=encryptStr($user,ENCRYPT_KEY);
	$action=encryptStr($action,ENCRYPT_KEY);
	$IP=$_SERVER['REMOTE_ADDR'];
	$sql="INSERT INTO `LOG_EN` (`ACCOUNT`, `ACT`, `ACTTIME`,`IP`) VALUES ('{$user}', '$action', NOW(),'$IP')";
	$db->query($sql);
}
?>
