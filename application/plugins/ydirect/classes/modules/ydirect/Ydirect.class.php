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


class PluginYdirect_ModuleYdirect extends ModuleORM{
        
    public function Init() {
        parent::Init();
        $this->mapper = Engine::GetMapper(__CLASS__);
    }
    
    public function GetCampaignsList() {
        $aParams = [            
            'SelectionCriteria' =>[
                'Types' => ['TEXT_CAMPAIGN']
            ],
            'FieldNames' => [
                'NegativeKeywords', 'Name', 'Id'
            ]
        ];
        $url = $this->getUrl().'campaigns';
        if(!$oResult = $this->Response($url, 'get', $aParams)){
            return false;
        }
        return $oResult;
    }
    public function CreateCampaign($aParam) {
        $aParams = [            
            'Campaigns' =>[
                [
                    //'Name' => $aParams['name'],
                    'StartDate' => date('Y-m-d',(time()+(4*60*60))),
                    /*'DailyBudget' =>[
                        'Amount' => $iDailyBudget*1000000,
                        'Mode' => 'DISTRIBUTED'
                    ],*/
                    'Notification' => Config::Get('plugin.ydirect.campaigns.Notification'),
                    /*'NegativeKeywords' => [
                        'Items' => $aParams['aNKeywords']
                    ],*/
                    'TextCampaign' => [
                        'BiddingStrategy' => [
                            'Search' => [
                                'BiddingStrategyType' => 'HIGHEST_POSITION',
                                /*'AverageCpc' => [
                                    'AverageCpc' => (Config::Get('plugin.ydirect.campaigns.AverageCpc')*1000000),
                                    'WeeklySpendLimit' => Config::Get('plugin.ydirect.campaigns.WeeklySpendLimit')*1000000                
                                ]*/
                            ],
                            'Network' => [
                                'BiddingStrategyType' => 'NETWORK_DEFAULT',
                                'NetworkDefault' => [
                                    'BidPercent' => 100
                                ]
                            ]
                        ]
                    ],
                ]
            ]
        ];
        $aParams['Campaigns'][0] = array_merge($aParams['Campaigns'][0], $aParam);
        return $this->AddObj('campaigns', $aParams );
    }
    
    public function RemoveCampaign($iId ) {
        return $this->DeleteObj('campaigns', $iId );
    }
    
    public function CampaignUpdate($iId, $aParam =[] ) {
        $aParams = [            
            'Campaigns' =>[
                [
                    'Id' => $iId,                    
                ]
            ]
        ];
        $aParams['Campaigns'][0] = array_merge($aParams['Campaigns'][0], $aParam);
        return $this->UpdateObj('campaigns', $aParams);
    }
    
    public function AdGroupCreate($oAdGroup) {
        if(!$oCampaign = $oAdGroup->getCampaign()){
            $this->Message_AddError("Не найти кампанию");
            return false;
        }
        $aParams = [            
            'AdGroups' =>[
                [
                    'CampaignId' => $oCampaign->getYcampaignId(),
                    'Name' => $oAdGroup->getName(),
                    'NegativeKeywords' => [
                        'Items' => explode(',', $oAdGroup->getNegativeKeywords())
                    ],
                    'RegionIds' => $oAdGroup->getRegionIds()
                ]
            ]
        ];
        
        if(!$aResult =  $this->AddObj('adgroups', $aParams )){
            return false;
        }
        
        $oAdGroup->setYadgroupId($aResult[0]->Id); 
        $oAdGroup->setState('on');
        $oAdGroup->Save();
        
        return $aResult;
    }
    
    public function AdGroupUpdate($oAdGroup) {
        $aParams = [            
            'AdGroups' =>[
                [
                    'Id' => $oAdGroup->getYadgroupId(),
                    'Name' => $oAdGroup->getName(),
                    'NegativeKeywords' => [
                        'Items' => explode(',', $oAdGroup->getNegativeKeywords())
                    ],
                    'RegionIds' => $oAdGroup->getRegionIds()
                ]
            ]
        ];
        
        return $this->UpdateObj('adgroups', $aParams);
    }
    
    public function AdGroupList($iCampaignId) {
        if(!is_array($iCampaignId)){
            $iCampaignId = [$iCampaignId];
        }
        $aParams = [            
            'SelectionCriteria' =>[
                'Types' => ['TEXT_AD_GROUP'],
                'CampaignIds' => $iCampaignId
            ],
            'FieldNames' => [
                'NegativeKeywords', 'Name', 'Id', 'Status'
            ]
        ];
        $url = $this->getUrl().'adgroups';
        if(!$oResult = $this->Response($url, 'get', $aParams)){
            return false;
        }
        return $oResult;
    }
    
