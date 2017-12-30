<?php

class PluginFreelancer_ModuleUser extends PluginFreelancer_Inherit_ModuleUser
{
    public function NumberIsExits($iNum) {
        return $this->oMapper->NumberIsExits($iNum);
    }
    
    public function IsNumber($sNum) {
        return preg_match('/^(8|\+7)[\- ]?\(?\d{3}\)?[\- ]?[\d\- ]{7,10}$/', $sNum);
    }
    
    public function GetUserByNumber($sValue) {
        $sNumer = str_replace(['(',')',' ','-',',','.','+'], '', trim($sValue));
        $aNum = $this->NumberIsExits($sNumer);
        return $this->GetUserById($aNum[0]['user_id']);
    }
}