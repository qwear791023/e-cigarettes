<?php
// 啟用錯誤顯示（適用於 PHP 8.3）
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

/*
session_start();
exit();
if ($_SESSION['q2'] !='ok' ){
    echo "<script>alert('非正常管道登入');window.location.href='index.php';</script>";
    exit();
}
*/
//aaa
require_once dirname(__FILE__).'/config.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
new initial('smarty','db');
require_once LIBS_DIR.'/function.php';
function recaptchaVerify($token, $expectedAction = 'USER_ACTION') {
    $url = "https://recaptchaenterprise.googleapis.com/v1/projects/jenny-429102/assessments?key=".RECAPTCHA_Private;
    
    // 準備 reCAPTCHA v3 Enterprise API 的 JSON 資料
    $postData = json_encode([
        "event" => [
            "token" => $token,
            "expectedAction" => $expectedAction,
            "siteKey" => RECAPTCHA_Site,
        ]
    ]);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  // 直接在 body 中發送 JSON 資料
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($postData)
    ]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    
    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // 除錯資訊（生產環境應該移除）
    error_log("reCAPTCHA HTTP Code: " . $httpcode);
    error_log("reCAPTCHA Response: " . $output);
    
    if (curl_error($ch)) {
        $error = curl_error($ch);
        curl_close($ch);
        error_log("reCAPTCHA cURL Error: " . $error);
        return array('riskAnalysis' => array('score' => 0), 'error' => 'curl_error: ' . $error);
    }
    
    curl_close($ch);
    
    if ($httpcode !== 200) {
        error_log("reCAPTCHA HTTP Error: " . $httpcode);
        return array('riskAnalysis' => array('score' => 0), 'error' => 'http_error: ' . $httpcode);
    }
    
    $decoded = json_decode($output, true);
    if ($decoded === null) {
        error_log("reCAPTCHA JSON Decode Error: " . json_last_error_msg());
        return array('riskAnalysis' => array('score' => 0), 'error' => 'json_decode_error');
    }
    
    return $decoded;
}
if($_POST['phone'] && 
    $_POST['name'] 
    ) {
    $res = array('msg' => '', 'status'=> true);
    $hash = $_POST['hash'];
    $timestamp = $_POST['timestamp'];
    // verify hash and timestamp
    if (!$hash || !$timestamp || $hash !== hash('sha256', HASH . $timestamp)) {
        $res['status'] = false;
        $res['msg'] = "驗證失敗，請重新整理頁面後再試";
        echo json_encode($res);
        exit();
    }
    $output = recaptchaVerify($_POST['token'], 'USER_ACTION');
    
    // 檢查 reCAPTCHA Enterprise API 的回應
    $score = isset($output['riskAnalysis']['score']) ? $output['riskAnalysis']['score'] : 0;
    
    if($score < 0.7) {
        $res['status'] = false;
        $res['msg'] = "安全驗證未通過, score: {$score}";
        if (isset($output['error'])) {
            $res['msg'] .= " (錯誤: {$output['error']})";
        }
        echo json_encode($res);
        exit();
    }
    
    // reCAPTCHA 驗證通過，處理表單資料
    $name=$db->escape($_POST['name']);
    $phone=$db->escape($_POST['phone']);
    $email=$db->escape($_POST['email']);
    $team=$db->escape($_POST['team']);
    
    // 處理 school 和 teacher，如果為空就設定為 NULL
    $school = empty($_POST['school']) ? 'NULL' : "'".$db->escape($_POST['school'])."'";
    $teacher = empty($_POST['teacher']) ? 'NULL' : "'".$db->escape($_POST['teacher'])."'";
    
    $records = json_decode($_POST['records'], true);
    /*
    records = [
        {
            "questionNum": 1,
            "answerResult": "y"
        },
        {
            "questionNum": 2,
            "answerResult": "n"
        },
        ...
    ]
    */
    // must ansered 5 questions
    if (count($records) < 5) {
        $res['status'] = false;
        $res['msg'] = "請完成所有題目";
        echo json_encode($res);
        exit();
    }
    $formsql="INSERT  INTO `users` SET `quizId`='$hash' ,`team`='$team', `name`='$name', `phone`='$phone', `email`='$email', `school`=$school, `teacher`=$teacher, `ip`='".getIP()."'"; 
    // append sql with records, questionNum => `q{questionNum}`='{answerResult}'
    $sql = "INSERT INTO `quiz` SET `id`='$hash', `team`='$team', `ip`='".getIP()."'";
    foreach ($records as $record) {
        $questionNum = (int)$record['questionNum'];
        $answerResult = $record['answerResult'] === 'y' ? 1 : 0;
        $sql .= ", `q{$questionNum}`=$answerResult";
    }
    $rs=$db->query("$sql");	
    if (!$rs) {
        $res['status'] = false;
        $res['msg'] = "資料庫發生錯誤，請稍後再試\r\n$sql";
        echo json_encode($res);
        exit();
    }
    $rs=$db->query("$formsql");

    if (!$rs) {
        $res['status'] = false;
        $res['msg'] = "資料庫發生錯誤，請稍後再試\r\n$sql";
        echo json_encode($res);
        exit();
    }
    $res['msg'] = "資料已成功登錄 感謝你的參與";
    echo json_encode($res);
    exit();
}
