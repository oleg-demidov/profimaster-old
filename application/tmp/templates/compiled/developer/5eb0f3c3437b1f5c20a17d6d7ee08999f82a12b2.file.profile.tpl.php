<?php /* Smarty version Smarty-3.1.13, created on 2018-03-20 18:37:06
         compiled from "/var/www/profimaster/application/frontend/skin/developer/components/user/settings/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9963232645ab10072007c11-06011591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5eb0f3c3437b1f5c20a17d6d7ee08999f82a12b2' => 
    array (
      0 => '/var/www/profimaster/application/frontend/skin/developer/components/user/settings/profile.tpl',
      1 => 1521035388,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9963232645ab10072007c11-06011591',
  'function' => 
  array (
    'userfield' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'field' => 0,
    'aUserFieldsContact' => 0,
    'fieldAll' => 0,
    'user' => 0,
    'sex' => 0,
    'aGeoCountries' => 0,
    'aGeoRegions' => 0,
    'aGeoCities' => 0,
    'oGeoTarget' => 0,
    'userfields' => 0,
    'contacts' => 0,
    'contact' => 0,
    'aLang' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5ab1007204b1c4_27018993',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab1007204b1c4_27018993')) {function content_5ab1007204b1c4_27018993($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_hook')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.hook.php';
if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
if (!is_callable('smarty_function_date_format')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.date_format.php';
?>

<?php echo smarty_function_component_define_params(array('params'=>array('user')),$_smarty_tpl);?>



<?php echo smarty_function_hook(array('run'=>'user_settings_profile_begin'),$_smarty_tpl);?>



<?php if (!is_callable('smarty_function_lang')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.lang.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
?><?php if (!function_exists('smarty_template_function_userfield')) {
    function smarty_template_function_userfield($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['userfield']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <div class="ls-mb-15 js-user-field-item" <?php if (!$_smarty_tpl->tpl_vars['field']->value){?>id="user-field-template" style="display:none;"<?php }?>>
        <select name="profile_user_field_type[]">
            <?php  $_smarty_tpl->tpl_vars['fieldAll'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fieldAll']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['aUserFieldsContact']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fieldAll']->key => $_smarty_tpl->tpl_vars['fieldAll']->value){
$_smarty_tpl->tpl_vars['fieldAll']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['fieldAll']->value->getId();?>
" <?php if ($_smarty_tpl->tpl_vars['field']->value&&$_smarty_tpl->tpl_vars['fieldAll']->value->getId()==$_smarty_tpl->tpl_vars['field']->value->getId()){?>selected<?php }?>>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fieldAll']->value->getTitle(), ENT_QUOTES, 'UTF-8', true);?>

                </option>
            <?php } ?>
        </select>

        <input type="text" name="profile_user_field_value[]" value="<?php if ($_smarty_tpl->tpl_vars['field']->value){?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->getValue(), ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" class="ls-width-200">
        <?php ob_start();?><?php echo smarty_function_lang(array('_default_short'=>'common.remove'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'icon','icon'=>'remove','classes'=>'js-user-field-item-remove','attributes'=>array('title'=>$_tmp1)),$_smarty_tpl);?>

    </div>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>




<?php smarty_template_function_userfield($_smarty_tpl,array('field'=>false));?>



<form method="post" enctype="multipart/form-data" class="js-form-validate">
    <?php echo smarty_function_hook(array('run'=>'form_settings_profile_begin'),$_smarty_tpl);?>


    
    <fieldset>
        <legend><?php echo smarty_function_lang(array('name'=>'user.settings.profile.generic'),$_smarty_tpl);?>
</legend>

        
        <?php ob_start();?><?php echo Config::Get('module.user.name_max');?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.profile.fields.name.label'),$_smarty_tpl);?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>'profile_name','rules'=>array('length'=>"[2,".$_tmp2."]"),'value'=>$_smarty_tpl->tpl_vars['user']->value->getProfileName(),'label'=>$_tmp3),$_smarty_tpl);?>



        
        <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.gender.male'),$_smarty_tpl);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.gender.female'),$_smarty_tpl);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.gender.none'),$_smarty_tpl);?>
<?php $_tmp6=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['sex'] = new Smarty_variable(array(array('value'=>'man','text'=>$_tmp4),array('value'=>'woman','text'=>$_tmp5),array('value'=>'other','text'=>$_tmp6)), null, 0);?>

        <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.profile.fields.sex.label'),$_smarty_tpl);?>
<?php $_tmp7=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'select','name'=>'profile_sex','label'=>$_tmp7,'items'=>$_smarty_tpl->tpl_vars['sex']->value,'selectedValue'=>$_smarty_tpl->tpl_vars['user']->value->getProfileSex()),$_smarty_tpl);?>



        
        <?php ob_start();?><?php echo smarty_function_date_format(array('date'=>$_smarty_tpl->tpl_vars['user']->value->getProfileBirthday(),'format'=>'d.m.Y','notz'=>true),$_smarty_tpl);?>
<?php $_tmp8=ob_get_clean();?><?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.profile.fields.birthday.label'),$_smarty_tpl);?>
<?php $_tmp9=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'date','name'=>'profile_birthday','inputClasses'=>'js-field-date-default','value'=>$_smarty_tpl->tpl_vars['user']->value->getProfileBirthday() ? $_tmp8 : '','label'=>$_tmp9),$_smarty_tpl);?>



        
        <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.profile.fields.place.label'),$_smarty_tpl);?>
<?php $_tmp10=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'field','template'=>'geo','classes'=>'js-field-geo-default','name'=>'geo','label'=>$_tmp10,'countries'=>$_smarty_tpl->tpl_vars['aGeoCountries']->value,'regions'=>$_smarty_tpl->tpl_vars['aGeoRegions']->value,'cities'=>$_smarty_tpl->tpl_vars['aGeoCities']->value,'place'=>$_smarty_tpl->tpl_vars['oGeoTarget']->value),$_smarty_tpl);?>

        


        
        
            
        <?php ob_start();?><?php echo smarty_function_lang(array('name'=>'user.settings.profile.fields.about.label'),$_smarty_tpl);?>
<?php $_tmp11=ob_get_clean();?><?php echo smarty_function_component(array('_default_short'=>'editor','attributes'=>array('id'=>'profile_about'),'label'=>$_tmp11,'set'=>'default','type'=>"visual",'name'=>'profile_about','inputClasses'=>'js-profile-about','help'=>false,'value'=>$_smarty_tpl->tpl_vars['user']->value->getProfileAbout()),$_smarty_tpl);?>



        
        <?php $_smarty_tpl->tpl_vars['userfields'] = new Smarty_variable($_smarty_tpl->tpl_vars['user']->value->getUserFieldValues(false,''), null, 0);?>

        <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['userfields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
            <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'text','name'=>"profile_user_field_".((string)$_smarty_tpl->tpl_vars['field']->value->getId()),'value'=>$_smarty_tpl->tpl_vars['field']->value->getValue(),'label'=>htmlspecialchars($_smarty_tpl->tpl_vars['field']->value->getTitle(), ENT_QUOTES, 'UTF-8', true)),$_smarty_tpl);?>

        <?php } ?>
    </fieldset>


    
    <fieldset class="js-user-fields">
        <legend><?php echo smarty_function_lang(array('name'=>'user.settings.profile.contact'),$_smarty_tpl);?>
</legend>

        <?php $_smarty_tpl->tpl_vars['contacts'] = new Smarty_variable($_smarty_tpl->tpl_vars['user']->value->getUserFieldValues(true,array('contact','social')), null, 0);?>

        
        <div class="js-user-field-list ls-mb-15">
            <?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value){
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
                <?php smarty_template_function_userfield($_smarty_tpl,array('field'=>$_smarty_tpl->tpl_vars['contact']->value));?>

            <?php }
if (!$_smarty_tpl->tpl_vars['contact']->_loop) {
?>
                <?php echo smarty_function_component(array('_default_short'=>'blankslate','classes'=>'js-user-fields-empty','text'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['empty']),$_smarty_tpl);?>

            <?php } ?>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['aUserFieldsContact']->value){?>
            <?php echo smarty_function_component(array('_default_short'=>'button','type'=>'button','classes'=>'js-user-fields-submit','text'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['add']),$_smarty_tpl);?>

        <?php }?>
    </fieldset>

    
    <?php echo smarty_function_hook(array('run'=>'user_settings_profile_end'),$_smarty_tpl);?>


    
    <?php echo smarty_function_component(array('_default_short'=>'field','template'=>'hidden.security-key'),$_smarty_tpl);?>


    
    <?php echo smarty_function_component(array('_default_short'=>'button','mods'=>'primary','text'=>$_smarty_tpl->tpl_vars['aLang']->value['common']['save']),$_smarty_tpl);?>

</form>

<?php echo smarty_function_hook(array('run'=>'settings_profile_end'),$_smarty_tpl);?>
<?php }} ?>