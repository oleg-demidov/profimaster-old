<?php

/**
 * Запрещаем напрямую через браузер обращение к этому файлу
 */
if (!class_exists('Plugin')) {
    die('Hacking attempt!');
}

class PluginFreelancer extends Plugin {

    private $aProperties=array(
        array(
            'data'=>array(
                'type'=>ModuleProperty::PROPERTY_TYPE_TEXT,
                'title'=>'Номер',
                'code'=>'number',
                'sort'=>100
            ),
            'validate_rules'=>array(
                'allowEmpty'=>false,
                'max' => 15,
                'min' => 10,                
            ),
            'params'=>array(),
            'additional'=>array()
        )
    );
    
    private $aDependencePlugins = [
        'fix_category'
    ];


    protected $aInherits = array(
        'template' => array(
            'admin:component.p-user.list' => '_components/admin/list.tpl',
            //'component.user.settings/tuning' => '_components/user/settings/tuning.tpl',
            //'component.auth.login' => '_components/auth/auth.login.tpl',
            //'component.media.pane' => '_components/media/pane.tpl',
           // 'admin:component.p-rbac.role-permissions-item' => '_components/p-rbac/role/permissions.item.tpl',
        ),
        /*'entity'  =>array(
            'ModuleComment_EntityComment' => '_ModuleComment_EntityComment',
            ),*/
        'action' => [
            'ActionSettings' => '_ActionSettings',
            'ActionIndex' => '_ActionIndex'],
        'module' => [
            'ModuleMedia' => '_ModuleMedia',
            'ModuleGeo' => '_ModuleGeo',
            'ModuleTalk' => '_ModuleTalk',
            'ModuleUser' => '_ModuleUser',
            'PluginPayment_ModulePayment' => '_ModulePayment',
            'ModuleBlog' => '_ModuleBlog'
            ],
        'entity' =>array(
            'ModuleUser_EntityUser' => '_ModuleUser_EntityUser',
            'ModuleMedia_EntityMedia' => '_ModuleMedia_EntityMedia',
            'ModuleBlog_EntityBlog' => '_ModuleFreelancer_EntityBlog'
            ),
        'mapper' =>array(
            'ModuleUser_MapperUser' => '_ModuleUser_MapperUser',
            'ModuleComment_MapperComment' => '_ModuleFreelancer_MapperComment',
            'ModuleTopic_MapperTopic' => '_ModuleFreelancer_MapperTopic'
            )
    );
    
    
    
    protected $aRolesRemove = array(
        'groups' => array('freelancer'),
        'roles' => array('profi', 'master', 'employer', 'employer_vip')
    );
    
    public function Activate() {
        
        if(($sError = $this->GetDependenceSatisfied()) !== true){
            $this->Message_AddError($sError,'Ошибка активации',true);
            return false;
        }
        
        if (!$this->Rbac_CreatePermissions($this->getRoles(), 'freelancer')) {
            return false;
        }
        
        if (!$oType = $this->Category_CreateTargetType('specialization', 'Специализации', array(), true)) {
            $this->Message_AddError('Ошибка создания типа категории','',true);
            return false;
        }
        
        $oCategory = Engine::GetEntity('Category_Category');
        $oCategory->setTypeId($oType->getId());
        $oCategory->setTitle('Строймастер');
        $oCategory->setDescription('Строительство и ремонт');
        $oCategory->setUrl('stroymaster');
        $oCategory->setDateCreate(date("Y-m-d H:i:s"));
        $oCategory->setUrlFull('stroymaster');
        $oCategory->setOrder(1);
        $oCategory->setData([]);
        if (!$oCategory->Save()){
            $this->Message_AddError('Ошибка создания временной категории','',true);
            return false;
        }
        $this->Cron_CreateTask('Оповещение о новых заказах','PluginFreelancer_Notify_SendOrders',60*24,$this);
        $this->Cron_CreateTask('Удаление истекших ролей','PluginFreelancer_Freelancer_UpdateRoles',30,$this);
        return true;
    }
    
    public function GetDependenceSatisfied() {
        $aActivePlugins = $this->PluginManager_GetPluginsActive();
        foreach($this->aDependencePlugins as $sNeedPlugin){
            if(!in_array($sNeedPlugin, $aActivePlugins)){
                return 'Необходимо установить зависиимость: Плагин "'.$sNeedPlugin.'"';                
            }
        }
        return true;
    }

    /**
     * Инициализация плагина
     */
    public function Init() {
        $this->Geo_AddTargetType('order');
        //$this->exportSQL(Plugin::GetPath(__CLASS__).'/update/1.0.0/dump.sql');
        $this->Media_AddTargetType('order');
        $this->Media_AddTargetType('user');
        
        $this->Component_Add('freelancer:auth');
        $this->Component_Add('freelancer:notify');
        $this->Component_Add('freelancer:logo');
        $this->Component_Add('freelancer:market');
        $this->Component_Add('freelancer:fl-userbar');
        $this->Component_Add('freelancer:footer');
        $this->Component_Add('freelancer:specialization');
        
        $this->Viewer_AppendStyle(Plugin::GetTemplateWebPath('freelancer').'assets/css/style.css');
        $this->Viewer_AssignJs(
            array(
                'market_price_cof'      => Config::Get('plugin.freelancer.market.price_cof'),
                'market_price_cof_limit'      => Config::Get('plugin.freelancer.market.price_cof_limit')
            )
        );
        
        //$this->PluginFreelancer_Notify_SendOrders();
    }
    
    private function getRoles(){
        return include(__DIR__.'/update/1.0.0/roles.php');
    }

    /**
     * Проверка зависимостей плагина
     *
     * @return bool
     */
    public function Deactivate() {
        $this->Cron_RemoveTasksByPlugin($this);
        $this->Rbac_RemovePermissions($this->aRolesRemove, 'freelancer');
        $this->Category_RemoveTargetType('specialization', ModuleCategory::TARGET_STATE_NOT_ACTIVE);
        return true;
    }

}

?>