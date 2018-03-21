<?php /* Smarty version Smarty-3.1.13, created on 2018-03-14 20:11:04
         compiled from "/var/www/profimaster/application/plugins/ymaps/frontend/skin/default/components/field/field.location.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12892182815aa92d78e42897-45684482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22058ea4917792a57b93846a7a0d1a3ee5a5efca' => 
    array (
      0 => '/var/www/profimaster/application/plugins/ymaps/frontend/skin/default/components/field/field.location.tpl',
      1 => 1521024236,
      2 => 'file',
    ),
    'c37e4b176a3da48e84a541bf22e5a1db4bf1a4fc' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/field/field.tpl',
      1 => 1506863400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12892182815aa92d78e42897-45684482',
  'function' => 
  array (
    'params_to_query' => 
    array (
      'parameter' => 
      array (
        'params' => 
        array (
        ),
      ),
      'compiled' => '',
    ),
    'field_input_attr_common' => 
    array (
      'parameter' => 
      array (
        'useValue' => true,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'id' => 0,
    'component' => 0,
    'rules' => 0,
    'escape' => 0,
    'form' => 0,
    '_aRequest' => 0,
    'isDisabled' => 0,
    'entity' => 0,
    'entityField' => 0,
    'name' => 0,
    'entityScenario' => 0,
    'value' => 0,
    'getValueFromForm' => 0,
    'uid' => 0,
    'inputClasses' => 0,
    'useValue' => 0,
    'placeholder' => 0,
    'LIVESTREET_SECURITY_KEY' => 0,
    'json' => 0,
    'inputAttributes' => 0,
    'inputData' => 0,
    'mods' => 0,
    'classes' => 0,
    'data' => 0,
    'attributes' => 0,
    'label' => 0,
    'note' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5aa92d78eb75d1_17878897',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5aa92d78eb75d1_17878897')) {function content_5aa92d78eb75d1_17878897($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_field_make_rule')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.field_make_rule.php';
if (!is_callable('smarty_function_field_get_value')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.field_get_value.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cdata')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cdata.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
?>


<?php $_smarty_tpl->tpl_vars['component'] = new Smarty_variable('ls-field', null, 0);?>

<?php echo smarty_function_component_define_params(array('params'=>array('form','placeholder','isDisabled','entity','entityScenario','entityField','escape','data','label','name','rules','value','id','inputClasses','inputAttributes','inputData','mods','classes','attributes','note')),$_smarty_tpl);?>



<?php $_smarty_tpl->tpl_vars['uid'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['id']->value)===null||$tmp==='' ? (($_smarty_tpl->tpl_vars['component']->value).(mt_rand())) : $tmp), null, 0);?>


<?php $_smarty_tpl->tpl_vars['rules'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['rules']->value)===null||$tmp==='' ? array() : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars['escape'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['escape']->value)===null||$tmp==='' ? true : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars['form'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['form']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['_aRequest']->value : $tmp), null, 0);?>
<?php $_smarty_tpl->tpl_vars['getValueFromForm'] = new Smarty_variable(true, null, 0);?>

<?php if ($_smarty_tpl->tpl_vars['isDisabled']->value){?>
    <?php $_smarty_tpl->tpl_vars['mods'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['mods']->value)." disabled", null, 0);?>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['entity']->value){?>
    <?php echo smarty_function_field_make_rule(array('entity'=>$_smarty_tpl->tpl_vars['entity']->value,'field'=>(($tmp = @$_smarty_tpl->tpl_vars['entityField']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['name']->value : $tmp),'scenario'=>$_smarty_tpl->tpl_vars['entityScenario']->value,'assign'=>'rules'),$_smarty_tpl);?>

<?php }?>


    
    <?php if (!isset($_smarty_tpl->tpl_vars['value']->value)&&$_smarty_tpl->tpl_vars['getValueFromForm']->value&&$_smarty_tpl->tpl_vars['name']->value&&$_smarty_tpl->tpl_vars['form']->value){?>
        <?php ob_start();?><?php echo smarty_function_field_get_value(array('form'=>$_smarty_tpl->tpl_vars['form']->value,'name'=>$_smarty_tpl->tpl_vars['name']->value),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['value'] = new Smarty_variable((($tmp = @$_tmp1)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['value']->value : $tmp), null, 0);?>
    <?php }?>

    
    <?php $_smarty_tpl->tpl_vars['value'] = new Smarty_variable($_smarty_tpl->tpl_vars['escape']->value ? htmlspecialchars($_smarty_tpl->tpl_vars['value']->value) : $_smarty_tpl->tpl_vars['value']->value, null, 0);?>

    <?php echo smarty_function_component_define_params(array('params'=>array('oLocation')),$_smarty_tpl);?>


    <?php if (!function_exists('smarty_template_function_params_to_query')) {
    function smarty_template_function_params_to_query($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['params_to_query']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?><?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['params']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['val']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['val']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value){
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
 $_smarty_tpl->tpl_vars['val']->iteration++;
 $_smarty_tpl->tpl_vars['val']->last = $_smarty_tpl->tpl_vars['val']->iteration === $_smarty_tpl->tpl_vars['val']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["params2q"]['last'] = $_smarty_tpl->tpl_vars['val']->last;
?><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
=<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['params2q']['last']){?>&<?php }?><?php } ?>
    <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


    <?php $_smarty_tpl->tpl_vars['classes'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['classes']->value)." js-ymaps-field-location", null, 0);?> 
    
    <?php $_smarty_tpl->tpl_vars['fieldName'] = new Smarty_variable(Config::Get('plugin.ymaps.location.field_name'), null, 0);?>
    
    <?php ob_start();?><?php echo Router::GetAction();?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['optStatMap'] = new Smarty_variable(Config::Get("plugin.ymaps.location.actions.".$_tmp1.".staticMap"), null, 0);?>
    
    <?php $_smarty_tpl->tpl_vars['mapQuery'] = new Smarty_variable(array(), null, 0);?>
    <?php $_smarty_tpl->createLocalArrayVariable('mapQuery', null, 0);
$_smarty_tpl->tpl_vars['mapQuery']->value['l'] = 'map';?>
    <?php $_smarty_tpl->createLocalArrayVariable('mapQuery', null, 0);
$_smarty_tpl->tpl_vars['mapQuery']->value['size'] = ((string)$_smarty_tpl->tpl_vars['optStatMap']->value['width']).",".((string)$_smarty_tpl->tpl_vars['optStatMap']->value['height']);?>
    <?php $_smarty_tpl->createLocalArrayVariable('mapQuery', null, 0);
$_smarty_tpl->tpl_vars['mapQuery']->value['z'] = $_smarty_tpl->tpl_vars['optStatMap']->value['zoom'];?>
    <?php $_smarty_tpl->createLocalArrayVariable('mapQuery', null, 0);
$_smarty_tpl->tpl_vars['mapQuery']->value['ll'] = $_smarty_tpl->tpl_vars['optStatMap']->value['ll'];?>
    
    <?php if ($_smarty_tpl->tpl_vars['oLocation']->value){?>
        <?php $_smarty_tpl->createLocalArrayVariable('mapQuery', null, 0);
$_smarty_tpl->tpl_vars['mapQuery']->value['z'] = $_smarty_tpl->tpl_vars['oLocation']->value->getZoom();?>
        <?php $_smarty_tpl->createLocalArrayVariable('mapQuery', null, 0);
$_smarty_tpl->tpl_vars['mapQuery']->value['ll'] = ((string)$_smarty_tpl->tpl_vars['oLocation']->value->getLat()).",".((string)$_smarty_tpl->tpl_vars['oLocation']->value->getLong());?>
        <?php ob_start();?><?php echo join('',$_smarty_tpl->tpl_vars['optStatMap']->value['pt']);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->createLocalArrayVariable('mapQuery', null, 0);
$_smarty_tpl->tpl_vars['mapQuery']->value['pt'] = ((string)$_smarty_tpl->tpl_vars['oLocation']->value->getLat()).",".((string)$_smarty_tpl->tpl_vars['oLocation']->value->getLong()).",".$_tmp2;?>
    <?php }?>
    
    <?php ob_start();?><?php smarty_template_function_params_to_query($_smarty_tpl,array('params'=>$_smarty_tpl->tpl_vars['mapQuery']->value));?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['src'] = new Smarty_variable("https://static-maps.yandex.ru/1.x/?".$_tmp3, null, 0);?>
    



<?php if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_cdata')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cdata.php';
?><?php if (!function_exists('smarty_template_function_field_input_attr_common')) {
    function smarty_template_function_field_input_attr_common($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['field_input_attr_common']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    id="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
"
    class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-input <?php echo $_smarty_tpl->tpl_vars['inputClasses']->value;?>
"
    <?php if ($_smarty_tpl->tpl_vars['useValue']->value){?>value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
"<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['name']->value){?>name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['placeholder']->value){?>placeholder="<?php echo $_smarty_tpl->tpl_vars['placeholder']->value;?>
"<?php }?>
    <?php if ($_smarty_tpl->tpl_vars['isDisabled']->value){?>disabled<?php }?>
    <?php  $_smarty_tpl->tpl_vars['rule'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rule']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rule']->key => $_smarty_tpl->tpl_vars['rule']->value){
$_smarty_tpl->tpl_vars['rule']->_loop = true;
?>
        <?php if (is_bool($_smarty_tpl->tpl_vars['rule']->value)&&!$_smarty_tpl->tpl_vars['rule']->value){?>
            <?php continue 1?>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['rule']->key==='remote'){?>
            data-parsley-remote-validator="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['rules']->value['remote-validator'])===null||$tmp==='' ? 'livestreet' : $tmp);?>
"
            data-parsley-trigger="focusout"

            
            <?php $_smarty_tpl->tpl_vars['json'] = new Smarty_variable(array('type'=>'post','data'=>array('security_ls_key'=>$_smarty_tpl->tpl_vars['LIVESTREET_SECURITY_KEY']->value)), null, 0);?>

            <?php if (array_key_exists('remote-options',$_smarty_tpl->tpl_vars['rules']->value)){?>
                <?php $_smarty_tpl->tpl_vars['json'] = new Smarty_variable(array_merge_recursive($_smarty_tpl->tpl_vars['json']->value,$_smarty_tpl->tpl_vars['rules']->value['remote-options']), null, 0);?>
            <?php }?>

            data-parsley-remote-options='<?php echo json_encode($_smarty_tpl->tpl_vars['json']->value);?>
'
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['rule']->key==='remote-options'){?>
            <?php continue 1?>
        <?php }?>

        data-parsley-<?php echo $_smarty_tpl->tpl_vars['rule']->key;?>
="<?php echo $_smarty_tpl->tpl_vars['rule']->value;?>
"
    <?php } ?>
    <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['inputAttributes']->value),$_smarty_tpl);?>

    <?php echo smarty_function_cdata(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'list'=>$_smarty_tpl->tpl_vars['inputData']->value),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>




    <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
 <?php echo smarty_function_cmods(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'mods'=>$_smarty_tpl->tpl_vars['mods']->value),$_smarty_tpl);?>
 ls-clearfix <?php echo $_smarty_tpl->tpl_vars['classes']->value;?>
 "
        <?php echo smarty_function_cdata(array('name'=>$_smarty_tpl->tpl_vars['component']->value,'list'=>$_smarty_tpl->tpl_vars['data']->value),$_smarty_tpl);?>

        <?php echo smarty_function_cattr(array('list'=>$_smarty_tpl->tpl_vars['attributes']->value),$_smarty_tpl);?>
>

        
        <?php if ($_smarty_tpl->tpl_vars['label']->value){?>
            <label for="<?php echo $_smarty_tpl->tpl_vars['uid']->value;?>
" class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-label"><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</label>
        <?php }?>

        
        <div class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-holder">
            
    
    <div class="static_map" href=".inline_map">
            <img src="<?php echo $_smarty_tpl->tpl_vars['src']->value;?>
" width="<?php echo $_smarty_tpl->tpl_vars['optStatMap']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['optStatMap']->value['height'];?>
">
    </div>
    <div id="map" class="inline_map" ></div>
    <div class="fields">
        <?php if ($_smarty_tpl->tpl_vars['oLocation']->value){?>
            <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['fieldName']->value;?>
[lat]" value="<?php echo $_smarty_tpl->tpl_vars['oLocation']->value->getLat();?>
" class="field-location">
            <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['fieldName']->value;?>
[long]" value="<?php echo $_smarty_tpl->tpl_vars['oLocation']->value->getLong();?>
" class="field-location">
            <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['fieldName']->value;?>
[radius]" value="<?php echo $_smarty_tpl->tpl_vars['oLocation']->value->getRadius();?>
" class="field-location">
            <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['fieldName']->value;?>
[zoom]" value="<?php echo $_smarty_tpl->tpl_vars['oLocation']->value->getZoom();?>
" class="field-location">
        <?php }?>
    </div>    


        </div>

        
        <?php if ($_smarty_tpl->tpl_vars['note']->value){?>
            <small class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-note js-<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-note"><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</small>
        <?php }?>
    </div>

<?php }} ?>