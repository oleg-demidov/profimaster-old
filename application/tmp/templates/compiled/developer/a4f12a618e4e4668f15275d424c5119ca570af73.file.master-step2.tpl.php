<?php /* Smarty version Smarty-3.1.13, created on 2018-03-21 13:17:55
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/register/master/master-step2.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10421972765ab20723d4dbe1-74409946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4f12a618e4e4668f15275d424c5119ca570af73' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/register/master/master-step2.tpl',
      1 => 1521039898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10421972765ab20723d4dbe1-74409946',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'oUser' => 0,
    'aGeoCountries' => 0,
    'aGeoRegions' => 0,
    'aGeoCities' => 0,
    'oGeo' => 0,
    'contentReturn' => 0,
    'editorSet' => 0,
    'sText' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab20723d5b4d0_06250239',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab20723d5b4d0_06250239')) {function content_5ab20723d5b4d0_06250239($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?>
<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('fl-register-master', null, 0);?>
<?php echo smarty_function_component_define_params(array('params'=>array('oUser')),$_smarty_tpl);?>


<form method="POST">
    
<?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.profile.fields.place.label'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'ymaps:fields.ajaxgeo','classes'=>"js-search-form-geo",'label'=>$_tmp1,'place'=>$_smarty_tpl->tpl_vars['oUser']->value->getGeoTarget(),'oLocation'=>$_smarty_tpl->tpl_vars['oUser']->value->_getDataOne('_location_for_save'),'countries'=>$_smarty_tpl->tpl_vars['aGeoCountries']->value,'regions'=>$_smarty_tpl->tpl_vars['aGeoRegions']->value,'cities'=>$_smarty_tpl->tpl_vars['aGeoCities']->value,'choosenGeo'=>$_smarty_tpl->tpl_vars['oGeo']->value),$_smarty_tpl);?>
 
            
<?php echo $_smarty_tpl->tpl_vars['contentReturn']->value;?>


<?php echo smarty_function_component(array('_default_short'=>'editor','label'=>"Описание ваших услуг",'rows'=>5,'type'=>"visual",'set'=>(($tmp = @$_smarty_tpl->tpl_vars['editorSet']->value)===null||$tmp==='' ? 'light' : $tmp),'name'=>'about','inputClasses'=>'js-about-text','help'=>true,'value'=>$_smarty_tpl->tpl_vars['sText']->value),$_smarty_tpl);?>

                

<?php echo smarty_function_component(array('_default_short'=>'button','type'=>'submit','text'=>"Далее",'mods'=>"primary large"),$_smarty_tpl);?>

</form><?php }} ?>