<?php


/**
 * Description of EventTopic
 *
 * @author oleg
 */

class PluginFreelancer_ActionPay_EventPay extends Event {

    public function EventIndex() 
    {
        $aParams = [];
        $aParams['MerchantLogin'] = Config::Get('plugin.freelancer.robokassa');
    }
    
    
}