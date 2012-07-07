<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of levelcontroller
 *
 * @author michel
 */
require_once 'app/pageController.php';
require_once 'views/levelView.php';
class levelController extends pageController {
    
    private $dataModel;
    private $dataBase;
    private $sess;
    private $levels;
    private $level;

    public function levelController(dataModel & $dataModel, & $getvars=null) {
    	parent::pageController($dataModel, $getvars);
            $this->dataModel = $dataModel; 
		
    }
    
    private function setLevelArray() {
        
        $this->dataBase = $this->dataModel->getData();
        $this->levels = $this->dataBase->query("AU_LEVELS", "levelsID > 0");
        if($this->levels == 1) $this->levels = $this->dataBase->fetchArray();
        return $this->levels;
       
    }
    
    public function checkGameLevel() {
        $this->setLevelArray();
        $i = 0;
        $total = count($this->levels);
       
        if(isset($_GET['l']) == true) {
            $this->level = $_GET['l'];
            foreach($this->levels as $key => $levelArray){
                $i++;
                foreach($this->levels[$key] as $keys => $value) {
                    if($keys == "name" && $value == $this->level) return $this->startGame($this->level, $this->levels[$key]['levelsID']);
                    if($i == $total && $keys == "name" && $value != $this->level) return "false";
                }
            }
        } else {
            $map = $this->setGameMap();
           $level = $this->placeLevelsIcons();
            return $map.$level;
        }
    }
    
    private function lockedLevel($data = null) {
        $userLevel = $data; 
       
        foreach($userLevel as $userLevelKey => $userLevelValue) {
            foreach ($userLevel[$userLevelKey] as $key => $value) {
                if($value == "locked") return str_replace ("level", "", $key);
                if($value == "unlocked") {
                    $level = str_replace ("level", "", $key);
                    if( $level== 6) {
                        return 7;
                    }
                }
            }
        }
    }
    
    private function levelName($id= null ) {
        if($id != null) {
            $userLevel = $this->dataBase->query("AU_LEVELS", "levelsID ='".$id."' order by levelsID"); 
            if($userLevel == 1) $userLevel = $this->dataBase->fetchArray();
            foreach($userLevel as $key => $value) {
                foreach($userLevel[$key] as $keys => $valueName) {
                if($keys == "name") return $valueName;
                }
            }
            
        }
    }
    
    public function placeLevelsIcons() {
        $userLevel = $this->lockedLevel($this->checkUserLevel(1));
        if($userLevel != 7) $levelName = $this->levelName($userLevel);
        else $levelName = "Game Out";
        $btn1 = "";
        $level = "";
      
        foreach($this->levels as $level => $Value ){
          
           foreach($this->levels[$level] as $levelKey => $levelValue ) {
            if($levelKey == "levelsID") {
                
              if($levelValue != $userLevel) {
                  if($levelValue < $userLevel) {
                        $style = $this->getLevelStyle($levelValue);
                        $btn1 .= "\n\t<div class='question' ".$style.">\n\t";
                        $btn1 .= "<img src='".$this->getDomain()."images/Level/level".$levelValue."on.png' />\n\t"; 
                        $btn1 .= "</div>\n";
                    } else {
                        $style = $this->getLevelStyle($levelValue);
                        $btn1 .= "\n\t<div class='question' ".$style.">\n\t";
                        $btn1 .= "<img src='".$this->getDomain()."images/Level/level".$levelValue.".png' />\n\t"; 
                        $btn1 .= "</div>\n";
                    }
              } else {
                 $style = $this->getLevelStyle($levelValue);
                 $btn1 .= "\n\t<div class='question' ".$style.">\n\t";
                 $btn1 .= "<a href='javascript:toggleDivName(".$levelValue.");' class='level".$levelValue."' />&nbsp;</a>"; 
                 $btn1 .= "</div>\n";
                 $btn1 .= $this->levelData($levelValue, $levelName);
                }
            }
           
            
           }
           
        } 
        
         $help = $this->getHelp($userLevel);
         return $btn1.$help;
    }
    
    public function getHints($id =null) {
        if($id != null) {
            $userLevel = $this->dataBase->query("AU_HINTS", "levelID ='".$id."' order by levelID"); 
            if($userLevel == 1) $userLevel = $this->dataBase->fetchArray();
            foreach($userLevel as $key => $value) {
                foreach($userLevel[$key] as $keys => $valueName) {
                if($keys == "hints") return $valueName;
                }
            }
        }
    }
    
