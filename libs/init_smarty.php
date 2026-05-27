<?php
require_once LIBS_DIR.'/smarty/libs/Smarty.class.php';
    $smarty = new Smarty();
    $smarty->template_dir = EVENT_DIR. "/templates/";
    $smarty->compile_dir = EVENT_DIR. "/templates_c/";
    $smarty->cache_dir=EVENT_DIR."/cache/";
    $smarty->left_delimiter="<{";
    $smarty->right_delimiter="}>";

    $smarty->caching=false;
?>
