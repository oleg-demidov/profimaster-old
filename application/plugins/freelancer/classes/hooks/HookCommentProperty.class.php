<?php

class PluginFreelancer_HookCommentProperty extends Hook
{

    public function RegisterHook()
    {
            $this->AddHook('template_response_actions_end', 'ResponseButtons' ,__CLASS__);
            // $this->AddHook('template_comment_form_fields_after', 'CommentProperty' ,__CLASS__);
    }
    
    public function ResponseButtons($aParams){
    	$oComment = $aParams['params']['comment'];
    	
    	if($oComment->getPid()){
    		return;
    	}
    		$iOrderId = $oComment->getTargetId();
    		$iMasterId = $oComment ->getUser()->getId();
    		$button=[
    		    'url'=>Config::Get('path.root.web')."/order/{$iOrderId}/choose_master/{$iMasterId}",
    		    'text'=>$this->Lang_Get('plugin.freelancer.text.order.choose_master')
    		];
    		 $this->Viewer_Assign('user', $oComment->getUser(), true);
    		 $this->Viewer_Assign('primaryButton', $button, true);
    		return $this->Viewer_Fetch('component@freelancer:modal');
    	
    }

    public function CommentProperty()
    {
        $oComment = Engine::GetEntity('Comment_Comment');
        
        $aBehavior =  array(
            'class'=>'ModuleProperty_BehaviorEntity',
            'target_type'=>'comment'
        );
        
        $oComment->AttachBehavior('property', $aBehavior);
        
        $this->Viewer_Assign('oComment', $oComment);
        return $this->Viewer_Fetch(Plugin::GetTemplatePath('freelancer').'/hooks/comment-property.tpl');
    }
    
}