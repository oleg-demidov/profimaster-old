<?php /* Smarty version Smarty-3.1.13, created on 2017-12-29 18:16:26
         compiled from "/var/www/profimaster/application/plugins/freelancer/frontend/components/field/field.count.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20977297805a46321ad7f827-68157538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77f88df743d2c5c02250275aa670ac9a262e4453' => 
    array (
      0 => '/var/www/profimaster/application/plugins/freelancer/frontend/components/field/field.count.tpl',
      1 => 1510711321,
      2 => 'file',
    ),
    'c37e4b176a3da48e84a541bf22e5a1db4bf1a4fc' => 
    array (
      0 => '/var/www/profimaster/framework/frontend/components/field/field.tpl',
      1 => 1506863400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20977297805a46321ad7f827-68157538',
  'function' => 
  array (
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
  'unifunc' => 'content_5a46321adeae20_08307342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a46321adeae20_08307342')) {function content_5a46321adeae20_08307342($_smarty_tpl) {?><?php if (!is_callable('smarty_function_component_define_params')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component_define_params.php';
if (!is_callable('smarty_function_field_make_rule')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.field_make_rule.php';
if (!is_callable('smarty_function_field_get_value')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.field_get_value.php';
if (!is_callable('smarty_function_cmods')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cmods.php';
if (!is_callable('smarty_function_cdata')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cdata.php';
if (!is_callable('smarty_function_cattr')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.cattr.php';
if (!is_callable('smarty_function_component')) include '/var/www/profimaster/framework/classes/modules/viewer/plugs/function.component.php';
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

    <?php $_smarty_tpl->tpl_vars['component2'] = new Smarty_variable('fl-field-count', null, 0);?>
    <?php $_smarty_tpl->tpl_vars['classes'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['classes']->value)." ".((string)$_smarty_tpl->tpl_vars['component2']->value), null, 0);?>



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
            
    
    <?php $_smarty_tpl->_capture_stack[0][] = array('field', null, null); ob_start(); ?>
        <input type="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['type']->value)===null||$tmp==='' ? 'text' : $tmp);?>
" <?php smarty_template_function_field_input_attr_common($_smarty_tpl,array());?>
 />
    <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>  
    
    <?php echo smarty_function_component(array('_default_short'=>'actionbar','items'=>array(array('buttons'=>array(Smarty::$_smarty_vars['capture']['field'])),array('buttons'=>array(array('text'=>'<b>-</b>','classes'=>((string)$_smarty_tpl->tpl_vars['component2']->value)."-min",'type'=>'button','mods'=>'danger'),array('text'=>'<b>+</b>','classes'=>((string)$_smarty_tpl->tpl_vars['component2']->value)."-plus",'type'=>'button','mods'=>'success'))))),$_smarty_tpl);?>


        </div>

        
        <?php if ($_smarty_tpl->tpl_vars['note']->value){?>
            <small class="<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-note js-<?php echo $_smarty_tpl->tpl_vars['component']->value;?>
-note"><?php echo $_smarty_tpl->tpl_vars['note']->value;?>
</small>
        <?php }?>
    </div>

<?php }} ?>