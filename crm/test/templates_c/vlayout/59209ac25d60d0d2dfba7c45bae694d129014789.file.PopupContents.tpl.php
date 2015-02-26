<?php /* Smarty version Smarty-3.1.7, created on 2014-12-19 22:34:27
         compiled from "/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Inventory/PopupContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16222291755494a7f3bbdf25-05703794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59209ac25d60d0d2dfba7c45bae694d129014789' => 
    array (
      0 => '/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Inventory/PopupContents.tpl',
      1 => 1411674137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16222291755494a7f3bbdf25-05703794',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5494a7f3ca053',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5494a7f3ca053')) {function content_5494a7f3ca053($_smarty_tpl) {?>
<div id='popupContentsDiv'><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("PopupEntries.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
<?php }} ?>