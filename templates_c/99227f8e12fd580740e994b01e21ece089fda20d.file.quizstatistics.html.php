<?php /* Smarty version Smarty3-RC3, created on 2025-10-03 10:33:53
         compiled from "/home/httpd/vhosts/novape-event.com/httpdocs/templates/adm/quizstatistics.html" */ ?>
<?php /*%%SmartyHeaderCode:166683629768df3611dd4a61-55848027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99227f8e12fd580740e994b01e21ece089fda20d' => 
    array (
      0 => '/home/httpd/vhosts/novape-event.com/httpdocs/templates/adm/quizstatistics.html',
      1 => 1759458648,
    ),
    '510182f282d64d62d482e2e27da493b1abfc4499' => 
    array (
      0 => '/home/httpd/vhosts/novape-event.com/httpdocs/templates/adm/base.html',
      1 => 1759458645,
    ),
  ),
  'nocache_hash' => '166683629768df3611dd4a61-55848027',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta charset="utf-8">
<!--[if lt IE 9]>  
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>  
<![endif]-->  
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/anytime.css" rel="stylesheet">
	<link href="css/jquery.tablesorter.css" rel="stylesheet">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" ></script>
	<script src="js/bootstrap.min.js"></script>

<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery.ui.all.css" rel="stylesheet">
<link href="css/jquery.datetimepicker.css" rel="stylesheet">
<link href="css/colorbox/colorbox.css" rel="stylesheet">
	
<style>
.statistics-section {
    margin-bottom: 30px;
    background: #f8f9fa;
    padding: 20px;
    border-radius: 5px;
}
.team-table {
    margin-bottom: 30px;
}
.team-header {
    background-color: #007bff;
    color: white;
    padding: 15px;
    margin-bottom: 0;
    border-radius: 8px 8px 0 0;
    text-align: center;
}
.team-header h4 {
    margin: 0;
    font-weight: bold;
}
.senior-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
.elementary-header {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}
.correct-rate {
    font-weight: bold;
    text-align: center;
}
.rate-high { 
    background-color: #d4edda !important;
    color: #155724 !important;
}
.rate-medium { 
    background-color: #fff3cd !important;
    color: #856404 !important;
}
.rate-low { 
    background-color: #f8d7da !important;
    color: #721c24 !important;
}
.statistics-container {
    margin-top: 20px;
}
.table th {
    background-color: #f8f9fa;
    text-align: center;
    vertical-align: middle;
    font-weight: bold;
}
.table td {
    text-align: center;
    vertical-align: middle;
}
.table td:first-child {
    font-weight: bold;
    text-align: left;
}
.text-info {
    color: #0c7cd5 !important;
    font-weight: bold;
}
.text-warning {
    color: #f57c00 !important;
    font-weight: bold;
}
.text-success {
    color: #2e7d32 !important;
    font-weight: bold;
}
.text-danger {
    color: #d32f2f !important;
    font-weight: bold;
}
</style>
<script type="text/javascript">
function loadGameStatistics() {
    $.ajax({
        url: 'gamestatistics.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            displayStatistics(data);
        },
        error: function(xhr, status, error) {
            console.error('Error loading statistics:', error);
            $('#statistics-container').html('<div class="alert alert-danger">載入統計數據失敗</div>');
        }
    });
}

function displayStatistics(data) {
    let html = '';
    
    data.forEach(function(teamData) {
        const teamName = teamData.team === 'senior' ? '高中組' : '國小組';
        const headerClass = teamData.team === 'senior' ? 'senior-header' : 'elementary-header';
        
        html += `
            <div class="team-table">
                <div class="team-header ${headerClass}">
                    <h4>${teamName} 題目統計 (總參與人數: ${teamData.totalParticipants})</h4>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>題目編號</th>
                            <th>正確率</th>
                            <th>出現次數</th>
                        </tr>
                    </thead>
                    <tbody>
        `;
        
        for (let i = 1; i <= 16; i++) {
            if (i == 16 && teamData.team === 'elementary') continue; // 國小組沒有第16題
            const qKey = 'q' + i;
            const rate = teamData[qKey] ? parseFloat(teamData[qKey]) : 0;
            const percentage = (rate * 100).toFixed(1);
            const appeared = teamData[qKey + '_appear'] || 0;
            
            let rateClass = 'rate-medium';
            if (rate >= 0.8) rateClass = 'rate-high';
            else if (rate < 0.5) rateClass = 'rate-low';
            
            // 計算出現率
            const appearanceRate = teamData.totalParticipants > 0 ? 
                ((appeared / teamData.totalParticipants) * 100).toFixed(1) : '0.0';
            
            html += `
                <tr>
                    <td><strong>第 ${i} 題</strong></td>
                    <td class="correct-rate ${rateClass}">${percentage}%</td>
                    <td class="text-info">${appeared} (${appearanceRate}%)</td>
                </tr>
            `;
        }
        
        html += `
                    </tbody>
                </table>
            </div>
        `;
    });
    
    $('#statistics-container').html(html);
}
</script>

</head>
<body >
<div class="container main">
	<h1>novape-event</h1>
	<div class="navbar navbar-default" role="navigation">
	  <div class="collapse navbar-collapse">
	  	
	    <ul class="nav navbar-nav">
	      <li class="<?php if ($_smarty_tpl->getVariable('nav')->value==1){?>active<?php }?>"><a href="useradmin.php">報名列表</a></li>
	      <li class="<?php if ($_smarty_tpl->getVariable('nav')->value==2){?>active<?php }?>"><a href="quizstatistics.php">遊戲統計</a></li>
	    </ul>
	   
	    
	  </div>
	</div>
	<div class="container">
		
<h3>遊戲統計 - 題目正確率</h3>

<!-- 遊戲統計區域 -->
<div class="statistics-section">
    <button class="btn btn-primary" onclick="loadGameStatistics()">載入統計數據</button>
    <div id="statistics-container" class="statistics-container">
        <div class="alert alert-info">點擊上方按鈕載入統計數據</div>
    </div>
</div>

<script>
$(document).ready(function(event){
    // 頁面載入時自動載入統計數據
    loadGameStatistics();
});

function exportStatistics() {
    window.open('outputgamestatistics.php', '_blank');
}
</script>

	</div>
</div>
</body>
</html>
