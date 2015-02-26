<?php /* Smarty version Smarty-3.1.7, created on 2014-09-29 21:26:07
         compiled from "/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Import/Import_Basic_Buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13402654565429ce6f95a626-57065846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e22f1ac95550e3cc5fdabef7132120da4fb3bdf' => 
    array (
      0 => '/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Import/Import_Basic_Buttons.tpl',
      1 => 1411674706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13402654565429ce6f95a626-57065846',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'FOR_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5429ce6f9ee1a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5429ce6f9ee1a')) {function content_5429ce6f9ee1a($_smarty_tpl) {?>

<button type="submit" name="next"  class="btn btn-success"
		onclick="return ImportJs.uploadAndParse();"><strong><?php echo vtranslate('LBL_NEXT_BUTTON_LABEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>
&nbsp;&nbsp;
<a name="cancel" class="cursorPointer cancelLink" value="<?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" onclick="location.href='index.php?module=<?php echo $_smarty_tpl->tpl_vars['FOR_MODULE']->value;?>
&view=List'">
		<?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>

</a><?php }} ?>