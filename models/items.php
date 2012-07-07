<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of items
 *
 * @author michel
 */
class items {
    private $_itemId;
    private $_itemName;
    private $_itemChecked;
    private $_itemHint;
    private $_itemAnswer;
    
    public function items($_itemId = null,
                           $_itemName = null,
                           $_itemChecked = false,
                           $_itemHint = null,
                           $_itemAnswer = null ) {
        
        if($_itemId != null) $this->setItemId($_itemId);
        if($_itemName != null) $this->setItemName($_itemName);
        if($_itemHint != null) $this->setItemHint($_itemHint);
        if($_itemAnswer != null) $this->setItemAnswer($_itemAnswer);
        if($_itemChecked == false || $_itemChecked == true) $this->setItemChecked($_itemChecked);
        
    }
    
    private function setItemId($value = null) {
        $this->_itemId = $value;
    }
    
    private function setItemName($value = null) {
        $this->_itemName = $value;
    }
    
    private function setItemChecked($value = null) {
        $this->_itemChecked = $value;
    }
    
    private function setItemAnswer($value = null) {
        $this->_itemAnswer = $value;
    }
    
    private function setItemHint($value = null) {
        $this->_itemHint = $value;
    }
    
    public function getItemArray() {
        
        return Array("itemId" => $this->_itemId,
                     "itemName" => $this->_itemName,
                     "itemChecked" => $this->_itemChecked,
                     "itemAnswer" => $this->_itemAnswer,
                     "itemHint" => $this->_itemHint
                    );
    }
}

?>
