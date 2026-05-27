<?php
/* Smarty version 4.5.3, created on 2025-10-03 10:30:48
  from '/home/httpd/vhosts/novape-event.com/httpdocs/templates/adm/useradmin.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68df3558ef2026_30964623',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '570f0fc48117bc58de260a2a1eb0745dc8a674f6' => 
    array (
      0 => '/home/httpd/vhosts/novape-event.com/httpdocs/templates/adm/useradmin.html',
      1 => 1759458647,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68df3558ef2026_30964623 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_91954552968df3558e3a8b5_98953465', "head");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_77105489168df3558e3dba2_32895561', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "adm/base.html");
}
/* {block "head"} */
class Block_91954552968df3558e3a8b5_98953465 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_91954552968df3558e3a8b5_98953465',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<style>
.answer-correct {
    color: #28a745;
    font-weight: bold;
}
.answer-incorrect {
    color: #dc3545;
    font-weight: bold;
}
.answer-null {
    color: #6c757d;
    font-style: italic;
}
</style>
<?php echo '<script'; ?>
 type="text/javascript">
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "head"} */
/* {block "content"} */
class Block_77105489168df3558e3dba2_32895561 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_77105489168df3558e3dba2_32895561',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h3>user清單管理</h3>

<a class="btn" href="outshareuser.php" target="_blank" >匯出</a>
<a class="btn btn-info" href="quizstatistics.php">查看遊戲統計</a>

<table class="table table-condensed tablesorter" id="sortable">
  <thead>
  	<tr>
	  	<th>#</th>
	  	<th>名稱</th>
	  	<th>PHONE</th>
	  	<th>EMAIL</th>
	  	<th>TEAM</th>
	  	<th>SCHOOL</th>
	  	<th>TEACHER</th>
	  	<th>q1</th>
		<th>q2</th>
		<th>q3</th>
		<th>q4</th>
		<th>q5</th>
		<th>q6</th>
		<th>q7</th>
		<th>q8</th>
		<th>q9</th>
		<th>q10</th>
		<th>q11</th>
		<th>q12</th>
		<th>q13</th>
		<th>q14</th>
		<th>q15</th>
		<th>q16</th>
	  	<th>IP</th>
	  	<th>時間</th>
  	</tr>
  </thead>
  <tbody>
	  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['itemList']->value, 'item', false, 'k');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
	  	<tr>
		  	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
		  	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</td>
		  	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['phone'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['email'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['team'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['school'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['teacher'];?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q1'] !== null && $_smarty_tpl->tpl_vars['item']->value['q1'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q1'] !== null && $_smarty_tpl->tpl_vars['item']->value['q1'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q2'] !== null && $_smarty_tpl->tpl_vars['item']->value['q2'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q2'] !== null && $_smarty_tpl->tpl_vars['item']->value['q2'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q3'] !== null && $_smarty_tpl->tpl_vars['item']->value['q3'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q3'] !== null && $_smarty_tpl->tpl_vars['item']->value['q3'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q4'] !== null && $_smarty_tpl->tpl_vars['item']->value['q4'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q4'] !== null && $_smarty_tpl->tpl_vars['item']->value['q4'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q5'] !== null && $_smarty_tpl->tpl_vars['item']->value['q5'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q5'] !== null && $_smarty_tpl->tpl_vars['item']->value['q5'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q6'] !== null && $_smarty_tpl->tpl_vars['item']->value['q6'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q6'] !== null && $_smarty_tpl->tpl_vars['item']->value['q6'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q7'] !== null && $_smarty_tpl->tpl_vars['item']->value['q7'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q7'] !== null && $_smarty_tpl->tpl_vars['item']->value['q7'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q8'] !== null && $_smarty_tpl->tpl_vars['item']->value['q8'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q8'] !== null && $_smarty_tpl->tpl_vars['item']->value['q8'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q9'] !== null && $_smarty_tpl->tpl_vars['item']->value['q9'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q9'] !== null && $_smarty_tpl->tpl_vars['item']->value['q9'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q10'] !== null && $_smarty_tpl->tpl_vars['item']->value['q10'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q10'] !== null && $_smarty_tpl->tpl_vars['item']->value['q10'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q11'] !== null && $_smarty_tpl->tpl_vars['item']->value['q11'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q11'] !== null && $_smarty_tpl->tpl_vars['item']->value['q11'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q12'] !== null && $_smarty_tpl->tpl_vars['item']->value['q12'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q12'] !== null && $_smarty_tpl->tpl_vars['item']->value['q12'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q13'] !== null && $_smarty_tpl->tpl_vars['item']->value['q13'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q13'] !== null && $_smarty_tpl->tpl_vars['item']->value['q13'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q14'] !== null && $_smarty_tpl->tpl_vars['item']->value['q14'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q14'] !== null && $_smarty_tpl->tpl_vars['item']->value['q14'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q15'] !== null && $_smarty_tpl->tpl_vars['item']->value['q15'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q15'] !== null && $_smarty_tpl->tpl_vars['item']->value['q15'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
			<td><?php if ($_smarty_tpl->tpl_vars['item']->value['q16'] !== null && $_smarty_tpl->tpl_vars['item']->value['q16'] == 1) {?><span class="answer-correct">正確</span><?php } elseif ($_smarty_tpl->tpl_vars['item']->value['q16'] !== null && $_smarty_tpl->tpl_vars['item']->value['q16'] == 0) {?><span class="answer-incorrect">錯誤</span><?php }?></td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['ip'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['item']->value['createAt'];?>
</td>
		</tr>
	  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </tbody>
</table>
<?php echo $_smarty_tpl->tpl_vars['pagebar']->value;?>

<?php echo '<script'; ?>
>
$(document).ready(function(event){
	$('#getPrize').click(function(event){
		$.colorbox({iframe:true,href:'outprizeuser.php',innerWidth:'600px',innerHeight:'280px'});
	});
});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "content"} */
}
