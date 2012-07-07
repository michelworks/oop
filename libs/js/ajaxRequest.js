function trim(value) {
  value = value.replace(' ','');
  return value;  
}

function validation(value) {
    value = trim(value);
    if(value !='' || value != ' ') {
        var nr = value;//IsNumeric(value);
        if(nr != false) {
            return nr;
        }
    }
}

function IsNumeric(sText)

{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;

 
   for (i = 0; i < sText.length && IsNumber == true; i++) 
      { 
      Char = sText.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
         IsNumber = false;
         }
      }
   return IsNumber;
   
   }
   
function test()
{
        var pageNr = validation(document.frm.f1.value) + validation(document.frm.f2.value) + validation(document.frm.f3.value) + validation(document.frm.f4.value);
	var level = validation(document.frm.level.value);
        var pageCheck = IsNumeric(pageNr);
        
        if(pageCheck == false) {
            document.getElementById("feedback").innerHTML = "You my only use numbers here!";
        } else {
        http.onreadystatechange = function()
	{
		if(http.readyState == 4 && http.status==200) {
                    toggleDivName(http.responseText);
                } else { document.getElementById("feedback").innerHTML = "The pagenumbers don't match!" };    
                    
		
	}
	http.open('GET', '../../libs/php/whatever.php?pageNr='+pageNr+'&level='+level, true);
	http.send();
        }

}
function createObject()
{
	var request_type;
	var browser = navigator.appName;
	if(browser == "Microsoft Internet Explorer")
	{
		request_type = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else
	{
		request_type = new XMLHttpRequest();
	}
	return request_type;
}

var http = createObject();

