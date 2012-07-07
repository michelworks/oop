<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of levels
 *
 * @author michel
 */
class levels {
    private $_levelId;
    private $_levelName;
    
    public function levels($levelId = null, $levelName = null) {
        
        if($levelId != null) $this->setLevelId($levelId);
        if($levelName != null) $this->setLevelName($levelName);
    }
    
    private function setLevelId($value = null) {
        $this->_levelId = $value;
    }
    
    private function setLevelName($value = null) {
        $this->_levelName = $value;
    }
}

?>
