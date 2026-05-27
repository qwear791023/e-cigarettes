<?php
//require_once('init.php');
require_once dirname(__FILE__).'/config.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
new initial('smarty','db');
// use HASH in config.php , to gen json array timestamp, sha256(hash + timestamp)
require_once LIBS_DIR.'/function.php';
$timpestamp = time();
$hash = hash('sha256', HASH . $timpestamp);
header('Content-Type: application/json');
echo json_encode(array('timestamp'=>$timpestamp, 'hash'=>$hash));