<?php
set_time_limit(0);
ini_set("memory_limit","800M");
require_once dirname(__FILE__).'/config_auth.php';
require_once LIBS_DIR.'/initial.class.php';
require_once LIBS_DIR.'/page.php';
require_once LIBS_DIR.'/function.php';
new initial('db');


$sql="SELECT ID ,NAME,CONCAT('https://www.facebook.com/',FB_ID) AS FB,EMAIL,ICOOK_ID,IP,CREATE_TIME FROM `SHARE_USER` ORDER BY RAND() LIMIT 0,1" ;
$rs=$db->query_first("$sql");


?>
<table border="2" style="border-color:red; border-style:dotted;">
	<tr>
		<td rowspan="2"><img src="img/prizeimg.jpg"/><td>
		<td>得獎者姓名</td>
		<td>EMAIL</td>
		<td>分享日期</td>
		
	</tr>
	<tr>
		<td></td>
		<td><?php echo $rs['NAME'];?></td>
		<td><?php echo $rs['EMAIL'];?></td>
		<td><?php echo $rs['CREATE_TIME'];?></td>
		
	</tr>
</table>
