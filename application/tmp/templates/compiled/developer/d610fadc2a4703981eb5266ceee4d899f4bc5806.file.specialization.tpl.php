<?php /* Smarty version Smarty-3.1.13, created on 2018-01-04 20:45:05
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/specialization-tabs/specialization.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14233422775a4e3df1ae7799-57019330%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd610fadc2a4703981eb5266ceee4d899f4bc5806' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/specialization-tabs/specialization.tpl',
      1 => 1509417892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14233422775a4e3df1ae7799-57019330',
  'function' => 
  array (
    'get_checkbox' => 
    array (
      'parameter' => 
      array (
        'spec' => 0,
        'check' => 0,
        'title' => 0,
      ),
      'compiled' => '',
    ),
    'get_items_childs' => 
    array (
      'parameter' => 
      array (
        'category' => 
        array (
        ),
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'specializationSelected' => 0,
    'spec' => 0,
    'component' => 0,
    'title' => 0,
    'check' => 0,
    'category' => 0,
    'childrens' => 0,
    'children' => 0,
    'childs' => 0,
    'child' => 0,
    'chs' => 0,
    'ch' => 0,
    'specializations' => 0,
    'specialization' => 0,
    'aIcons' => 0,
    'aTabs' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5a4e3df1b1a4e6_74996149',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a4e3df1b1a4e6_74996149')) {function content_5a4e3df1b1a4e6_74996149($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>


<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable("specializations", null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('specializations','specializationSelected','params','mods','classes','attributes')),$_smarty_tpl);?>


<?php if (!is_array($_smarty_tpl->tpl_vars['specializationSelected']->value)){?>
    <?php $_smarty_tpl->tpl_vars['specializationSelected'] = new Smarty_variable(array(), null, 0);?>
<?php }?>
<?php $_smarty_tpl->tpl_vars['aTabs'] = new Smarty_variable(array(), null, 0);?>
<?php if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php if (!function_exists('smarty_template_function_get_checkbox')) {
    function smarty_template_function_get_checkbox($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['get_checkbox']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php if ($_smarty_tpl->tpl_vars['spec']->value){?>
        <?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['title']->value){?><?php echo "title";?><?php }?><?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['check']->value){?><?php echo "checked";?><?php }?><?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['spec']->value->getCountTarget()&&!$_smarty_tpl->tpl_vars['title']->value){?><?php echo smarty_function_component(array('_default_short'=>'badge','mods'=>'warning','value'=>$_smarty_tpl->tpl_vars['spec']->value->getCountTarget()),$_smarty_tpl);?>
<?php }?><?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field.checkbox','classes'=>((string)$_smarty_tpl->tpl_vars['component']->value)."-checkbox child ".$_tmp1." ".$_tmp2,'value'=>$_smarty_tpl->tpl_vars['spec']->value->getId(),'label'=>((string)$_smarty_tpl->tpl_vars['spec']->value->getTitle())." ".$_tmp3,'checked'=>$_smarty_tpl->tpl_vars['check']->value),$_smarty_tpl);?>

    <?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

<?php if (!function_exists('smarty_template_function_get_items_childs')) {
    function smarty_template_function_get_items_childs($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['get_items_childs']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <?php $_smarty_tpl->tpl_vars['childrens'] = new Smarty_variable($_smarty_tpl->tpl_vars['category']->value->getChildren(), null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['children'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['children']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['childrens']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['children']->key => $_smarty_tpl->tpl_vars['children']->value){
$_smarty_tpl->tpl_vars['children']->_loop = true;
?>
        <div class="select_tree">
            <?php $_smarty_tpl->tpl_vars['check'] = new Smarty_variable(in_array($_smarty_tpl->tpl_vars['children']->value->getId(),$_smarty_tpl->tpl_vars['specializationSelected']->value), null, 0);?>
            <?php smarty_template_function_get_checkbox($_smarty_tpl,array('spec'=>$_smarty_tpl->tpl_vars['children']->value,'check'=>$_smarty_tpl->tpl_vars['check']->value,'title'=>1));?>

            <div class="select_subtree">
            <?php $_smarty_tpl->tpl_vars['childs'] = new Smarty_variable($_smarty_tpl->tpl_vars['children']->value->getChildren(), null, 0);?>
            <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['childs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
                <?php $_smarty_tpl->tpl_vars['check'] = new Smarty_variable(in_array($_smarty_tpl->tpl_vars['child']->value->getId(),$_smarty_tpl->tpl_vars['specializationSelected']->value), null, 0);?>
                <?php smarty_template_function_get_checkbox($_smarty_tpl,array('spec'=>$_smarty_tpl->tpl_vars['child']->value,'check'=>$_smarty_tpl->tpl_vars['check']->value));?>
<div class="select_subtree">
                <?php $_smarty_tpl->tpl_vars['chs'] = new Smarty_variable($_smarty_tpl->tpl_vars['child']->value->getChildren(), null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['ch'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ch']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['chs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ch']->key => $_smarty_tpl->tpl_vars['ch']->value){
$_smarty_tpl->tpl_vars['ch']->_loop = true;
?>
                    <?php $_smarty_tpl->tpl_vars['check'] = new Smarty_variable(in_array($_smarty_tpl->tpl_vars['ch']->value->getId(),$_smarty_tpl->tpl_vars['specializationSelected']->value), null, 0);?>
                    <?php smarty_template_function_get_checkbox($_smarty_tpl,array('spec'=>$_smarty_tpl->tpl_vars['ch']->value,'check'=>$_smarty_tpl->tpl_vars['check']->value));?>

                <?php } ?>
                </div>
            <?php } ?>
            </div>
        </div>
    <?php } ?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php $_smarty_tpl->tpl_vars['aIcons'] = new Smarty_variable(array(2=>'building-o',60=>'eye',105=>'camera-retro',112=>'microchip',135=>'car'), null, 0);?>

<?php  $_smarty_tpl->tpl_vars['specialization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['specialization']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['specializations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['specialization']->key => $_smarty_tpl->tpl_vars['specialization']->value){
$_smarty_tpl->tpl_vars['specialization']->_loop = true;
?>
    <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['aIcons']->value[$_smarty_tpl->tpl_vars['specialization']->value->getId()];?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>$_tmp4),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php smarty_template_function_get_items_childs($_smarty_tpl,array('category'=>$_smarty_tpl->tpl_vars['specialization']->value));?>
<?php $_tmp6=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('aTabs', null, 0);
$_smarty_tpl->tpl_vars['aTabs']->value[] = array('text'=>$_tmp5." ".((string)$_smarty_tpl->tpl_vars['specialization']->value->getTitle()),'content'=>$_tmp6);?>
<?php } ?>
<?php echo smarty_function_component(array('_default_short'=>'tabs','classes'=>'js-specializations-tabs','tabs'=>$_smarty_tpl->tpl_vars['aTabs']->value),$_smarty_tpl);?>
<?php }} ?>