<?php
require_once __DIR__.'/config_auth.php';

//new initial('smarty');
require_once(LIBS_DIR.'/init_smarty.php');

$smarty->display('adm/index.html');
