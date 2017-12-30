<?php

class PluginFreelancer_ModuleBalance extends ModuleORM
{

    /**
     * Инизиализация модуля
     */
    public function Init()
    {
        parent::Init();
        
    }

    
    public function Transaction($oUser, $iSumm, $sDesc = '') {
        if(is_object($oUser)){
            $oUser = $oUser->getId();
        }
        $oTransaction = Engine::GetEntity('PluginFreelancer_Balance_Transaction');
        $oTransaction->setUserId($oUser);
        $oTransaction->setSumm($iSumm);
        $oTransaction->setDesc($sDesc);
        if($iSumm > 0){
            $oTransaction->setType('profit');
        }else{
            $oTransaction->setType('loss');
        }
        $oTransaction->setDesc($sDesc);
        return $oTransaction->Save();
    }
    
    public function GetBalance($oUser) {
        $iSumm = $this->GetSumSummFromTransactionByFilter([
            'user_id' => $oUser->getId()
        ]);
        return ($iSumm)?$iSumm:0;
    }
}