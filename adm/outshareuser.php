<?php
set_time_limit(0);
ini_set("memory_limit","800M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
require_once(LIBS_DIR.'/init_db.php');
$params['header']=array('ID', 'NAME','PHONE','TEAM','EMAIL',"SCHOOL", "TEACHER", 'Q1','Q2','Q3','Q4','Q5','Q6','Q7','Q8','Q9','Q10','Q11','Q12','Q13','Q14','Q15','Q16', 'IP', 'TIME');
$url = EVENT_URL;
$sql="SELECT u.id, u.name ,CONCAT('=\"',u.phone,'\"') AS phone,u.team, u.email, u.school, u.teacher,
    CASE WHEN q.q1 = 1 THEN '正確' WHEN q.q1 = 0 THEN '錯誤' ELSE '' END as q1,
    CASE WHEN q.q2 = 1 THEN '正確' WHEN q.q2 = 0 THEN '錯誤' ELSE '' END as q2,
    CASE WHEN q.q3 = 1 THEN '正確' WHEN q.q3 = 0 THEN '錯誤' ELSE '' END as q3,
    CASE WHEN q.q4 = 1 THEN '正確' WHEN q.q4 = 0 THEN '錯誤' ELSE '' END as q4,
    CASE WHEN q.q5 = 1 THEN '正確' WHEN q.q5 = 0 THEN '錯誤' ELSE '' END as q5,
    CASE WHEN q.q6 = 1 THEN '正確' WHEN q.q6 = 0 THEN '錯誤' ELSE '' END as q6,
    CASE WHEN q.q7 = 1 THEN '正確' WHEN q.q7 = 0 THEN '錯誤' ELSE '' END as q7,
    CASE WHEN q.q8 = 1 THEN '正確' WHEN q.q8 = 0 THEN '錯誤' ELSE '' END as q8,
    CASE WHEN q.q9 = 1 THEN '正確' WHEN q.q9 = 0 THEN '錯誤' ELSE '' END as q9,
    CASE WHEN q.q10 = 1 THEN '正確' WHEN q.q10 = 0 THEN '錯誤' ELSE '' END as q10,
    CASE WHEN q.q11 = 1 THEN '正確' WHEN q.q11 = 0 THEN '錯誤' ELSE '' END as q11,
    CASE WHEN q.q12 = 1 THEN '正確' WHEN q.q12 = 0 THEN '錯誤' ELSE '' END as q12,
    CASE WHEN q.q13 = 1 THEN '正確' WHEN q.q13 = 0 THEN '錯誤' ELSE '' END as q13,
    CASE WHEN q.q14 = 1 THEN '正確' WHEN q.q14 = 0 THEN '錯誤' ELSE '' END as q14,
    CASE WHEN q.q15 = 1 THEN '正確' WHEN q.q15 = 0 THEN '錯誤' ELSE '' END as q15,
    CASE WHEN q.q16 = 1 THEN '正確' WHEN q.q16 = 0 THEN '錯誤' ELSE '' END as q16
    ,q.ip, q.createAt
FROM users as u 
JOIN quiz as q ON u.quizId=q.id";
$itemList=$db->get_results("$sql");


$params['data']=$itemList;
excel($params);
 actionLog($adminuser,'exportvote');


?>