    public function AdGroupGetById( $aAdGroupIds ) {
        $aParams = [            
            'SelectionCriteria' =>[
                'Ids' => $aAdGroupIds
            ],
            'FieldNames' => [
                'ServingStatus', 'Status', 'Id'
            ]
        ];
        $url = $this->getUrl().'adgroups';
        if(!$oResult = $this->Response($url, 'get', $aParams)){
            return false;
        }
        return $oResult;
    }
    
     public function AdGroupUpdateStatus($aAdGroup) {
         
        $aAdGroupIds = array_keys($aAdGroup);
        
        if(!sizeof($aAdGroupIds)){
            return null;
        }
        
        $oResult = $this->AdGroupGetById($aAdGroupIds);
        
        if(!property_exists($oResult, 'result') or !property_exists($oResult->result, 'AdGroups')){
            return null;
        }        
        
        foreach ($oResult->result->AdGroups as $oVals) {
            if(isset($aAdGroup[$oVals->Id])){
                $aAdGroup[$oVals->Id]->setStatus(strtolower($oVals->Status));
                $aAdGroup[$oVals->Id]->Save();
            }
        }
        return $oResult->result->AdGroups;
    }
    
    public function AdGroupDelete($iId ) {
        return $this->DeleteObj('adgroups', $iId );
    }
    
    /**
     * 
     * Обьявления
     */
    
    public function AdsList($iIdAdGroup) {
        $aParams = [            
            'SelectionCriteria' =>[
                'Types' => ['TEXT_AD'],
                'AdGroupIds' => [$iIdAdGroup]
            ],
            'FieldNames' => [
                'AdGroupId', 'Id'
            ]
        ];
        $url = $this->getUrl().'ads';
        if(!$oResult = $this->Response($url, 'get', $aParams)){
            return false;
        }
        return $oResult;
    }
    
    public function AdsGetById($aIds) {
        $aParams = [            
            'SelectionCriteria' =>[
                'Ids' => $aIds
            ],
            'FieldNames' => [
                'AdGroupId', 'Id', 'State','Status'
            ]
        ];
        $url = $this->getUrl().'ads';
        if(!$oResult = $this->Response($url, 'get', $aParams)){
            return false;
        }
        return $oResult;
    }
    
    public function AdsUpdateCron() {
        $aAds = $this->PluginYdirect_Ydirect_GetAdsItemsByFilter([
            '#index-from' => 'yads_id', 
            '#where' => ['t.yads_id is not null and t.yads_id != ?' => ['']]
            ]);
        $this->AdsUpdateStatus($aAds);
        
        $aAdGroups = $this->PluginYdirect_Ydirect_GetAdGroupItemsByFilter([
            '#index-from' => 'yadgroup_id', 
            '#where' => ['t.yadgroup_id is not null and t.yadgroup_id != ?' => ['']]]);
        $this->AdGroupUpdateStatus($aAdGroups);
        
        $aKeywords = $this->PluginYdirect_Ydirect_GetKeywordItemsByFilter([
            '#index-from' => 'ykeyword_id', 
            '#where' => ['t.ykeyword_id is not null and t.ykeyword_id != ?' => ['']]]);
        $this->KeywordsUpdateStatus($aKeywords);
    }
    
    public function AdsUpdateStatus($aAds) {
        $aIds = array_keys($aAds);
        if(!sizeof($aIds)){
            return null;
        }
        
        $oResult = $this->AdsGetById($aIds);
        
        if(!property_exists($oResult, 'result') and !property_exists($oResult->result, 'Ads')){
            return null;
        }
        
        foreach ($oResult->result->Ads as $oVals) {
            if(isset($aAds[$oVals->Id])){
                $aAds[$oVals->Id]->setStatus(strtolower($oVals->Status));
                $aAds[$oVals->Id]->setState(strtolower($oVals->State));
                $aAds[$oVals->Id]->Save();
            }
        }
        return $oResult->result->Ads;
    }
    
