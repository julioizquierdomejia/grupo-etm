<?php /* Smarty version Smarty-3.1.7, created on 2014-10-21 14:14:24
         compiled from "/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Import/ImportSchedule.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18345142454466a402fcf18-12445296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19d1530d1b00796e52f4a5ffccfff45c1836f11e' => 
    array (
      0 => '/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Import/ImportSchedule.tpl',
      1 => 1411674706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18345142454466a402fcf18-12445296',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LEFTPANELHIDE' => 0,
    'MODULE' => 0,
    'ERROR_MESSAGE' => 0,
    'FOR_MODULE' => 0,
    'IMPORT_ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_54466a40749a8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54466a40749a8')) {function content_54466a40749a8($_smarty_tpl) {?>
<div id="toggleButton" class="toggleButton" title="<?php echo vtranslate('LBL_LEFT_PANEL_SHOW_HIDE','Vtiger');?>
"><i id="tButtonImage" class="<?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value!='1'){?>icon-chevron-left<?php }else{ ?>icon-chevron-right<?php }?>"></i></div>&nbsp<div style="padding-left: 15px;"><table style=" width:90%;margin-left: 5% " cellpadding="10" class="searchUIBasic well"><tr><td class="font-x-large" align="left" colspan="2"><strong><?php echo vtranslate('LBL_IMPORT_SCHEDULED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></td></tr><?php if ($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value!=''){?><tr><td class="style1" align="left" colspan="2"><?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value;?>
</td></tr><?php }?><tr><td colspan="2" valign="top"><table cellpadding="10" cellspacing="0" align="center" class="dvtSelectedCell thickBorder importContents"><tr><td><?php echo vtranslate('LBL_SCHEDULED_IMPORT_DETAILS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td></tr></table></td></tr><tr><td align="right" colspan="2"><a type="button" name="cancel" value="<?php echo vtranslate('LBL_CANCEL_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="crmButton small delete"onclick="location.href = 'index.php?module=<?php echo $_smarty_tpl->tpl_vars['FOR_MODULE']->value;?>
&view=Import&mode=cancelImport&import_id=<?php echo $_smarty_tpl->tpl_vars['IMPORT_ID']->value;?>
'"><?php echo vtranslate('LBL_CANCEL_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('Import_Done_Buttons.tpl','Import'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</td></tr></table></div><?php }} ?>