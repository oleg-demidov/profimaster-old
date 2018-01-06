<?php
/*
 * @author Oleg
 *
 */

class PluginSmsc_ModuleSms extends ModuleORM
{
    public function Init() {
        parent::Init();
    }
    
    public function Send(&$oSms) {
        $aParams = [
            'mes' => $oSms->getMess(),
            'phones' => $oSms->getNumber()
        ];
        
        $aParams = array_merge($aParams, Config::Get('plugin.smsc.user'));
        $aRes = $this->Response(Config::Get('plugin.smsc.urls.send'),$aParams );
        
        if (property_exists($aRes,'error' ) ) { 
            $this->Logger_Error("Ошибка выполнения запроса smsc!". serialize($aParams). $aRes);
            $oSms->setStatus('error');
        }else{
            $oSms->setStatus('ok');
            $oSms->setPrice($aRes->cost);
            $oSms->setSmsId($aRes->id);
        }
        return $aRes;
    }
    
    protected function Response($url, $params=[]) {
        
        $params['charset'] = 'utf-8';
        $params['fmt'] = '3';
        $params['cost'] = '2';
        
        $sPrarms = '';
        foreach($params as $key => $val){
            $sPrarms .= "$key=". urlencode($val);
            $sPrarms .= '&';
        }
        
        
        $getdata = http_build_query($params);
        
        $params = array(
            'params' => $params
         );
        
        $sResult = file_get_contents($url. '?'. $sPrarms );

        if ($sResult === false) { 
            $this->Logger_Error("Ошибка выполнения запроса smsc!". serialize($params)); 
            return false;
        }
        
        
        // Преобразование ответа из формата JSON
        $aResult = json_decode($sResult);
        
        
        
        return $aResult;
    }
    
}