    public function AdsCreate($aAds) {
        if(!sizeof($aAds)){
            return false;
        }
        if(!is_array($aAds)){
            $aAds = [$aAds];
        }
        
        $aAdsParam= [];
        foreach ($aAds as $oAds) {
            if(!$oAdGroup = $oAds->getAdgroup()){
                $this->Logger_Notice("Не найти группу обьявлений ads");
                continue;
            }
            $aAdsParam[] = [
                $oAds->getType() => [
                    'Text' => $oAds->getText(),
                    'Title' => $oAds->getTitle(),
                    'Href' => $oAds->getHref(),
                    'Mobile' => 'NO'
                ],
                'AdGroupId' => $oAdGroup->getYadgroupId(),
            ];
        }
        
        $aParams = [            
            'Ads' =>$aAdsParam
        ];   
        
        $aResult = $this->AddObj('ads', $aParams );
        
        reset($aAds);
        foreach ($aResult as $oResult) {
            if(property_exists($oResult, 'Id')){
                $oAdsCur = each($aAds)['value'];
                $oAdsCur->setYadsId($oResult->Id);
                $oAdsCur->setStatus('draft');
                $oAdsCur->Save();
            }
        }     
        
        return $aResult;
    }
    
    public function AdsModerate($aAds) {
        if(!sizeof($aAds)){
            return false;
        }
        $aIds = array_keys($aAds);
        $aParams = [            
            'SelectionCriteria' =>[
                'Ids' => $aIds
            ]            
        ];
        $url = $this->getUrl().'ads';
        if(!$oResult = $this->Response($url, 'moderate', $aParams)){
            return false;
        }
        
        foreach ($aAds as $oAds) {
            $oAds->setStatus('draft');
            $oAds->Save();
        }
        
        if(Config::Get('plugin.ydirect.debug_mode')){
            $this->Logger_Notice('ydirect ads: '.serialize($oResult));
        }
        return $oResult;
    }
    
    public function AdsUpdate($oAds) {
        
        $aParams = [            
            'Ads' =>[
                [
                    'Id' => $oAds->getYadsId(),
                    $oAds->getType() => [
                        'Text' => $oAds->getText(),
                        'Title' => $oAds->getTitle(),
                        'Href' => $oAds->getHref(),
                    ]
                ]
            ]
        ];
        return $this->UpdateObj('ads', $aParams);
    }
    
    public function AdsSuspend($aAdsIds) {
        if(!sizeof($aAdsIds)){
            return false;
        }
        $aParams = [            
            'SelectionCriteria' =>[
                'Ids' => $aAdsIds
            ]
        ];
        $url = $this->getUrl().'ads';
        if(!$oResult = $this->Response($url, 'suspend', $aParams)){
            return false;
        }
        
        $aAds = $this->PluginYdirect_Ydirect_GetAdsItemsByFilter(['yads_id in' => $aAdsIds]);
        foreach($aAds as $oAds){
            $oAds->setStatus('suspend');
            $oAds->Save();
        }
        
        if(Config::Get('plugin.ydirect.debug_mode')){
            $this->Logger_Notice('ydirect ads: '.serialize($oResult));
        }
        return $oResult;
    }
    
    public function AdsResume($aAdsIds) {
        if(!sizeof($aAdsIds)){
            return false;
        }
        $aParams = [            
            'SelectionCriteria' =>[
                'Ids' => $aAdsIds
            ]
        ];
        $url = $this->getUrl().'ads';
        if(!$oResult = $this->Response($url, 'resume', $aParams)){
            return false;
        }
        
        $aAds = $this->PluginYdirect_Ydirect_GetAdsItemsByFilter(['yads_id in' => $aAdsIds]);
        foreach($aAds as $oAds){
            $oAds->setStatus('start');
            $oAds->Save();
        }
        
        if(Config::Get('plugin.ydirect.debug_mode')){
            $this->Logger_Notice('ydirect ads: '.serialize($oResult));
        }
        return $oResult;
    }
    
    public function AdsDelete($iId ) {
        return $this->DeleteObj('ads', $iId );
    }
   /*
    *  Keywords
    */
    
    public function KeywordsList($iIdAdGroup) {
        $aParams = [            
            'SelectionCriteria' =>[
                'AdGroupIds' => [$iIdAdGroup]
            ],
            'FieldNames' => [
                'Keyword', 'Id'
            ]
        ];
        $url = $this->getUrl().'keywords';
        if(!$oResult = $this->Response($url, 'get', $aParams)){
            return false;
        }
        return $oResult;
    }
    
    public function KeywordsCreate($mKeywords) {
        if(!sizeof($mKeywords)){
            return false;
        }
        
        $aKeywords= [];
        foreach ($mKeywords as $oKeyword) {
            if(!$oAdGroup = $oKeyword->getAdgroup()){
                $this->Logger_Notice("Не найти группу обьявлений");
                continue;
            }
            $aKeywords[] = [
                'AdGroupId' => $oAdGroup->getYadgroupId(),
                'Keyword' => $oKeyword->getValue(),
                'Bid' => $oKeyword->getBid()*1000000
            ];
        }
        
        if(!$oAdGroup = $oKeyword->getAdgroup()){
            $this->Message_AddError("Не найти группу обьявлений");
            return false;
        }
        
        $aParams = [            
            'Keywords' => $aKeywords
        ];
        
        $aResult = $this->AddObj('keywords', $aParams );
        
        foreach ($aResult as $oResult) {
            $oKeyword->setYkeywordId($oResult->Id);
            $oKeyword->Save();
        }     
        
        return $aResult;
    }
    
