<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of levelView
 *
 * @author michel
 */

require_once('views/indexView.php');

class levelView extends indexView {
	
    private $controller;
    
    public function levelView($controller) {
        parent::indexView($controller);
        $this->controller = $controller;
    }
    
    
    function display () {
        $this->addToOutput($this->getHeader());
        $this->addToOutput($this->controller->checkGameLevel());
        $this->addToOutput($this->getFooter());
        return $this->getOutput();
    }
}
?>
