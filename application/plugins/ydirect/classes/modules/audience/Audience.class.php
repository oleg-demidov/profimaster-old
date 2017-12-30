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


class PluginYdirect_ModuleAudience extends ModuleORM{
    
    public function Init() {
        parent::Init();
    }

    public function GetSegmentsList()
    {
        $aResult = $this->response('https://api-audience.yandex.ru/v1/management/segments');
        return json_decode($aResult);
    }
    
    public function CreateGeoSegment()
    {
        $url = 'https://api-audience.yandex.ru/v1/management/segments/create_geo';
        $oPoint = new stdClass;
        $oPoint->longitude = 63.609479195801;
        $oPoint->latitude = 53.221842784253;
        $oPoint->description = 'www';
        
        $oSegment = new stdClass;
        $oSegment->name = 'masterok';
        $oSegment->radius = 1000;
        $oSegment->period_length = 2;
        $oSegment->times_quantity = 1;
        $oSegment->geo_segment_type = 'regular';
        $oSegment->points = [$oPoint];
        
        $oStd = new stdClass;
        $oStd->segment = $oSegment;
        $aResult = $this->response($url, ['segment' => $oSegment]);
        return json_decode($aResult);
    }
    
    private function response($url, $content=null, $params=[]) {
        $body ='';
        $sMethod = 'GET';
        if($content){
            $jsonContent = json_encode($content);
            $body = "Content-Length: ".strlen(json_encode($content))."\r\n\r\n".
                        $jsonContent;
            $sMethod = 'POST';
        }
        
        $opts = array(
            'http'=>array(
              'method'=>$sMethod,
              'header'=>"Host: api-audience.yandex.ru\r\n".
                        "Content-Type: application/json\r\n" .
                        "Authorization: OAuth ".Config::Get('plugin.ydirect.yd_token')."\r\n".
                        $body
            )
        );

        $context = stream_context_create($opts,$params);
        /* Отправляет http-запрос на домен www.example.com
           с дополнительными заголовкам, показанными выше */
        $result = file_get_contents($url, false, $context);
        return $result;
    }
}