    public function KeywordsUpdate($oKeyword) {
        
        $aParams = [            
            'Keywords' =>[
                [
                    'Id' => $oKeyword->getYkeywordId(),
                    'Keyword' => $oKeyword->getValue()
                ]
            ]
        ];
        return $this->UpdateObj('keywords', $aParams);
    }
    
    public function KeywordsDelete($iId ) {
        return $this->DeleteObj('keywords', $iId );
    }
    
    public function KeywordsGetById($aIds) {
        $aParams = [            
            'SelectionCriteria' =>[
                'Ids' => $aIds
            ],
            'FieldNames' => [
                'AdGroupId', 'Id', 'State','Status'
            ]
        ];
        $url = $this->getUrl().'keywords';
        if(!$oResult = $this->Response($url, 'get', $aParams)){
            return false;
        }
        return $oResult;
    }
    public function KeywordsUpdateStatus($aKeywords) {
         
        $aKeywordsIds = array_keys($aKeywords);
        
        if(!sizeof($aKeywordsIds)){
            return null;
        }
        
        $oResult = $this->KeywordsGetById($aKeywordsIds);
        
        if(!property_exists($oResult, 'result') or !property_exists($oResult->result, 'Keywords')){
            return null;
        }        
        
        foreach ($oResult->result->Keywords as $oVals) {
            if(isset($aKeywords[$oVals->Id])){
                $aKeywords[$oVals->Id]->setStatus(strtolower($oVals->Status));
                $aKeywords[$oVals->Id]->setState(strtolower($oVals->State));
                $aKeywords[$oVals->Id]->Save();
            }
        }
        return $oResult->result->Keywords;
    }
    
    public function DictionariesGet($aNames = ['GeoRegions']) {
        $aParams = [            
            "DictionaryNames" =>$aNames
        ];
        $url = Config::Get('plugin.ydirect.yd_url_sanbox').'dictionaries';
        if(!$oResult = $this->Response($url, 'get', $aParams)){
            return false;
        }
        return $oResult;
    }
    
    protected function UpdateObj($sType, $aParams) {
        $url = $this->getUrl().$sType;
        if(!$oResult = $this->Response($url, 'update', $aParams)){
            return false;
        }
        foreach($oResult->result->UpdateResults as $oAddResult){
            if(property_exists($oAddResult,'Errors')){
                $this->Message_AddError(serialize($oAddResult), 'ydirect '.$sType);
                $this->Logger_Error('ydirect update'.$sType.': '.serialize($oAddResult));
                return false;
            }
        }
        if(Config::Get('plugin.ydirect.debug_mode')){
            $this->Logger_Notice('ydirect '.$sType.': '.serialize($oResult));
        }
        return $oResult->result->UpdateResults;
    }
    
    protected function DeleteObj($sType, $iId ) {
        $aParams = [            
            'SelectionCriteria' =>[
                'Ids' => [$iId]
            ]
            
        ];
        $url = $this->getUrl().$sType;
        if(!$oResult = $this->Response($url, 'delete', $aParams)){
            return false;
        }
        foreach($oResult->result->DeleteResults as $oDeleteResult){
            if(property_exists($oDeleteResult,'Errors')){
                $this->Message_AddError(serialize($oDeleteResult), 'ydirect '.$sType);
                $this->Logger_Error('ydirect '.$sType.': '.serialize($oDeleteResult));
                return false;
            }
        }
        if(Config::Get('plugin.ydirect.debug_mode')){
            $this->Logger_Notice('ydirect '.$sType.': '.serialize($oResult));
        }
        return $oResult->result->DeleteResults;
    }
    
    protected function AddObj($sType, $aParams ) {
        $url = $this->getUrl().$sType;
        if(!$oResult = $this->Response($url, 'add', $aParams)){
            return false;
        }
        foreach($oResult->result->AddResults as $oAddResult){
            if(property_exists($oAddResult,'Errors')){
                $this->Message_AddError(serialize($oAddResult), 'ydirect '.$sType);
                $this->Logger_Error('ydirect '.$sType.': '.serialize($oAddResult));
                return false;
            }
        }
        if(Config::Get('plugin.ydirect.debug_mode')){
            $this->Logger_Notice('ydirect '.$sType.': '.serialize($oResult));
        }
        return $oResult->result->AddResults;
    }
    
