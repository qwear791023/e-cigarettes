<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once CLASS_DIR.'/backendpagebar.class.php';

require_once LIBS_DIR.'/function.php';
require_once(LIBS_DIR.'/init_smarty.php');
require_once(LIBS_DIR.'/init_db.php');



if($_GET['id'])
{
    $id = (int) $_GET['id'];
    $sql = "DELETE FROM `video` WHERE `id`=$id";
    $rs=$db->query("$sql");
    if ($rs) {
        $res['msg'] = "刪除成功"; 
        $res['status'] = true;
     } else {
        $res['msg'] = "刪除失敗";
        $res['status'] = false;
     }
    echo json_encode($res);
        exit();


}
