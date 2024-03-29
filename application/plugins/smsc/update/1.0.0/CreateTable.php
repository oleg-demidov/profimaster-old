<?php


/**
 * Description of CreateTable
 *
 * @author oleg
 */

class PluginSmsc_Update_CreateTable extends ModulePluginManager_EntityUpdate {
	/**
	 * Выполняется при обновлении версии
	 */
    private $aDumps = [
        'prefix_smsc_sms' => 'dump_sms'
    ];


    public function up() {        
        
        foreach($this->aDumps as $sTable => $sFile){
            if(!$this->exportDump($sTable, $sFile)){
                return false;
            }
        }
        
	return true;
    }
    
    protected function exportDump($sTable, $sFile) {
        if (!$this->isTableExists($sTable)) {
            $sResult = $this->exportSQL(Plugin::GetPath(__CLASS__).'update/1.0.0/'.$sFile.'.sql');
            $this->Logger_Notice(serialize($sResult));             
        }
        return true;
    }
    
    protected function removeTable($sTable) {
        if ($this->isTableExists($sTable)){
            return $this->exportSQLQuery("DROP TABLE IF EXISTS $sTable");
        }
    }

    /**
     * Выполняется при откате версии
     */
    public function down() {
        foreach($this->aDumps as $sTable => $sFile){
            $aResult = $this->removeTable($sTable);
            $this->Logger_Notice(serialize($aResult));
        }
    }
}