    public function ResponseOauth($code){
        
        $aApp = Config::Get('plugin.ydirect.app'); 
        //$sAuth = base64_encode($aApp['id'].':'.$aApp['secret']);   
        
        $aDataQuery = [
            'grant_type'=>'authorization_code',
            'code' => $code,
            'client_id' => $aApp['id'],
            'client_secret' => $aApp['secret']
        ];    

        $sBody = http_build_query($aDataQuery);
        
        $iCountBody = strlen($sBody);
        
        $headers = array(
          // "Authorization: Basic $sAuth",                    // OAuth-токен. Использование слова Bearer обязательно
           "Host: oauth.yandex.ru",                      // Логин клиента рекламного агентства
           "Content-Length: $iCountBody",                             // Язык ответных сообщений
           "Content-Type: application/x-www-form-urlencoded"    // Тип данных и кодировка запроса
        );
        
        if( $curl = curl_init() ) {
            curl_setopt($curl, CURLOPT_URL, Config::Get('plugin.ydirect.oauth_url'));
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $sBody);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $out = curl_exec($curl);
            $out = (array) json_decode($out);
            curl_close($curl);
          }
        return $this->AddToken($out);
    }
    
    public function AddToken($mData){
        $oToken = Engine::GetEntity('PluginYdirect_Ydirect_Token',$mData);
        if($oToken->Save()){
            echo "Токен получен и сохранен в базе";
        }        
    }

    public function getToken() {
        if(Config::Get('plugin.ydirect.test_mode')){
            return Config::Get('plugin.ydirect.yd_token');
        }else{
            if(!$oToken = $this->PluginYdirect_Ydirect_GetTokenByFilter(['#order' => ['date_create' => 'desc']])){
                return false;
            }else{
                return $oToken->getAccessToken();
            }
        }
    }
    
    public function getUrl(){
        if(Config::Get('plugin.ydirect.test_mode')){
            return Config::Get('plugin.ydirect.yd_url_sanbox');
        }else{
            return Config::Get('plugin.ydirect.yd_url');
        }
    }

    protected function Response($url, $sMethod, $params=[]) {
        
        if(!$token = $this->getToken()){
            return false;
        }
        
        $clientLogin = Config::Get('plugin.ydirect.yd_login');
        
        $headers = array(
           "Authorization: Bearer $token",                    // OAuth-токен. Использование слова Bearer обязательно
           //"Client-Login: $clientLogin",                      // Логин клиента рекламного агентства
           "Accept-Language: ru",                             // Язык ответных сообщений
           "Content-Type: application/json; charset=utf-8"    // Тип данных и кодировка запроса
        );
        
        $params = array(
            'method' => $sMethod,                                 // Используемый метод сервиса Campaigns
            'params' => $params
         );
        $body = json_encode($params, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        // Создание контекста потока: установка HTTP-заголовков и тела запроса
        $streamOptions = stream_context_create(array(
           'http' => array(
              'method' => 'POST',
              'header' => $headers,
              'content' => $body
           ),
           /*
           // Для полноценного использования протокола HTTPS можно включить проверку SSL-сертификата сервера API Директа
           'ssl' => array(
              'verify_peer' => true,
              'cafile' => getcwd().DIRECTORY_SEPARATOR.'CA.pem' // Путь к локальной копии корневого SSL-сертификата
           )
           */ 
        ));
        // Выполнение запроса, получение результата
        $sResult = file_get_contents($url, 0, $streamOptions);
        if ($sResult === false) { 
            $this->Message_AddError("Ошибка выполнения запроса ydirect!". serialize($params), 'ydirect '.$sMethod);
            $this->Logger_Error('ydirect '.$sMethod.': '."Ошибка выполнения запроса ydirect!". serialize($params)); 
            return false;
        }
        // Преобразование ответа из формата JSON
        $aResult = json_decode($sResult);

        if (isset($aResult->error)) {
            $apiErr = $aResult->error;
            $this->Message_AddError("Ошибка API {$apiErr->error_code}: {$apiErr->error_string} - {$apiErr->error_detail} (RequestId: {$apiErr->request_id})". serialize($params), 'ydirect '.$sMethod);
            $this->Logger_Error('ydirect '.$sMethod.': '."Ошибка API {$apiErr->error_code}: {$apiErr->error_string} - {$apiErr->error_detail} (RequestId: {$apiErr->request_id})". serialize($params));
            return false;
        }
        
        return $aResult;
    }
    
    public function GetUsersByPermissionCode($sCode) {
        return $this->Rbac_GetUsersByPermissionCode($sCode);
    }
    
}