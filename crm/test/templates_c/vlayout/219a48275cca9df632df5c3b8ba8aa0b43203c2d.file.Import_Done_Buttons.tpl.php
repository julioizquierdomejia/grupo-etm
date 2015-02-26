<?php /* Smarty version Smarty-3.1.7, created on 2014-10-21 14:14:24
         compiled from "/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Import/Import_Done_Buttons.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203614728154466a407569f9-71316722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '219a48275cca9df632df5c3b8ba8aa0b43203c2d' => 
    array (
      0 => '/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Import/Import_Done_Buttons.tpl',
      1 => 1411674706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203614728154466a407569f9-71316722',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FOR_MODULE' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54466a408e432',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54466a408e432')) {function content_54466a408e432($_smarty_tpl) {?>

<button class="btn btn-success" name="ok"
		onclick="location.href='index.php?module=<?php echo $_smarty_tpl->tpl_vars['FOR_MODULE']->value;?>
&view=Import'"><strong><?php echo vtranslate('LBL_OK_BUTTON_LABEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button><?php }} ?>