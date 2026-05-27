<?php
require_once LIBS_DIR.'/db_mysql.php';
global $db;
$db=new DB_MYSQL();
$db->reporterror=1;
$db->database = DB_EVENT_DATABASE;
$db->server = DB_EVENT;
$db->user = DB_EVENT_USER;
$db->password = DB_EVENT_PASS;
$db->connect();
#$db->fetch_array_type=MYSQL_ASSOC;
#    $db->query("SET NAMES 'utf8'");
?>
