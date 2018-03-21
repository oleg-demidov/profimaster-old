<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:18:59
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/category-tabs/category-tabs-links.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13752788315ab2076390f398-10887238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4c8dd8e62eb93500957913f7feacce441f8f180' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/category-tabs/category-tabs-links.tpl',
      1 => 1521222639,
      2 => 'file',
    ),
    'cc96cbac32e14f90bddafd83ce03dceecaf3255a' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/tabs/tabs.tpl',
      1 => 1516014587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13752788315ab2076390f398-10887238',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tabs' => 0,
    'component' => 0,
    'mods' => 0,
    'classes' => 0,
    'attributes' => 0,
    'activeTab' => 0,
    'classesList' => 0,
    'tab' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab20763950266_50220814',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab20763950266_50220814')) {function content_5ab20763950266_50220814($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_router')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.router.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
?>

<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-tabs', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('activeTab','tabs','mods','classes','attributes','classesList')),$_smarty_tpl);?>



    <?php echo smarty_function_component_define_params(array('params'=>array('categories','categoriesSelected','name')),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars['classes'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['classes']->value)." fl-category-tabs", null, 0);?>
    
    <?php $_smarty_tpl->tpl_vars['tabs'] = new Smarty_variable(array(), null, 0);?>
    
    <?php  $_smarty_tpl->tpl_vars['categoryLevel0'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoryLevel0']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categoryLevel0']->key => $_smarty_tpl->tpl_vars['categoryLevel0']->value){
$_smarty_tpl->tpl_vars['categoryLevel0']->_loop = true;
?>
        
        <?php $_smarty_tpl->tpl_vars['aData'] = new Smarty_variable($_smarty_tpl->tpl_vars['categoryLevel0']->value->getData(), null, 0);?>        
        <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aData']->value['icon'];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'icon','mods'=>'large','icon'=>$_tmp1),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('tab', null, 0);
$_smarty_tpl->tpl_vars['tab']->value['text'] = $_tmp2." ".((string)$_smarty_tpl->tpl_vars['categoryLevel0']->value->getTitle());?>
        
        <?php $_smarty_tpl->tpl_vars['categoriesLevel1'] = new Smarty_variable($_smarty_tpl->tpl_vars['categoryLevel0']->value->getChildren(), null, 0);?>
        
        <?php $_smarty_tpl->_capture_stack[0][] = array("content_tab", null, null); ob_start(); ?>
            <?php  $_smarty_tpl->tpl_vars['categoryLevel1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoryLevel1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoriesLevel1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categoryLevel1']->key => $_smarty_tpl->tpl_vars['categoryLevel1']->value){
$_smarty_tpl->tpl_vars['categoryLevel1']->_loop = true;
?>
                <div class="fl-category-tabs-block"><a class="parent-item" href="<?php echo smarty_function_router(array('page'=>"masters/".((string)$_smarty_tpl->tpl_vars['categoryLevel1']->value->getUrlFull())),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['categoryLevel1']->value->getTitle();?>
</a><?php $_smarty_tpl->tpl_vars['categoriesLevel2'] = new Smarty_variable($_smarty_tpl->tpl_vars['categoryLevel1']->value->getChildren(), null, 0);?><?php  $_smarty_tpl->tpl_vars['categoryLevel2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoryLevel2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoriesLevel2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categoryLevel2']->key => $_smarty_tpl->tpl_vars['categoryLevel2']->value){
$_smarty_tpl->tpl_vars['categoryLevel2']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable('', null, 0);?><?php if ($_smarty_tpl->tpl_vars['categoryLevel2']->value->getCountTarget()){?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'badge','mods'=>'warning','value'=>$_smarty_tpl->tpl_vars['categoryLevel2']->value->getCountTarget()),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['count'] = new Smarty_variable($_tmp3, null, 0);?><?php }?><a class="child-item" href="<?php echo smarty_function_router(array('page'=>"masters/".((string)$_smarty_tpl->tpl_vars['categoryLevel2']->value->getUrlFull())),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['categoryLevel2']->value->getTitle();?>
 <?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</a><?php } ?></div>
            <?php } ?>
            
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        
        <?php $_smarty_tpl->createLocalArrayVariable('tab', null, 0);
