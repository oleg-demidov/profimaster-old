<?php
/**
 * BlockNetworksapphelp.class.php
 * @author: Roman Revin <xgismox@gmail.com>
 * @date  : 02.07.13
 */

class PluginYdirect_BlockKeywords extends Block
{
    private $plugin;

    public function Exec()
    {
    	$oUser = $this->GetParam('user');
        
        if(isPost()){
            $aKeyword = $this->PluginYdirect_Ydirect_GetKeywordItemsByUserId($oUser->getId());
            if(!$sKeywords = getRequest('keywords')){
                foreach($aKeyword as $oKeyword){
                    $oKeyword->Delete();
                }
            }else{
                $aKeywords = preg_split("/[\s,]+/", $sKeywords);
                foreach ($aKeyword as $oKeyword){
                    if(($key = array_search($oKeyword->getValue(), $aKeywords)) !== false){
                        unset($aKeywords[$key]);
                    }else{
                        $oKeyword->Delete();
                    }                
                }
                foreach ($aKeywords as $sKeyword){
                    $oKeyword = Engine::GetEntity('PluginYdirect_Ydirect_Keyword');
                    $oKeyword->setValue($sKeyword);
                    $oKeyword->setUserId($oUser->getId());
                    $oKeyword->Save();
                }

            }
        }
        $aKeyword = $this->PluginYdirect_Ydirect_GetKeywordItemsByUserId($oUser->getId());
        $this->Viewer_Assign('aKeyword', $aKeyword );
        
        return true;
    }
    
}