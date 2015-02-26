<?php /* Smarty version Smarty-3.1.7, created on 2014-09-29 21:36:18
         compiled from "/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Import/Import_Result_Details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15145528385429d0d29b9604-87719826%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17e2a1705b0beea1ae7fe7fe2693da9b52662af9' => 
    array (
      0 => '/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Import/Import_Result_Details.tpl',
      1 => 1411674706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15145528385429d0d29b9604-87719826',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'IMPORT_RESULT' => 0,
    'FOR_MODULE' => 0,
    'INVENTORY_MODULES' => 0,
    'OWNER_ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5429d0d2af865',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5429d0d2af865')) {function content_5429d0d2af865($_smarty_tpl) {?>

<table cellpadding="5" cellspacing="0" align="center" width="100%" class="dvtSelectedCell thickBorder importContents">
	<tr>
		<td><?php echo vtranslate('LBL_TOTAL_RECORDS_IMPORTED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
		<td width="10%">:</td>
		<td width="30%"><?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['IMPORTED'];?>
 / <?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['TOTAL'];?>
</td>
	</tr>
	<tr>
		<td><?php echo vtranslate('LBL_NUMBER_OF_RECORDS_CREATED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
		<td width="10%">:</td>
		<td width="30%"><?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['CREATED'];?>
</td>
	</tr>
	<?php if (in_array($_smarty_tpl->tpl_vars['FOR_MODULE']->value,$_smarty_tpl->tpl_vars['INVENTORY_MODULES']->value)==false){?>
		<tr>
			<td><?php echo vtranslate('LBL_NUMBER_OF_RECORDS_UPDATED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
			<td width="10%">:</td>
			<td width="30%"><?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['UPDATED'];?>
</td>
		</tr>
		<tr>
			<td><?php echo vtranslate('LBL_NUMBER_OF_RECORDS_SKIPPED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
			<td width="10%">:</td>
			<td width="30%"><?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['SKIPPED'];?>

			<?php if ($_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['SKIPPED']!='0'){?>
				&nbsp;&nbsp;<a class="cursorPointer" 
					onclick="return window.open('index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=List&mode=getImportDetails&type=skipped&start=1&foruser=<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
','skipped','width=700,height=650,resizable=no,scrollbars=yes,top=150,left=200');">
				<?php echo vtranslate('LBL_DETAILS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
			<?php }?>
			</td>
		</tr>
		<tr>
			<td><?php echo vtranslate('LBL_NUMBER_OF_RECORDS_MERGED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
			<td width="10%">:</td>
			<td width="10%"><?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['MERGED'];?>
</td>
		</tr>
	<?php }?>
	<tr>
		<td><?php echo vtranslate('LBL_TOTAL_RECORDS_FAILED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</td>
		<td width="10%">:</td>
		<td width="30%"><?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['FAILED'];?>
 / <?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['TOTAL'];?>

		<?php if ($_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['FAILED']!='0'){?>
			&nbsp;&nbsp;<a class="cursorPointer" onclick="return window.open('index.php?module=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
&view=List&mode=getImportDetails&type=failed&start=1&foruser=<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
','failed','width=700,height=650,resizable=no,scrollbars=yes,top=150,left=200');"><?php echo vtranslate('LBL_DETAILS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
		<?php }?>
		</td>
	</tr>
</table><?php }} ?>