<?php

class PluginFreelancer_ModuleFreelancer extends ModuleORM
{
    public function Init() {
        parent::Init();
    }
    
    public function GetCountResponseByTargetId($iUserId){
        if(!sizeof($oResponse = $this->GetResponseItemsByFilter([
            '#select' => ["count(t.id) as count"],
            '#group' => ['id'],
            "#page" => 1,
            'target_id' => $iUserId]))){
            return 0;
            }
        return $oResponse['count'];
    }
    
    public function Rus2Translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '',  'ы' => 'y',   'ъ' => '',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya', 
            ' '=>''
        );
        return strtr(trim($string), $converter);
    }
    
    public function UpdateRoles() {
        $aPaymentsOld = $this->PluginRobokassa_Payment_GetPaymentItemsByFilter([
            'state' => 2,
            '#where' => ["DATE_ADD(t.date_pay ,INTERVAL t.expiration DAY) < NOW()"=>[0]],
            '#index-from' => 'user_id'
        ]);
        //$this->Logger_Notice(serialize($aPaymentsOld));
        foreach($aPaymentsOld as $oPaymentOld){
            $this->Rbac_RemoveRoleUser($oPaymentOld->getUserId(),$oPaymentOld->getProductId());
            $oPaymentOld->setState(3);
            $oPaymentOld->Save();
        }        
        $aUsers = $this->User_GetUsersByArrayId(array_keys($aPaymentsOld));
        foreach ($aUsers as $oUser) {
            $this->LeaveFirstSpecialization($oUser);
        }
    }
    
    
    public function LeaveFirstSpecialization($oUser) {
        $iCount = 0;
        if($oUser->isSpecialization(['count_allow' => &$iCount]) and $iCount == 1){
            $aSpecTargets = $this->Category_GetTargetItemsByFilter([
                'target_id' => $oUser->getId(),
                'object_type' => 'user',
                'target_type' => 'specialization',
                '#order' => ['date_create' => 'ASC']
            ]);
            $oSpecLeave = array_shift($aSpecTargets);
            foreach ($aSpecTargets as $oSpecTarget) {
                $oSpecTarget->Delete();
            }
            if(sizeof($aSpecTargets)){
                $this->PluginFreelancer_Notify_Send($oUser, 'specialization_leave1',$oSpecLeave );
            }
        }        
    }
    
   
}