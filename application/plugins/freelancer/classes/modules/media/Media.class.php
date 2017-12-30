<?php

class PluginFreelancer_ModuleMedia extends PluginFreelancer_Inherit_ModuleMedia
{
    public function CheckTargetUser($iTargetId, $sAllowType, $aParams)
    {
        if (!$oUser = $aParams['user']) {
            return false;
        }
        return true;
    }

}
