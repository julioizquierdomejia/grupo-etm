<?php /* Smarty version Smarty-3.1.7, created on 2014-09-26 04:23:33
         compiled from "/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/PhoneDetailView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8099435925424ea458a80f0-37438382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1764d61326a7a3ab70f76aaff2b825c8988e1be3' => 
    array (
      0 => '/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/PhoneDetailView.tpl',
      1 => 1411674137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8099435925424ea458a80f0-37438382',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'MODULEMODEL' => 0,
    'PERMISSION' => 0,
    'FIELD_MODEL' => 0,
    'PHONE_FIELD_VALUE' => 0,
    'PHONE_NUMBER' => 0,
    'RECORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5424ea4595a45',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5424ea4595a45')) {function content_5424ea4595a45($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/home/grupo/public_html/crm/libraries/Smarty/libs/plugins/modifier.regex_replace.php';
?>


<?php $_smarty_tpl->tpl_vars['MODULE'] = new Smarty_variable('PBXManager', null, 0);?>
<?php $_smarty_tpl->tpl_vars['MODULEMODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance($_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['MODULEMODEL']->value){?>
    <?php $_smarty_tpl->tpl_vars['PERMISSION'] = new Smarty_variable(PBXManager_Server_Model::checkPermissionForOutgoingCall(), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['PERMISSION']->value){?>
        <?php $_smarty_tpl->tpl_vars['PHONE_FIELD_VALUE'] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['PHONE_NUMBER'] = new Smarty_variable(smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['PHONE_FIELD_VALUE']->value,"/[-()\s]/",''), null, 0);?>
        <a class="phoneField" data-value="<?php echo $_smarty_tpl->tpl_vars['PHONE_NUMBER']->value;?>
" record="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
" onclick="Vtiger_PBXManager_Js.registerPBXOutboundCall('<?php echo $_smarty_tpl->tpl_vars['PHONE_NUMBER']->value;?>
',<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
)"><?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue');?>
</a>
    <?php }else{ ?>
        <?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getDisplayValue($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'),$_smarty_tpl->tpl_vars['RECORD']->value->getId(),$_smarty_tpl->tpl_vars['RECORD']->value);?>

    <?php }?>
<?php }else{ ?>
    <?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getDisplayValue($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'),$_smarty_tpl->tpl_vars['RECORD']->value->getId(),$_smarty_tpl->tpl_vars['RECORD']->value);?>

<?php }?>
<?php }} ?>