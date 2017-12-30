<?php
/*
 * LiveStreet CMS
 * Copyright © 2013 OOO "ЛС-СОФТ"
 *
 * ------------------------------------------------------
 *
 * Official site: www.livestreetcms.com
 * Contact e-mail: office@livestreetcms.com
 *
 * GNU General Public License, version 2:
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * ------------------------------------------------------
 *
 * @link http://www.livestreetcms.com
 * @copyright 2013 OOO "ЛС-СОФТ"
 * @author Maxim Mzhelskiy <rus.engine@gmail.com>
 *
 */

/**
 * Поведение, которое необходимо добавлять к сущности (entity) у которой добавляются категории
 *
 * @package application.modules.category
 * @since 2.0
 */
class PluginYdirect_ModuleGeo_BehaviorEntity extends Behavior
{
    /**
     * Дефолтные параметры
     *
     * @var array
     */
    protected $aParams = array(
        // Уникальный код
        'target_type'                    => '',
        // Имя инпута (select) на форме, который содержит список категорий
        'form_field'                     => 'ygeo',
        // Автоматически брать текущую категорию из реквеста
        'form_fill_current_from_request' => true,
        // Возможность выбирать несколько категорий
        'multiple'                       => false,
        // Автоматическая валидация категорий (актуально при ORM)
        'validate_enable'                => true,
        // Минимальное количество категорий, доступное для выбора
        'validate_min'                   => 1,
        // Максимальное количество категорий, доступное для выбора
        'validate_max'                   => 5,
    );
    /**
     * Список хуков
     *
     * @var array
     */
    protected $aHooks = array(
        'validate_after' => 'CallbackValidateAfter',
        'after_save'     => 'CallbackAfterSave',
        'after_delete'   => 'CallbackAfterDelete',
    );

    /**
     * Инициализация
     */
    protected function Init()
    {
        parent::Init();
    }

    /**
     * Коллбэк
     * Выполняется при инициализации сущности
     *
     * @param $aParams
     */
    public function CallbackValidateAfter($aParams)
    {
       //print_r(getRequest('ygeo'));
    }

    /**
     * Коллбэк
     * Выполняется после сохранения сущности
     */
    public function CallbackAfterSave()
    {
        $oTarget = $this->oObject;
        if(!$aGeo = getRequest($this->getParam('form_field')) and !$aGeo = $this->oObject->getYGeo()){
            return false;
        }
        if(!is_array($aGeo)){
            $aGeo = [$aGeo];
        }
        foreach($aGeo as $Geo){
            if(!$oGeoTarget = $this->PluginYdirect_Geo_GetTargetByTargetIdAndTargetType($oTarget->_getPrimaryKeyValue(), Engine::GetEntityName($this->oObject))){
                $oGeoTarget = Engine::GetEntity('PluginYdirect_Geo_Target');
            }
            $oGeoTarget->setTargetId($oTarget->_getPrimaryKeyValue());
            $oGeoTarget->setTargetType(strtolower(Engine::GetEntityName($this->oObject)));
            $oGeoTarget->setGeoId($Geo);
            $oGeoTarget->Save();     
        }
    }

    /**
     * Коллбэк
     * Выполняется после удаления сущности
     */
    public function CallbackAfterDelete()
    {
        $oTarget = $this->oObject;
        $aGeoTarget = $this->PluginYdirect_Geo_GetTargetItemsByTargetIdAndTargetType($oTarget->_getPrimaryKeyValue(), Engine::GetEntityName($oTarget));
        
        foreach($aGeoTarget as $oGeoTarget){
            $oGeoTarget->Delete();     
        }
    }

    public function getGeos($aFilter = ['#index-from-primary'])
    {
        return $this->PluginYdirect_Geo_GetGeoItemsByFilter(array_merge([
            '#join' => [ 'JOIN '.Config::Get('plugin.ydirect.table.geo_target')." as gt ON gt.geo_id = t.id" ],
            '#where' => ['gt.target_id = ? and gt.target_type = ?' => [
                    $this->oObject->_getPrimaryKeyValue(), strtolower(Engine::GetEntityName($this->oObject))]
            ]            
        ], $aFilter));
    }

    public function getGeo()
    {
        $aGeo = $this->getGeos();
        return sizeof($aGeo)?array_shift($aGeo):$this->PluginYdirect_Geo_GetGeoById(107);
    }
    
}