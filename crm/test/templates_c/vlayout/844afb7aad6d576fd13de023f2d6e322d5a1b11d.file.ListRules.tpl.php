<?php /* Smarty version Smarty-3.1.7, created on 2014-09-26 03:43:38
         compiled from "/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Settings/SharingAccess/ListRules.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19287604925424e0ea0bf526-36365683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '844afb7aad6d576fd13de023f2d6e322d5a1b11d' => 
    array (
      0 => '/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Settings/SharingAccess/ListRules.tpl',
      1 => 1411674137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19287604925424e0ea0bf526-36365683',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'MODULE' => 0,
    'FOR_MODULE' => 0,
    'MODULE_MODEL' => 0,
    'RULE_MODEL_LIST' => 0,
    'RULE_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5424e0ea3acc7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5424e0ea3acc7')) {function content_5424e0ea3acc7($_smarty_tpl) {?>
<div class="ruleListContainer"><div class="title row-fluid"><div class="rulehead span6"><!-- Check if the module should the for module to get the translations--><strong><?php echo vtranslate('LBL_SHARING_RULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
&nbsp;<?php echo vtranslate('LBL_FOR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['FOR_MODULE']->value=='Accounts'){?><?php echo vtranslate($_smarty_tpl->tpl_vars['FOR_MODULE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate($_smarty_tpl->tpl_vars['FOR_MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?> :</strong></div><div class="span6"><button class="btn addButton addCustomRule" type="button" data-url="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getCreateRuleUrl();?>
"><strong><?php echo vtranslate('LBL_ADD_CUSTOM_RULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></div></div><hr><div class="contents padding1per"><?php if ($_smarty_tpl->tpl_vars['RULE_MODEL_LIST']->value){?><table class="table table-bordered table-condensed customRuleTable"><thead><tr class="customRuleHeaders"><th><?php echo vtranslate('LBL_RULE_NO',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><!-- Check if the module should the for module to get the translations --><th><?php if ($_smarty_tpl->tpl_vars['FOR_MODULE']->value=='Accounts'){?><?php echo vtranslate($_smarty_tpl->tpl_vars['FOR_MODULE']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate($_smarty_tpl->tpl_vars['FOR_MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?>&nbsp;<?php echo vtranslate('LBL_OF',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_CAN_ACCESSED_BY',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th><th><?php echo vtranslate('LBL_PRIVILEGES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</th></tr></thead><tbody><?php  $_smarty_tpl->tpl_vars['RULE_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['RULE_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['RULE_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['RULE_MODEL_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["customRuleIterator"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['RULE_MODEL']->key => $_smarty_tpl->tpl_vars['RULE_MODEL']->value){
$_smarty_tpl->tpl_vars['RULE_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['RULE_ID']->value = $_smarty_tpl->tpl_vars['RULE_MODEL']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["customRuleIterator"]['index']++;
?><tr class="customRuleEntries"><td class="sequenceNumber"><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['customRuleIterator']['index']+1;?>
</td><td><a href="<?php echo $_smarty_tpl->tpl_vars['RULE_MODEL']->value->getSourceDetailViewUrl();?>
"><?php echo vtranslate(('SINGLE_').($_smarty_tpl->tpl_vars['RULE_MODEL']->value->getSourceMemberName()),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
::<?php echo $_smarty_tpl->tpl_vars['RULE_MODEL']->value->getSourceMember()->getName();?>
</a></td><td><a href="<?php echo $_smarty_tpl->tpl_vars['RULE_MODEL']->value->getTargetDetailViewUrl();?>
"><?php echo vtranslate(('SINGLE_').($_smarty_tpl->tpl_vars['RULE_MODEL']->value->getTargetMemberName()),$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
::<?php echo $_smarty_tpl->tpl_vars['RULE_MODEL']->value->getTargetMember()->getName();?>
</a></td><td><?php if ($_smarty_tpl->tpl_vars['RULE_MODEL']->value->isReadOnly()){?><?php echo vtranslate('Read Only',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate('Read Write',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }?><div class="pull-right actions"><span class="actionImages"><a href="javascript:void(0);" class="edit" data-url="<?php echo $_smarty_tpl->tpl_vars['RULE_MODEL']->value->getEditViewUrl();?>
"><i title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="icon-pencil alignMiddle"></i></a><span class="alignMiddle actionImagesAlignment"> <b>|</b></span><a href="javascript:void(0);" class="delete" data-url="<?php echo $_smarty_tpl->tpl_vars['RULE_MODEL']->value->getDeleteActionUrl();?>
"><i title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" class="icon-trash alignMiddle"></i></a></span></div></td></tr><?php } ?></tbody></table><div class="recordDetails hide"><p class="textAlignCenter"><?php echo vtranslate('LBL_CUSTOM_ACCESS_MESG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
.<!--<a href=""><?php echo vtranslate('LBL_CLICK_HERE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>&nbsp;<?php echo vtranslate('LBL_CREATE_RULE_MESG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
--></p></div><?php }else{ ?><div class="recordDetails"><p class="textAlignCenter"><?php echo vtranslate('LBL_CUSTOM_ACCESS_MESG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
.<!--<a href=""><?php echo vtranslate('LBL_CLICK_HERE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</a>&nbsp;<?php echo vtranslate('LBL_CREATE_RULE_MESG',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
--></p></div><?php }?></div></div><?php }} ?>