<?php
$header = <<<HEADER
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<link href="{$this->domain}css/home.css" media="screen" rel="stylesheet" type="text/css" />
		
		<meta property="og:type" content="actor" />
		<meta property="og:url" content="http://82.176.210.128:8888/game" />
		<meta property="og:title" content="De reis naar zelfontdekking" />
		<meta property="og:image" content="http://82.176.210.128:8888/game/public/images/login.png" />
		<meta property="og:description" content="Kinderen krijgen een paspoort uitgedeeld. Dit paspoort is een werkboek welke opdrachten/vragen bevat die zelfontdekking stimuleren. Door kinderen deze vragen spelenderwijs te laten beantwoorden zorgt ervoor dat het ook leuk is om te doen.

Het spel kent vijf categorieën, te weten: personal, emotional, career/future, career en dream. In het paspoort is een landkaart te vinden waarop de vijf verschillende categorieën te zien zijn en onderverdeelt zijn op eilandjes. Deze zijn met elkaar verbonden dmv. vijf tussenvragen. Tussengelegen vragen, die in paspoort ingevuld dienen te worden, bouwen op naar de hoofdvraag welke op de computer uitgevoerd dient te worden."/>

<script language="javascript" type="text/javascript">

function getFBMetaInfo ()    {
        metatags = document.getElementsByTagName("meta");
        for (i = 0; i < metatags.length; i++)    {
            var property = metatags[i].getAttribute("property");
            var content = metatags[i].getAttribute("content");
           // alert(content);
            if (property == "og:type")    {
                 var _type = metatags[i].getAttribute("content");
            }
            if (property == "og:title")    {
                  var _title = metatags[i].getAttribute("content");
                
            }
            if (property == "og:image")    {
                  var _imageURL = metatags[i].getAttribute("content");
            }
            if (property == "og:url")    {
                  var _currentURL =metatags[i].getAttribute("content");
            }
            if (property == "og:description")    {
                 var _description = metatags[i].getAttribute("content");
            }
        }
       
        //alert(_title+" "+_imageURL+" "+_description);	
        return "?u="+_currentURL;
    }
    
function fbs_click() {

window.open('http://www.facebook.com/sharer.php'+getFBMetaInfo(),'sharer','toolbar=0,status=0,width=626,height=436');return false;

}
</script>

<title>De reis naar zelfontdekking</title>

<link rel="stylesheet" href="{$this->domain}css/main.css" type="text/css" />

<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lte IE 7]>
	<script src="{$this->domain}js/IE8.js" type="text/javascript"></script><![endif]-->
<!--[if lt IE 7]>

	
	<link rel="stylesheet" type="text/css" media="all" href="{$this->domain}css/ie6.css"/><![endif]-->

<script src="http://code.jquery.com/jquery-latest.js"></script>
<link href="{$this->domain}libs/skin/jplayer.blue.monday.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{$this->domain}libs/js/jquery.jplayer.min.js"></script>        
<script type="text/javascript" src="{$this->domain}libs/js/ajaxRequest.js" language="Javascript"></script>
<script>
    function toggleDivName(DivNameIndex)
    {
        $("div[id^='DivName']").hide();
        $("div[id='DivName"+DivNameIndex+"']").toggle();
        scroller  = new jsScroller(document.getElementById("Scroller-1"), 300, 350);
        scrollbar = new jsScrollbar (document.getElementById("Scrollbar-Container"), scroller, false);
        scrollerHelp  = new jsScroller(document.getElementById("Scroller-2"), 300, 350);
        scrollbarHelp = new jsScrollbar (document.getElementById("Scrollbar-ContainerHelp"), scrollerHelp, false);
            
    }

    function Close()
    {
        $("div[id^='DivName']").hide();
    }

    function StopPlayer()
    {
        $("#jquery_jplayer_1").jPlayer("stop");
    }
</script>
<style type="text/css">


                
                
        * { margin: 0; padding: 0; }
        body{ background: url('{$this->domain}images/bg.png') top left no-repeat; color:fff; width: 100%; height: 100%;}
