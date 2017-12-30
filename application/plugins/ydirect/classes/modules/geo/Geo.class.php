<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of yd
 *
 * @author oleg
 */


class PluginYdirect_ModuleGeo extends ModuleORM{
        
    public function Init() {
        parent::Init();
    }
    
    public function RewriteFilter($aFilter, $sEntityFull, $sTargetType)
    {
        $oEntitySample = Engine::GetEntity($sEntityFull);

       // print_r($aFilter);

        if (!isset($aFilter['#join'])) {
            $aFilter['#join'] = array();
        }

        if (!isset($aFilter['#select'])) {
            $aFilter['#select'] = array();
        }

        if(!isset($aFilter['#ygeo'])){
            return $aFilter;
        }
        if (array_key_exists('#ygeo', $aFilter)) {
            $aGeoIds = [];
            if(is_array($aFilter['#ygeo'])){
                $aGeos = $this->GetGeoItemsByFilter(['id in' => $aFilter['#ygeo']]);
                foreach($aGeos as $oGeo){
                    $this->getChildIds($oGeo, $aGeoIds);
                }
            }else{
                $oGeo = $this->GetGeoById($aFilter['#ygeo']);
                $this->getChildIds($oGeo, $aGeoIds);
            }
            
            
            if (is_array($aGeoIds)) {
                $sJoin = "JOIN " . Config::Get('plugin.ydirect.table.geo_target') . " geo ON
                                            t.`{$oEntitySample->_getPrimaryKey()}` = geo.target_id and
                                            geo.target_type = '{$sTargetType}' and
                                            geo.geo_id IN ( ?a ) ";
                $aFilter['#join'][$sJoin] = array($aGeoIds);
            }
            //print_r($aFilter['#join']);
        }
        return $aFilter;
    }
    /*protected function getParentIds($oGeo, &$aGeoIds) {
        $aGeoIds[] = $oGeo->getId();
        if($oGeoParent = $oGeo->getParent()){
            $this->getParentIds($oGeoParent, $aGeoIds);
        }
    }*/
    protected function getChildIds($oGeo, &$aGeoIds) {
        if(!$oGeo) return null;
        $aGeoIds[] = $oGeo->getId();
        $aGeoChildren = $oGeo->getChildren();
        foreach($aGeoChildren as $oGeoChild){
            $this->getChildIds($oGeoChild, $aGeoIds);
        }
    }
    
    public function RewriteGetItemsByFilter($aResult, $aFilter, $sTargetType)
    {
        if (!$aResult) {
            return;
        }
        /**
         * Список на входе может быть двух видов:
         * 1 - одномерный массив
         * 2 - двумерный, если применялась группировка (использование '#index-group')
         *
         * Поэтому сначала сформируем линейный список
         */
        if (isset($aFilter['#index-group']) and $aFilter['#index-group']) {
            $aEntitiesWork = array();
            foreach ($aResult as $aItems) {
                foreach ($aItems as $oItem) {
                    $aEntitiesWork[] = $oItem;
                }
            }
        } else {
            $aEntitiesWork = $aResult;
        }

        if (!$aEntitiesWork) {
            return;
        }
        /**
         * Проверяем необходимость цеплять категории
         */
        if (isset($aFilter['#with']['#category'])) {
            //$this->AttachCategoriesForTargetItems($aEntitiesWork, $sTargetType);
        }
    }

}