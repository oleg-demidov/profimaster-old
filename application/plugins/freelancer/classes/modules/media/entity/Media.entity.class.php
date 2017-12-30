<?php

class PluginFreelancer_ModuleMedia_EntityMedia extends PluginFreelancer_Inherit_ModuleMedia_EntityMedia
{

    public function getFileWebPath100x100crop()
    {
        return $this->getFileWebPath('100x100crop');
    }
    
    public function getFileWebPath200x200crop()
    {
        return $this->getFileWebPath('200x200crop');
    }

}