     public function getImage($id =null) {
        if($id != null) {
            $userLevel = $this->dataBase->query("AU_HINTS", "levelID ='".$id."' order by levelID"); 
            if($userLevel == 1) $userLevel = $this->dataBase->fetchArray();
            foreach($userLevel as $key => $value) {
                foreach($userLevel[$key] as $keys => $valueName) {
                if($keys == "img") return $valueName;
                }
            }
        }
    }
    
    public function getAnimal($id =null) {
        if($id != null) {
            $userLevel = $this->dataBase->query("AU_HINTS", "levelID ='".$id."' order by levelID"); 
            if($userLevel == 1) $userLevel = $this->dataBase->fetchArray();
            foreach($userLevel as $key => $value) {
                foreach($userLevel[$key] as $keys => $valueName) {
                if($keys == "animal") return $valueName;
                }
            }
        }
    }
    
    public function levelData($id = null, $name = null) {
        
        $btn1 = "<script type='text/javascript'>
                        $(document).ready(function(){
 $(\"#jquery_jplayer_1\").jPlayer({
  ready: function () {
   $(this).jPlayer(\"setMedia\", {
    name:\"Big Buck Bunny Trailer\",
    free:true,
    m4v: \"http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer_480x270_h264aac.m4v\",
    oga: \"http://www.jplayer.org/video/ogv/Big_Buck_Bunny_Trailer_480x270.ogv\",
    poster:\"".$this->getDomain()."images/matrial/".$this->getImage($id)."\"
   });
  },
  swfPath: \"".$this->getDomain()."libs/js\",
  supplied: \"m4v, oga\"
 });
});

</script>";
                    $btn1 .= "\n<div id='DivName".$id."' class='divName'>\n\t<p class='ptitle'>".$name."</p><a href='javascript:Close();' class='close'><img src='".$this->getDomain()."images/interface/close.png' /></a><p class='pcode'>Fill in the pagenumbers!</p>\n\t
                       <form id='frm' name='frm'>
                       <input type='text' id='f1' name='f1' size='2' MAXLENGTH='2'/>
                       <input type='text' id='fs' name='f2' size='2' MAXLENGTH='2'/>
                       <input type='text' id='f3' name='f3' size='2' MAXLENGTH='2'/>
                       <input type='text' id='f4' name='f4' size='2' MAXLENGTH='2'/>
                       <input type='hidden' id='level' name='level' value='".$id."' />
                       <input type='button' id='submit' name='submit' value='' onClick='test(); return false;'  />
                       </form><br />
                       <p><div id='feedback' name='feedback'></div></p>
                       </div>\n";
                    
                     $btn1 .= "\n<div id='DivName".$id."1' class='divNameA'>\n\t<p class='ptitle'>".$this->getAnimal($id)."</p><a href='javascript:Close();StopPlayer();' class='close'><img src='".$this->getDomain()."images/interface/close.png' /></a>\n\t
                         <div class=\"jp-video jp-video-270p\">
			<div class=\"jp-type-playlist\">
				<div id=\"jquery_jplayer_1\" class=\"jp-jplayer\"></div>
				<div id=\"jp_interface_1\" class=\"jp-interface\">
					<div class=\"jp-video-play\"></div>
					<ul class=\"jp-controls\">
						<li><a href=\"#\" class=\"jp-play\" tabindex=\"1\">play</a></li>
						<li><a href=\"#\" class=\"jp-pause\" tabindex=\"1\">pause</a></li>

						<li><a href=\"#\" class=\"jp-stop\" tabindex=\"1\">stop</a></li>
						<li><a href=\"#\" class=\"jp-mute\" tabindex=\"1\">mute</a></li>
						<li><a href=\"#\" class=\"jp-unmute\" tabindex=\"1\">unmute</a></li>
						<li><a href=\"#\" class=\"jp-previous\" tabindex=\"1\">previous</a></li>
						<li><a href=\"#\" class=\"jp-next\" tabindex=\"1\">next</a></li>
					</ul>

					<div class=\"jp-progress\">
						<div class=\"jp-seek-bar\">
							<div class=\"jp-play-bar\"></div>
						</div>
					</div>
					<div class=\"jp-volume-bar\">
						<div class=\"jp-volume-bar-value\"></div>
					</div>
					<div class=\"jp-current-time\"></div>

					<div class=\"jp-duration\"></div>
				</div>
				<div id=\"jp_playlist_1\" class=\"jp-playlist\">
					<ul>
						<!-- The method Playlist.displayPlaylist() uses this unordered list -->
						<li></li>
					</ul>
				</div>
			</div>

		</div>
                 <input type='button' id='submit' name='submit' value='' onClick='javascript:toggleDivName(".$id."2);StopPlayer();' />
 
                       </div>\n";
                    $btn1 .= "\n<div id='DivName".$id."2' class='divNameA'>\n\t<p class='ptitle'>".$this->getAnimal($id)."</p><a href='javascript:Close();' class='close'><img src='".$this->getDomain()."images/interface/close.png' /></a>
                        <img src='".$this->getDomain()."images/matrial/".$this->getImage($id)."' class='img' />
                            
                        <div class=\"Container\">
  <div id=\"Scroller-1\">
   <div class=\"Scroller-Container\"><p>
   ".$this->getHints($id)."
                       </p>  </div>
  </div>