$_smarty_tpl->tpl_vars['tab']->value['content'] = Smarty::$_smarty_vars['capture']['content_tab'];?>
        
        <?php $_smarty_tpl->createLocalArrayVariable('tabs', null, 0);
$_smarty_tpl->tpl_vars['tabs']->value[] = $_smarty_tpl->tpl_vars['tab']->value;?>
    <?php } ?> 
    
    



<?php  $_smarty_tpl->tpl_vars['tab'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tab']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tabs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tab']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->key => $_smarty_tpl->tpl_vars['tab']->value){
$_smarty_tpl->tpl_vars['tab']->_loop = true;
 $_smarty_tpl->tpl_vars['tab']->index++;
?>
    <?php ob_start();?><?php echo mt_rand();?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('tabs', null, 0);
$_smarty_tpl->tpl_vars['tabs']->value[$_smarty_tpl->tpl_vars['tab']->index]['uid'] = "tab".$_tmp1;?>
<?php } ?>

<div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
" <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>
    
    <?php echo smarty_function_component(array('_default_short'=>'tabs.list','activeTab'=>$_smarty_tpl->tpl_vars['activeTab']->value,'tabs'=>$_smarty_tpl->tpl_vars['tabs']->value,'classes'=>$_smarty_tpl->tpl_vars['classesList']->value),$_smarty_tpl);?>


    
    <?php if (!$_smarty_tpl->tpl_vars['activeTab']->value&&$_smarty_tpl->tpl_vars['tabs']->value){?>
        <?php $_smarty_tpl->createLocalArrayVariable('tabs', null, 0);
$_smarty_tpl->tpl_vars['tabs']->value[0]['isActive'] = true;?>
    <?php }?>

    <div class="ls-tabs-panes" data-tab-panes>
        <?php  $_smarty_tpl->tpl_vars['tab'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tab']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tabs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tab']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tab']->key => $_smarty_tpl->tpl_vars['tab']->value){
$_smarty_tpl->tpl_vars['tab']->_loop = true;
 $_smarty_tpl->tpl_vars['tab']->index++;
?>
            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['tab']->value['is_enabled'])===null||$tmp==='' ? true : $tmp)){?>
                <div class="ls-tab-pane" <?php if ($_smarty_tpl->tpl_vars['tab']->value['isActive']||($_smarty_tpl->tpl_vars['activeTab']->value&&$_smarty_tpl->tpl_vars['tab']->value['name']==$_smarty_tpl->tpl_vars['activeTab']->value)){?>style="display: block"<?php }?> data-tab-pane id="<?php echo $_smarty_tpl->tpl_vars['tab']->value['uid'];?>
">
                    <?php if ($_smarty_tpl->tpl_vars['tab']->value['content']){?>
                        <div class="ls-tab-pane-content">
                            <?php echo $_smarty_tpl->tpl_vars['tab']->value['content'];?>

                        </div>
                    <?php }?>

                    
                    <?php if (is_array($_smarty_tpl->tpl_vars['tab']->value['list'])){?>
                        <?php echo smarty_function_component(array('_default_short'=>'item','template'=>'group','params'=>$_smarty_tpl->tpl_vars['tab']->value['list']),$_smarty_tpl);?>

                    <?php }elseif($_smarty_tpl->tpl_vars['tab']->value['list']){?>
                        <?php echo $_smarty_tpl->tpl_vars['tab']->value['list'];?>

                    <?php }?>

                    <?php echo $_smarty_tpl->tpl_vars['tab']->value['body'];?>

                </div>
            <?php }?>
        <?php } ?>
    </div>
</div><?php }} ?>