<?php /* Smarty version Smarty-3.1.7, created on 2014-10-21 13:57:52
         compiled from "/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Settings/Picklist/AssignValueToRole.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76838574654466660760ce5-69109854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00eb3b96e34c1641efb4aa69bfd7410e80a97a3f' => 
    array (
      0 => '/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Settings/Picklist/AssignValueToRole.tpl',
      1 => 1411674137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76838574654466660760ce5-69109854',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'MODULE' => 0,
    'SELECTED_MODULE_NAME' => 0,
    'SELECTED_PICKLIST_FIELDMODEL' => 0,
    'SELECTED_PICKLISTFIELD_ALL_VALUES' => 0,
    'PICKLIST_KEY' => 0,
    'PICKLIST_VALUE' => 0,
    'ROLES_LIST' => 0,
    'ROLE' => 0,
    'qualifiedName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5446666096c09',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5446666096c09')) {function content_5446666096c09($_smarty_tpl) {?>
<div class='modelContainer modal basicAssignValueToRoleView'><div class="modal-header"><button data-dismiss="modal" class="close" title="<?php echo vtranslate('LBL_CLOSE');?>
">x</button><h3><?php echo vtranslate('LBL_ASSIGN_VALUES_TO_ROLES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div><form id="assignValueToRoleForm" class="form-horizontal" method="post" action="index.php"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="parent" value="Settings" /><input type="hidden" name="source_module" value="<?php echo $_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value;?>
" /><input type="hidden" name="action" value="SaveAjax" /><input type="hidden" name="mode" value="assignValueToRole" /><input type="hidden" name="picklistName" value="<?php echo $_smarty_tpl->tpl_vars['SELECTED_PICKLIST_FIELDMODEL']->value->get('name');?>
" /><input type="hidden" name="pickListValues" value='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['SELECTED_PICKLISTFIELD_ALL_VALUES']->value);?>
' /><div class="modal-body tabbable"><div class="control-group"><div class="control-label"><span class="redColor">*</span><?php echo vtranslate('LBL_ITEM_VALUE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="controls"><select multiple class="select2" id="assignValues" style="min-width: 220px" name="assign_values[]"><?php  $_smarty_tpl->tpl_vars['PICKLIST_VALUE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->_loop = false;
 $_smarty_tpl->tpl_vars['PICKLIST_KEY'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['SELECTED_PICKLISTFIELD_ALL_VALUES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->key => $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value){
$_smarty_tpl->tpl_vars['PICKLIST_VALUE']->_loop = true;
 $_smarty_tpl->tpl_vars['PICKLIST_KEY']->value = $_smarty_tpl->tpl_vars['PICKLIST_VALUE']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['PICKLIST_KEY']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['PICKLIST_VALUE']->value,$_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value);?>
</option><?php } ?></select></div></div><?php if ($_smarty_tpl->tpl_vars['SELECTED_PICKLIST_FIELDMODEL']->value->isRoleBased()){?><div class="control-group"><div class="control-label"><span class="redColor">*</span><?php echo vtranslate('LBL_ASSIGN_TO_ROLE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</div><div class="controls"><select class="rolesList select2" id="rolesSelected" name="rolesSelected[]" multiple style="min-width: 220px" data-placeholder="<?php echo vtranslate('LBL_CHOOSE_ROLES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
"><option value="all"><?php echo vtranslate('LBL_ALL_ROLES',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['ROLE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ROLE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ROLES_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ROLE']->key => $_smarty_tpl->tpl_vars['ROLE']->value){
$_smarty_tpl->tpl_vars['ROLE']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['ROLE']->value->get('roleid');?>
"><?php echo $_smarty_tpl->tpl_vars['ROLE']->value->get('rolename');?>
</option><?php } ?></select></div></div><?php }?></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['qualifiedName']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form></div>
<?php }} ?>