#top { background: url('{$this->domain}images/topBackground.png') top left no-repeat; 
       width: 100%; height: 100%; position:absolute; z-index: 2; float:left; margin-left: 0px;}
.landscape { width: 100%; height: 100%;  
            position:absolute; z-index: 1; bottom: 0px;
            }
.map { position: absolute; z-index:3; bottom: 0px; margin-left: 140px; width: 980px; height: 541px;}
            #progress { position: absolute; bottom: 0px; z-index: 9; margin-left: 300px; margin-bottom: 0px; }
            .sound, .twitter, .facebook { position: absolute; z-index:15;height: 42px; width: 56px; line-height: 12px; 
            padding 1em 2em; bottom: 30px; display: inline; text-indent: -1000px;
            }
            
#grass { background: url('{$this->domain}images/interface/gras.png') top left no-repeat; position: absolute; bottom : 0px; width: 980px; height: 118px;
            margin-left: 140px; z-index: 14; } 
            .sound { background: url('{$this->domain}images/interface/soundon.png') top left no-repeat;  margin-left: 700px;}
            .twitter { background: url('{$this->domain}images/interface/twitter.png') top left no-repeat; margin-left: 860px; }
            .facebook { background: url('{$this->domain}images/interface/facebook.png') top left no-repeat; margin-left: 920px; }
            .sound:hover { background: url('{$this->domain}images/interface/soundonhover.png') top left no-repeat;}
            .twitter:hover { background: url('{$this->domain}images/interface/twitterhover.png') top left no-repeat; }
            .facebook:hover { background: url('{$this->domain}images/interface/facebookhover.png') top left no-repeat; }
            
            .back { position: absolute; z-index: 99; width: 38px; height: 38px; margin-top: 10px; margin-left: 150px; }
            img { border: none; }
.divName { position: absolute; text-decoration: none;  z-index:999; width: 322px; padding: 20px; height: 226px; left: 50%; margin-left:-113px;
           top: 50%; margin-top: -175px; display:none; background: url('{$this->domain}images/interface/code.png') top left no-repeat;} 

.divNameA { position: absolute; text-decoration: none;  z-index:999; width: 632px; padding: 20px; height: 485px; left: 50%; margin-left:-316px;
top: 50%; margin-top: -242px; display:none; background: url('{$this->domain}images/interface/popuplarge.png') top left no-repeat;} 
a { color: #ef6a5a; text-decoration: none; } 
.interaction { position: absolute; bottom: 60px; right: 60px; }
.question { position: absolute; bottom: 0px; z-index: 20; display: inline; margin-top: 40px; }
#frm { margin-top: 55px; margin-left: 65px; }
p.pcode { font-weight: bold; margin-top: 20px; }
ul { margin-left: 20px; }
.Container {
  position: relative;
  top: 25px; left: 250px;
  width: 300px;
  height: 340px;
  background-color: none;
}
#Scroller-1, #Scroller-2 { 
  position: absolute; 
  overflow: hidden;
  width: 300px;
  height: 340px;
}
#Scroller-1 p, #Scroller-2 p{
  margin: 0; padding: 10px 20px;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 11px;
  text-indent: 0px;

}
#feedback {
color: red;
}

#Scroller-1 ul li, #Scroller-2 ul li {
 margin: 0; padding-left: 0px; padding-right: 20px;
 font-family: Verdana, Arial, Helvetica, sans-serif;
 font-size: 11px;
}

#Scroller-1 ul, #Scroller-2 ul {
margin-left: 30px;
}
#Scroller-1 p, ul li, #Scroller-2 p {

  color: #805033;
}
#Scroller-1 p strong,#Scroller-2 p strong  {
  color: #4f391e;
}

