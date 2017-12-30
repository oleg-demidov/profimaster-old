<?php

/**
 * Description of EventTopic
 *
 * @author oleg
 */
class PluginFreelancer_ActionSettings_EventSpecialization extends Event {

    public function EventSpecialization() {
        $this->Component_Add('freelancer:specialization-tabs');
        $this->Hook_Run('freelancer_user_event_specialization', ['oUser' => $this->oUserCurrent]);
        if (isPost()) {
            $iCount = 0;
            if (!$this->Rbac_IsAllow('specialization', 'freelancer', ['count' => sizeof(getRequest('specialization')), 'count_allow' => &$iCount])) {
                $sHtmlMarket = $this->PluginFreelancer_Market_GetHtmlButton('Купить Pro');
                return $this->Message_AddError('Вы не можете выбрать больше ' . $iCount . ' специализаций. ' . $sHtmlMarket);
            }
            $this->oUserCurrent->setSpecialization(getRequest('specialization'));
            $this->oUserCurrent->_setValidateScenario('specialization');
            if ($this->oUserCurrent->_Validate()) {
                $this->Category_SaveCategories($this->oUserCurrent, 'specialization');
                $this->Hook_Run('freelancer_user_aftersave_specialization', ['oUser' => $this->oUserCurrent]);
                $this->Message_AddNoticeSingle($this->Lang_Get('common.success.save'));
            } else {
                foreach ($this->oUserCurrent->_getValidateErrors() as $aError) {
                    $this->Message_AddError($aError[0]);
                }
            }
        }
        $this->sMenuSubItemSelect = 'specialization';
    }

    public function GetTemplatePath() {
        $sTemplateName = Config::Get('view.skin');
        $sPath = Config::Get('path.root.server') . '/application/frontend/skin/' . $sTemplateName
                . '/actions/ActionSettings/profile.tpl';
        return $sPath;
    }

}
