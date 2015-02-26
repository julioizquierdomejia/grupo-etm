<?php /* Smarty version Smarty-3.1.7, created on 2014-12-03 19:15:57
         compiled from "/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Portal/ListViewHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1068353659547f616dadac53-25408260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65f3100a427509bcebbc9162850bc6db379ae0b9' => 
    array (
      0 => '/home/grupo/public_html/crm/includes/runtime/../../layouts/vlayout/modules/Portal/ListViewHeader.tpl',
      1 => 1411674137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1068353659547f616dadac53-25408260',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'RECORD_COUNT' => 0,
    'PAGING_INFO' => 0,
    'CURRENT_PAGE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_547f616ddf5dd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547f616ddf5dd')) {function content_547f616ddf5dd($_smarty_tpl) {?>
<div class="listViewPageDiv" id="portalListViewPage"><div class="listViewTopMenuDiv noprint"><div class="listViewActionsDiv row-fluid"><span class="btn-toolbar span4"><span class="btn-group listViewMassActions"><button class="btn dropdown-toggle" data-toggle="dropdown"><strong><?php echo vtranslate('LBL_ACTIONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong>&nbsp;&nbsp;<i class="caret"></i></button><ul class="dropdown-menu"><li id="massDelete"><a href="javascript:void(0);" onclick="Portal_List_Js.massDeleteRecords();"><?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li></ul></span><span class="btn-group"><button class="btn addButton addBookmark"><i class="icon-plus"></i>&nbsp;<strong><?php echo vtranslate('LBL_ADD_BOOKMARK',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></span></span><span class="span4">&nbsp;</span><span class="span4 btn-toolbar row-fluid"><div class="listViewActions pull-right"><div class="pageNumbers alignTop"><span><span class="pageNumbersText" style="padding-right:5px"><?php if ($_smarty_tpl->tpl_vars['RECORD_COUNT']->value!=0){?><?php echo $_smarty_tpl->tpl_vars['PAGING_INFO']->value['startSequence'];?>
 <?php echo vtranslate('LBL_to',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo $_smarty_tpl->tpl_vars['PAGING_INFO']->value['endSequence'];?>
<?php }else{ ?><span>&nbsp;</span><?php }?></span><span class="icon-refresh pull-right totalNumberOfRecords cursorPointer <?php if ($_smarty_tpl->tpl_vars['RECORD_COUNT']->value==0){?>hide<?php }?>"></span></span></div><div class="btn-group alignTop margin0px"><span class="pull-right"><span class="btn-group"><button class="btn" id="previousPageButton" type="button" <?php if ($_smarty_tpl->tpl_vars['CURRENT_PAGE']->value==1){?>disabled<?php }?>><span class="icon-chevron-left"></span></button><button class="btn dropdown-toggle" type="button" id="listViewPageJump" data-toggle="dropdown"><i class="vtGlyph vticon-pageJump" title="<?php echo vtranslate('LBL_LISTVIEW_PAGE_JUMP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
"></i></button><ul class="listViewBasicAction dropdown-menu" id="listViewPageJumpDropDown"><li><span class="row-fluid"><span class="span3 pushUpandDown2per"><span class="pull-right"><?php echo vtranslate('LBL_PAGE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></span><span class="span4"><input type="text" id="pageToJump" class="listViewPagingInput" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_PAGE']->value;?>
"/></span><span class="span2 textAlignCenter pushUpandDown2per"><?php echo vtranslate('LBL_OF',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;</span><span class="span2 pushUpandDown2per" id="totalPageCount"><?php echo $_smarty_tpl->tpl_vars['PAGING_INFO']->value['pageCount'];?>
</span></span></li></ul><button class="btn" id="nextPageButton" type="button" <?php if (!$_smarty_tpl->tpl_vars['PAGING_INFO']->value['nextPageExists']){?>disabled<?php }?>><span class="icon-chevron-right"></span></button></span></span></div></div></span></div></div><div class="listViewContentDiv" id="listViewContents"><?php }} ?>