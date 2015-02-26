<?php /* Smarty version Smarty-3.1.7, created on 2014-11-06 03:22:48
         compiled from "/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Users/PreferenceDetailViewHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2055314576545ae98847dc85-58370318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ce58d6b078959e22b83fa4361d032815b05cadd' => 
    array (
      0 => '/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Users/PreferenceDetailViewHeader.tpl',
      1 => 1411674137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2055314576545ae98847dc85-58370318',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_MODEL' => 0,
    'RECORD' => 0,
    'IMAGE_INFO' => 0,
    'MODULE_NAME' => 0,
    'DETAILVIEW_LINKS' => 0,
    'DETAIL_VIEW_BASIC_LINK' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_545ae9885abc0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_545ae9885abc0')) {function content_545ae9885abc0($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["MODULE_NAME"] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->get('name'), null, 0);?><input id="recordId" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
" /><div class="detailViewContainer"><div class="detailViewTitle" id="prefPageHeader"><div class="row-fluid"><div class="span8"><span class="row-fluid marginLeftZero"><span class="logo span1"><?php  $_smarty_tpl->tpl_vars['IMAGE_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = false;
 $_smarty_tpl->tpl_vars['ITER'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['RECORD']->value->getImageDetails(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['IMAGE_INFO']->key => $_smarty_tpl->tpl_vars['IMAGE_INFO']->value){
$_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = true;
 $_smarty_tpl->tpl_vars['ITER']->value = $_smarty_tpl->tpl_vars['IMAGE_INFO']->key;
?><?php if (!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'])&&!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'])){?><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'];?>
_<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" data-image-id="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['id'];?>
"><?php }?><?php } ?></span><span class="span9"><span id="myPrefHeading" class="row-fluid"><h3><?php echo vtranslate('LBL_MY_PREFERENCES',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 </h3></span><span class="row-fluid"><?php echo vtranslate('LBL_USERDETAIL_INFO',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
&nbsp;&nbsp;"<b><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
</b>"</span></span></span></div><div class="span4"><div class="row-fluid pull-right detailViewButtoncontainer"><div class="btn-toolbar pull-right"><?php  $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DETAILVIEW_LINKS']->value['DETAILVIEWPREFERENCE']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->key => $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value){
$_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->_loop = true;
?><div class="btn-group"><button class="btn"<?php if ($_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->isPageLoadLink()){?>onclick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getUrl();?>
'"<?php }else{ ?>onclick=<?php echo $_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getUrl();?>
<?php }?>><strong><?php echo vtranslate($_smarty_tpl->tpl_vars['DETAIL_VIEW_BASIC_LINK']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</strong></button></div><?php } ?></div></div></div></div></div><div class="detailViewInfo userPreferences row-fluid"><div class="details span12"><form id="detailView" data-name-fields='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getNameFields());?>
' method="POST"><div class="contents"><?php }} ?>