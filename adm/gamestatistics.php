<?php
session_start();

require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', 1);

// 計算每題的平均正確率和出現次數
$teams = ['elementary', 'senior'];
$results = [];

foreach ($teams as $team) {
    $teamData = ['team' => $team];
    
    // 計算總參與人數
    $totalSql = "SELECT COUNT(*) as total FROM `quiz` WHERE `team` = '$team'";
    $totalResult = $db->query_first($totalSql);
    $teamData['totalParticipants'] = $totalResult['total'];
    
    // 計算每題的統計
    for ($i = 1; $i <= 16; $i++) {
        $q = "q$i";
        
        // 計算平均正確率（排除 null 值）
        $avgSql = "SELECT AVG($q) as avg_rate FROM `quiz` WHERE `team` = '$team' AND $q IS NOT NULL";
        $avgResult = $db->query_first($avgSql);
        $teamData[$q] = $avgResult['avg_rate'] ? floatval($avgResult['avg_rate']) : 0;
        
        // 計算出現次數（非 null 的記錄數）
        $appearSql = "SELECT COUNT(*) as appear_count FROM `quiz` WHERE `team` = '$team' AND $q IS NOT NULL";
        $appearResult = $db->query_first($appearSql);
        $teamData[$q . '_appear'] = intval($appearResult['appear_count']);
        
       
        // 計算正確和錯誤次數
        $correctSql = "SELECT COUNT(*) as correct_count FROM `quiz` WHERE `team` = '$team' AND $q = 1";
        $correctResult = $db->query_first($correctSql);
        $teamData[$q . '_correct'] = intval($correctResult['correct_count']);
        
        $incorrectSql = "SELECT COUNT(*) as incorrect_count FROM `quiz` WHERE `team` = '$team' AND $q = 0";
        $incorrectResult = $db->query_first($incorrectSql);
        $teamData[$q . '_incorrect'] = intval($incorrectResult['incorrect_count']);
    }
    
    $results[] = $teamData;
}

echo json_encode($results);