.Scroller-Container {
  position: absolute;
  top: 0px; left: 0px;
}
.Scrollbar-Track {
  width: 25px; height: 350px;
  position: absolute;
  top: 50px; left: 570px;
  background: url('{$this->domain}images/interface/track.png') top left no-repeat;
}
.Scrollbar-Handle {
  position: absolute;
  top: 0px; left: 0px;
  width: 25px; height: 91px;
  background: url('{$this->domain}images/interface/handle.png') top left no-repeat;
  cursor: pointer;
}
p.ptitle { font-weight: bold; margin-top: -10px; }
.close { float: right; margin-right: 29px; margin-top: -20px; }
#frm input[type='text'] { font-weight: bold; height: 23px; width: 27px; margin-right: 9px; border: none; text-align: center; color: #000; background: none; }
#frms input[type='text'] { font-weight: bold; height: 25px; width: 330px; padding-left:10px; padding-right: 10px; margin-right: 0px; border: none; text-align: left; color: #000; background: url('{$this->domain}images/interface/textField.png') top left no-repeat; }
#frms { margin-top: 50px; }
#frm input[type='submit'] { float: right; height: 32px; width: 101px; margin-right: 29px; margin-top: 30px; border: none; text-align: center; color: #000; background: url('{$this->domain}images/interface/knoppen/confirm.png') top left no-repeat; }
#frm input[type='submit']:hover { height: 32px; width: 101px; margin-right: 29px; margin-top: 30px; border: none; text-align: center; color: #000; background: url('{$this->domain}images/interface/knoppen/confirmhover.png') top left no-repeat; }
input[type='button'] { height: 32px; width: 106px; margin-right: 39px; margin-top: 40px; border: none; text-align: center; color: #000; background: url('{$this->domain}images/interface/knoppen/continue.png') top left no-repeat; position:relative; float: right;}
input[type='button']:hover { height: 32px; width: 106px; margin-right: 39px; margin-top: 40px; border: none; text-align: center; color: #000; background: url('{$this->domain}images/interface/knoppen/continuehover.png') top left no-repeat; position: relative; float: right;}

.divNameA input[type='button'] { height: 32px; width: 106px; margin-right: 49px; margin-top: 60px; border: none; text-align: center; color: #000; background: url('{$this->domain}images/interface/knoppen/continue.png') top left no-repeat; position:relative; float: right;}
.divNameA input[type='button']:hover { height: 32px; width: 106px; margin-right: 49px; margin-top: 60px; border: none; text-align: center; color: #000; background: url('{$this->domain}images/interface/knoppen/continuehover.png') top left no-repeat; position: relative; float: right;}


.img { float: left; margin-top: 60px; }
.ranger { float: left; margin-top: 30px; margin-left: -50px; }
.level1 { background: url('{$this->domain}images/Level/level1.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.level1:hover { background: url('{$this->domain}images/Level/level1hover.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.level2 { background: url('{$this->domain}images/Level/level2.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.level2:hover { background: url('{$this->domain}images/Level/level2hover.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.level3 { background: url('{$this->domain}images/Level/level3.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.level3:hover { background: url('{$this->domain}images/Level/level3hover.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.level4 { background: url('{$this->domain}images/Level/level4.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.level4:hover { background: url('{$this->domain}images/Level/level4hover.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.level5 { background: url('{$this->domain}images/Level/level5.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.level5:hover { background: url('{$this->domain}images/Level/level5hover.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.level6 { background: url('{$this->domain}images/Level/level6.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.level6:hover { background: url('{$this->domain}images/Level/level6hover.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.help { background: url('{$this->domain}images/help.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }
.help:hover { background: url('{$this->domain}images/helphover.png') top left no-repeat; width: 84px; height: 125px; line-height: 50px; display: block; }


</style>
<script type="text/javascript" src="{$this->domain}libs/js/jsScroller.js"></script>
<script type="text/javascript" src="{$this->domain}libs/js/jsScrollbar.js"></script>
   
<script type="text/javascript">
var scroller  = null;
var scrollbar = null;
var scrollerHelp  = null;
var scrollbarHelp = null;
window.onload = function () {
  scroller  = new jsScroller(document.getElementById("Scroller-1"), 300, 350);
  scrollbar = new jsScrollbar (document.getElementById("Scrollbar-Container"), scroller, false);
  scrollerHelp  = new jsScroller(document.getElementById("Scroller-2"), 300, 350);
  scrollbarHelp = new jsScrollbar (document.getElementById("Scrollbar-ContainerHelp"), scrollerHelp, false);
 
}


</script>
</head>
<body>

HEADER;


?>
