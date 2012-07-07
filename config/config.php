<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of config
 *
 * @author michel
 */
class config {
    
    private $_db;
    private $_table;


    public function config () { 
        $this->_db = database::singleton();
        $this->_table = "AU_CONFIG";
        
        }
    
    private function setConfig($var = null, $val = null) {
        
        $condition = "config_options = '".stripslashes($var)."'";
        $config = $this->_db->query($this->_table, $condition);
        if($config) {
            $this->_db->updateQuery($table, array("config_options" => $var, 
                                                 "config_value" => $val));
            
            return true;
        } else {
            $this->_db->insertQuery($table, array("config_options" => $var, 
                                                 "config_value" => $val));
            
            return true;
        }
    }
    
    public function getConfig($config = null) {
       
        $condition = "config_options = '".stripslashes($config)."'";
        $config_result = $this->_db->query($this->_table, $condition);
        
        if($config_result != true) return $config." doesn't exist!";
        $config = $this->_db->fetchArray();
        foreach ($config as $configKey => $configValue) {
            if($configKey == "config_value") $configItem = $configValue['config_value'];
        }
        
        return $configItem;
        
    }
    
}

?>
