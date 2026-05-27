<?php
session_start();
require_once dirname(__FILE__).'/config_auth.php';
require_once CLASS_DIR.'/backendpagebar.class.php';

require_once LIBS_DIR.'/function.php';
require_once(LIBS_DIR.'/init_smarty.php');
require_once(LIBS_DIR.'/init_db.php');
$perpage=20;
$page=(int)$_GET['page'];


if(!$page)
	$page=1;

  
$smarty->assign('nav',1);
$sql="SELECT  SQL_CALC_FOUND_ROWS u.id, q.q1, q.q2, q.q3, q.q4, q.q5, q.q6, q.q7, q.q8, q.q9, q.q10, q.q11, q.q12, q.q13, q.q14, q.q15, q.q16, u.name, u.team, u.email, u.phone, u.school, u.teacher, q.ip, q.createAt FROM `users` as u Right join `quiz` as q on u.quizId=q.id ORDER BY q.createAt DESC LIMIT ".$perpage*($page-1).",$perpage ";
$itemList=$db->get_results($sql);
$result1 = $db->query_first("SELECT FOUND_ROWS() AS C;");
$total = $result1['C'];

$url=BackendPagebar::getCurrentPageUrl();
$pagebar=new BackendPagebar('page',$perpage,$page,$total,$url) ;


$smarty->assign('itemList',$itemList);

$smarty->assign('pagebar',$pagebar->show());
//$smarty->caching =2;
//if(!$smarty->isCached('index.html')){
//bloger
//}
//$smarty->cache_lifetime = 36000;
$smarty->display("adm/useradmin.html");
