<?php /* Smarty version Smarty-3.1.7, created on 2014-09-29 21:33:40
         compiled from "/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Import/Import_Advanced_Buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17457006685429d034c6a387-36805992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b2c1c8c9113bcba0c515ebc10d02131c7b5235f' => 
    array (
      0 => '/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Import/Import_Advanced_Buttons.tpl',
      1 => 1411674706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17457006685429d034c6a387-36805992',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5429d034cc337',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5429d034cc337')) {function content_5429d034cc337($_smarty_tpl) {?>

<button type="submit" name="import" id="importButton" class="crmButton big edit btn btn-success"
		><strong><?php echo vtranslate('LBL_IMPORT_BUTTON_LABEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button>
&nbsp;&nbsp;
<a type="button" name="cancel" value="<?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="cursorPointer cancelLink" onclick="window.history.back()">
	<?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>

</a><?php }} ?>