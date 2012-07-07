<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of indexView
 *
 * @author michel
 */
class indexView {
    
    private $controller;
    var $output;
    public $lang;
    public $domain;
    
    public function indexView (pageController &$viewController) {
      	$this->setController($viewController);
        $this->domain = $this->getController()->getDomain();
        $this->lang = $_REQUEST['lang'];
    }
    
   
    public function addToOutput($output)
    {
        if (!isset($this->output))
                $this->setOutput($output);
        else
            $this->output .= $output;
    }
    
    public function getOutput()
    {
        if (!isset($this->output))
                $this->setOutput("");
        return $this->output;
    }
     public function setOutput($output) {
         $this->output = $output;
     }
     
    public function getHeader() {
       if(isset($_REQUEST['v']) && $_REQUEST['v'] ==  "level") $this->back = "<a href='".$this->domain.$_REQUEST['lang']."/main/' class='back'><img src='".$this->domain."images/back.png' /></a>";
       else  $this->back = "";
       include("header.php");
       return $header;
    }
     
    public function getFooter () {
        
        include("footer.php");
        return $footer;
    }
    
    public function getController()
    {
        return $this->controller;
    }
    
     public function setController(PageController $controller)
    {
       $this->controller = $controller;
    }
}

?>
