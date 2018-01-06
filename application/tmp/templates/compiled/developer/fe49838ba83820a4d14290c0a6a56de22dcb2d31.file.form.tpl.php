<?php /* Smarty version Smarty-3.1.13, created on 2017-12-26 16:08:55
         compiled from "/var/www/profimaster/application/plugins/fix_category/frontend/skin/default/components/p-category/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14345915405a421fb7b61d79-56515660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe49838ba83820a4d14290c0a6a56de22dcb2d31' => 
    array (
      0 => '/var/www/profimaster/application/plugins/fix_category/frontend/skin/default/components/p-category/form.tpl',
      1 => 1501344750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14345915405a421fb7b61d79-56515660',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categories' => 0,
    'category' => 0,
    'items' => 0,
    'oCategory' => 0,
    'oCategoryType' => 0,
    '_aRequest' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a421fb7b7c301_83228640',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a421fb7b7c301_83228640')) {function content_5a421fb7b7c301_83228640($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
?>
 
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('p-cron-form', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('categories')),$_smarty_tpl);?>


<form method="post">
    <?php echo smarty_function_component(array('_default_short'=>'admin:field','template'=>'hidden.security-key'),$_smarty_tpl);?>


    <?php $_smarty_tpl->tpl_vars['items'] = new Smarty_variable(array(array('value'=>'','text'=>'')), null, 0);?>

    <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value){
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
        <?php $_smarty_tpl->createLocalArrayVariable('items', null, 0);
$_smarty_tpl->tpl_vars['items']->value[] = array('text'=>(str_pad('',(2*$_smarty_tpl->tpl_vars['category']->value['level']),'-')).($_smarty_tpl->tpl_vars['category']->value['entity']->getTitle()),'value'=>$_smarty_tpl->tpl_vars['category']->value['entity']->getId());?>
    <?php } ?>

    <?php echo smarty_function_component(array('_default_short'=>'admin:field','template'=>'select','name'=>'category[pid]','label'=>'Вложить в','items'=>$_smarty_tpl->tpl_vars['items']->value),$_smarty_tpl);?>


    
    <?php echo smarty_function_component(array('_default_short'=>'admin:field','template'=>'text','name'=>'category[title]','label'=>'Название'),$_smarty_tpl);?>


    
    <?php echo smarty_function_component(array('_default_short'=>'admin:field','template'=>'textarea','name'=>'category[description]','label'=>'Описание','escape'=>false),$_smarty_tpl);?>

    
    
    <?php echo smarty_function_component(array('_default_short'=>'admin:field','template'=>'text','name'=>'category[url]','label'=>'Url'),$_smarty_tpl);?>


    
    <?php echo smarty_function_component(array('_default_short'=>'admin:field','template'=>'text','name'=>'category[order]','label'=>'Сортировка'),$_smarty_tpl);?>


    <?php echo smarty_function_hook(array('run'=>"fix_category_form_end",'oCategory'=>$_smarty_tpl->tpl_vars['oCategory']->value,'oCategoryType'=>$_smarty_tpl->tpl_vars['oCategoryType']->value),$_smarty_tpl);?>


    
    <?php echo smarty_function_component(array('_default_short'=>'admin:button','name'=>'category_submit','text'=>((string)($_smarty_tpl->tpl_vars['_aRequest']->value ? $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['save'] : $_smarty_tpl->tpl_vars['aLang']->value['plugin']['admin']['add'])),'value'=>1,'mods'=>'primary'),$_smarty_tpl);?>

</form><?php }} ?>