</div>
  <div id=\"Scrollbar-Container\">
    <div class=\"Scrollbar-Track\">
      <div class=\"Scrollbar-Handle\"></div>

    </div>
  </div>
  <input type='button' id='submit' name='submit' value='' onClick='javascript:toggleDivName(".$id."3);' />
                       
  </div>\n";
                
       $btn1 .= "\n<div id='DivName".$id."3' class='divNameA'>\n\t<p class='ptitle'>".$name."</p><a href='javascript:Close();' class='close'><img src='".$this->getDomain()."images/interface/close.png' /></a>
                      
       <form id='frms' name='frms'>
       ";
       $i = 1;
       $qu ="";
       $qid ="";
       $quest = $this->getLevelQuestion($id);
       
        foreach($quest as $key => $value) {
                foreach ($quest[$key] as $qkey => $qvalue) {
                   
                    if($qkey == "qID") $qid = $qvalue;
                    if($qkey == "quest") { $qu = $qvalue;
                    
                        $btn1 .= "<p>".$qu."</p><br />";
                        $btn1 .= "<input type='text' name='f".$i."' id='f".$i."' value='Fill' /><br />";
                        $btn1 .= "<input type='hidden' name='q".$i."' id='q".$i."' value='".$qid."' /><br />";
                        $i = $i+1;
                    }
                    
                    }
                    
            }
            
         $btn1 .= "<input type='hidden' id='level' name='level' value='".$id."' />
                       <input type='button' id='submit' name='submit' value='' onClick='test(); return false;'  />
                       </form><br />
                       <p><div id='feedback' name='feedback'></div></p>
                                    
  </div>\n";          
             
            return $btn1;
      
    }
    
    private function checkUserLevel($id = null) {
          if($id != null){
            $userLevel = $this->dataBase->query("AU_LEVELSCOMPLEET", "userID ='".$id."' order by userID"); 
            if($userLevel == 1) $userLevel = $this->dataBase->fetchArray();
            return $userLevel;
        }
    }
    
    public function setGameMap() {
        $level = $this->lockedLevel($this->checkUserLevel(1));
        if($level == 7) $level = 6;
        $btn = "\n<div class='landscape' ><img src='".$this->getDomain()."images/mapcompleet.png' alt='' class='map'  /><div id='progress'><img src='".
                    $this->getDomain()."images/interface/gameprogress".($level-1).".png'></div> </div>
                        <a href='#' class='sound'>sound</a>
                        <a href='#' class='twitter'>twitter</a>
                        <a href='#' class='facebook'>facebook</a>
                        <div id='grass'></div>
                  \n";
        return $btn;
    }
    
    public function getHelp($id = null) {
        if($id != null) {
            if($id != 7){
            $helpLevel = $this->dataBase->query("AU_HELP", "levelID ='".$id."' order by levelID"); 
            if($helpLevel == 1) $helpLevel = $this->dataBase->fetchArray();
            $style = "style='bottom: 120px; margin-left: 650px;'"; 
            foreach($helpLevel as $key => $value) {
                foreach ($helpLevel[$key] as $helpKey => $helpValue) {
                    if($helpKey == "tekst") {
                                           $help = "\n<div id='DivName".$id."8' class='divNameA'>\n\t<p class='ptitle'>HELP</p><a href='javascript:Close();' class='close'><img src='".$this->getDomain()."images/interface/close.png' /></a>
                        <img src='".$this->getDomain()."images/matrial/".$this->getImage($id)."' class='img' />
                            
                        <div class=\"Container\">
  <div id=\"Scroller-2\">
   <div class=\"Scroller-Container\"><p> ".$helpValue."
                   </p>  </div>
  </div>
</div>
  <div id=\"Scrollbar-ContainerHelp\">
    <div class=\"Scrollbar-Track\">
      <div class=\"Scrollbar-Handle\"></div>

    </div>
  </div>
                        
  </div>\n";
                 $help .= "\n\t<div class='question' ".$style.">\n\t";
                 $help .= "<img src='".$this->getDomain()."images/ranger.png' class='ranger' />";
                 $help .= "<a href='javascript:toggleDivName(".$id."8);' class='help' />&nbsp;</a>"; 
                 $help .= "</div>\n";
                 
                
                        return $help;
                    }
                }
            }
            
        }
        }
    }
    
    public function getLevelStyle($id = null) {
        if($id == 7) {
            return "";
        } else {
            if($id != null){
                $style = $this->dataBase->query("AU_HINTS", "levelID ='".$id."'");
                if($style == 1) $style = $this->dataBase->fetchArray();
            
                foreach($style as $styleKey => $styleValue) {
                    foreach($style[$styleKey] as $key => $value) {
                        if($key == "style") return $value;
                    }
                }

            }
        }
    }
    
    public function getLevelQuestion($id = null) {
        if($id != null){
            $form = "";
            $i = 1;
            $qu ="";
            $qid ="";
            $question = $this->dataBase->query("AU_QUESTIONS", "levelID ='".$id."' order by levelID");
            if($question == 1) $question = $this->dataBase->fetchArray();
            return $question;
        }
    }
    
    public function startGame($level = null, $id = null) {
        $question = $this->getLevelQuestion($id);
        switch($level) {
            case "personal canyon":
                $btn = "\n<div class='landscape' ><img src='".$this->getDomain()."images/mapcompleet.png' alt='' class='map'  /><div id='progress'><img src='".
                    $this->getDomain()."images/interface/gameprogress0.png'></div> </div>
                        <a href='#' class='sound'>sound</a>
                        <a href='#' class='twitter'>twitter</a>
                        <a href='#' class='facebook'>facebook</a>
                        <div id='grass'></div>
                  \n";
                break;
            case "emotional mountan":
                $btn = "\n<div class='landscape' ><img src='".$this->getDomain()."images/mapcompleet.png' alt='' class='map'  /><div id='progress'><img src='".
                    $this->getDomain()."images/interface/gameprogress1.png'></div> </div>
                        <a href='#' class='sound'>sound</a>
                        <a href='#' class='twitter'>twitter</a>
                        <a href='#' class='facebook'>facebook</a>
                        <div id='grass'></div>
                  \n";
                break;
            case "social safari":
                $btn = "<div class='landscape' ><img src='".$this->getDomain()."images/level3.jpg' /></div>";
                break;
            case "future and career shipwrek":
                $btn = "<div class='landscape' ><img src='".$this->getDomain()."images/level4.jpg' /></div>";
                break;
            case "talent falls":
                $btn = "<div class='landscape' ><img src='".$this->getDomain()."images/level5.jpg' /></div>";
                break;
            case "dream island":
                $btn = "<div class='landscape' ><img src='".$this->getDomain()."images/level5.jpg' /></div>";
                break;
        }
        $btn1 = "";
        $styles = "";
        $hints = "";
        $hintsid = "";
        
        for($i = 1; $i <= 6; $i++) {
            
            if($i != $id ) {
                if($i < $id) {
                    $btn1 .= "\n\t<div class='question' >\n\t";
                    $btn1 .= "<img src='".$this->getDomain()."images/Level/level".$i."on.png' />\n\t"; 
                    $btn1 .= "</div>\n";
                } else {
                    $btn1 .= "\n\t<div class='question' >\n\t";
                    $btn1 .= "<img src='".$this->getDomain()."images/Level/level".$i.".png' />\n\t"; 
                    $btn1 .= "</div>\n";
                }
            } else {
                    
            }
        }
    
        return $btn.$btn1;
    }
    
}

?>
