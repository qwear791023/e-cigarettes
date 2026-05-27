<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once CLASS_DIR.'/backendpagebar.class.php';

require_once LIBS_DIR.'/function.php';
require_once(LIBS_DIR.'/init_smarty.php');
require_once(LIBS_DIR.'/init_db.php');



$id=(int)$_GET['id'];
$res = array('status' => 'view', 'msg' => '');
if($_POST['postsubmit'])
{
    $res['status'] = "modify";
    $uploads_dir = VIDEO_IMG_DIR;
    $isNew = false;
    $item = array();
    $image = null;
    $id = (empty($_POST['id'])) ? '': (int) $_POST['id'];
    if(!empty($id)) {
        $item = $db->query_first("SELECT * from video where id={$id}");
        $isNew = true;
    }
    if ($_FILES["photo"]['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["photo"]["tmp_name"];
        $name = basename($_FILES["photo"]['name']);
        $new_name = uniqid().'.'.pathinfo($name, PATHINFO_EXTENSION);
        move_uploaded_file($tmp_name, "$uploads_dir/$new_name");
        $image = "video/$new_name";
    } else {
        $image = $item['image'];
    }
    $sql="REPLACE INTO `video` SET  `id`='$id',`cat`='{$_POST['cat']}', `title`='{$_POST['title']}', `image`='$image', `link`='{$_POST['link']}', `isTop`='{$_POST['isTop']}', `listTop`='{$_POST['listTop']}' , `status`='{$_POST['status']}', `ip`='".getIP()."'";
    $rs=$db->query("$sql");
    if ($rs) {
        $res['msg'] = "新增/更新 成功"; 
        $res['return'] = true;
     } else {
        $res['msg'] = "新增/更新 失敗";
        $res['return'] = false;
     }

}
$smarty->assign('res',$res);
 
  
$smarty->assign('nav',2);
$sql="SELECT  * from `video` where `id`='$id'";
$item=$db->query_first($sql);
$smarty->assign('item',$item);
$smarty->display("adm/videoedit.html");
