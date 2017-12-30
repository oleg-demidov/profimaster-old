<?php


/**
 * Description of CreateTable
 *
 * @author oleg
 */

class PluginYdirect_Update_CreateTable extends ModulePluginManager_EntityUpdate {
	/**
	 * Выполняется при обновлении версии
	 */
    
    private $aDumps = [
        'prefix_ydirect_ydirect_campaign' => 'dump_campaign',
        'prefix_ydirect_ydirect_adgroup' => 'dump_adgroup',
        'prefix_ydirect_ydirect_ads' => 'dump_ads',
        'prefix_ydirect_ydirect_keyword' => 'dump_keywords',
        'prefix_ydirect_ydirect_geo' => 'dump_geo',
        'prefix_ydirect_ydirect_geotarget' => 'dump_geotarget',
        'prefix_ydirect_ydirect_token' => 'dump_token',
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