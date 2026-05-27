<?php
session_start();
$allowips = array('61.222.58.235', '60.250.109.151', '118.150.130.32', '60.250.109.151', '118.150.195.10', '34.173.225.164', '111.251.216.250');
if (!empty($_SERVER["HTTP_CLIENT_IP"])){
    $ip = $_SERVER["HTTP_CLIENT_IP"];
}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}else{
    $ip = $_SERVER["REMOTE_ADDR"];
}


if (!in_array($ip, $allowips)) {
    header('HTTP/1.0 403 Forbidden');
    echo "You $ip are forbidden!";
    exit(0);
}

/*
if ($_SESSION["authenticated"]!=true){
    header('WWW-Authenticate: Basic realm="MANAGE"');
    header('HTTP/1.0 401 Unauthorized');
    header("Location: login.php");
    exit();
}
    */
$ids = array('novapereport');
$pw= array('novapereport'=>'reportmohw22r');
//$pw = 'reportmohw22r';

$current_url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || (!in_array($_SERVER['PHP_AUTH_USER'],$ids )|| $_SERVER['PHP_AUTH_PW']!=$pw[$_SERVER['PHP_AUTH_USER']]) ) {
    header('WWW-Authenticate: Basic realm="MANAGE"');
    header('HTTP/1.0 401 Unauthorized');
    echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title></title></head><body><a href="'.$current_url.'" style="color:#f00;">登入
</a></body></html>';
    exit;
} else if($_SERVER['PHP_AUTH_USER']==$id && $_SERVER['PHP_AUTH_PW']==$pw){
  //pass
   header("Location: useradmin.php");
}
require_once __DIR__.'/../config.php';
