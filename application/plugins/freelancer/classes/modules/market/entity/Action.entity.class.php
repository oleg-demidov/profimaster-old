<?php

class PluginFreelancer_ModuleMarket_EntityAction extends EntityORM
{
        
    public function getDateStartFormat($sFormat = 'd.m.Y') {
        return $this->getFormatDate('date_start', $sFormat);
    }
    
    public function getDateEndFormat($sFormat = 'd.m.Y') {
        return $this->getFormatDate('date_end', $sFormat);
    }
    
    public function getFormatDate($sKey, $sFormat) {
        if(!$sDate = $this->_getDataOne($sKey)){
            return $sDate;
        }
        if(!$oDate = DateTime::createFromFormat('Y-m-d G:i:s', $sDate)){
            return $sDate;
        }
        return $oDate->format($sFormat);
    }
    
}