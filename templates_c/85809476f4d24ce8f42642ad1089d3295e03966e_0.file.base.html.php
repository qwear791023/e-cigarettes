<?php
/* Smarty version 4.5.3, created on 2025-10-03 10:30:47
  from '/home/httpd/vhosts/novape-event.com/httpdocs/templates/adm/base.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.3',
  'unifunc' => 'content_68df355730eba2_39605058',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85809476f4d24ce8f42642ad1089d3295e03966e' => 
    array (
      0 => '/home/httpd/vhosts/novape-event.com/httpdocs/templates/adm/base.html',
      1 => 1759458645,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68df355730eba2_39605058 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta charset="utf-8">
<!--[if lt IE 9]>  
<?php echo '<script'; ?>
 src="http://html5shiv.googlecode.com/svn/trunk/html5.js"><?php echo '</script'; ?>
>  
<![endif]-->  
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/anytime.css" rel="stylesheet">
	<link href="css/jquery.tablesorter.css" rel="stylesheet">
	
	<?php echo '<script'; ?>
 src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" ><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>

<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery.ui.all.css" rel="stylesheet">
<link href="css/jquery.datetimepicker.css" rel="stylesheet">
<link href="css/colorbox/colorbox.css" rel="stylesheet">
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_134601853368df35572eb5a5_86118006', "head");
?>

</head>
<body >
<div class="container main">
	<h1>novape-event</h1>
	<div class="navbar navbar-default" role="navigation">
	  <div class="collapse navbar-collapse">
	  	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_180485443768df35572f52c1_17448233', "nav");
?>

	  </div>
	</div>
	<div class="container">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_86801629168df355730d359_78611699', "content");
?>

	</div>
</div>
</body>
</html>
<?php }
/* {block "head"} */
class Block_134601853368df35572eb5a5_86118006 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'head' => 
  array (
    0 => 'Block_134601853368df35572eb5a5_86118006',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php
}
}
/* {/block "head"} */
/* {block "nav"} */
class Block_180485443768df35572f52c1_17448233 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'nav' => 
  array (
    0 => 'Block_180485443768df35572f52c1_17448233',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	    <ul class="nav navbar-nav">
	      <li class="<?php if ($_smarty_tpl->tpl_vars['nav']->value == 1) {?>active<?php }?>"><a href="useradmin.php">報名列表</a></li>
	      <li class="<?php if ($_smarty_tpl->tpl_vars['nav']->value == 2) {?>active<?php }?>"><a href="quizstatistics.php">遊戲統計</a></li>
	    </ul>
	   
	    <?php
}
}
/* {/block "nav"} */
/* {block "content"} */
class Block_86801629168df355730d359_78611699 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_86801629168df355730d359_78611699',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
