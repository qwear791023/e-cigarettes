<?php
require_once __DIR__.'/config_auth.php';

require_once LIBS_DIR.'/initial.class.php';
$initial = new initial('smarty');

$smarty->assign('nav', 2); // 設定導航項目為活動狀態
$smarty->display('adm/quizstatistics.html');