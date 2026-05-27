<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once CLASS_DIR.'/backendpagebar.class.php';

require_once LIBS_DIR.'/function.php';
require_once(LIBS_DIR.'/init_smarty.php');
require_once(LIBS_DIR.'/init_db.php');



if($_POST['ids'])
{
    $ids = explode(",", $_POST['ids']);
    $i = 0;
    foreach($ids as $id)
    {
        $i++;
        $sql = "UPDATE `video` SET `weight`=$i WHERE `id`=$id";
        $rs=$db->query("$sql");
    }
    if ($rs) {
        $res['msg'] = "新增/更新 成功"; 
        $res['return'] = true;
     } else {
        $res['msg'] = "新增/更新 失敗";
        $res['return'] = false;
     }
    echo json_encode($res);
        exit();


}
$sql = "SELECT * FROM `video` WHERE `isTop`='on' order by `weight`";
$itemList = $db->get_results($sql);
$smarty->assign('itemList', $itemList);
$smarty->assign('nav', 3);

$smarty->display("adm/vsort.html");
