/* jQuery UI ---------------------------------------------------------------- */

/* Interactions */
$( "#draggable" ).draggable();
$( "#droppable" ).droppable();
$( "#resizable" ).resizable();
$( "#selectable" ).selectable();
//.ui-selecting { background: #FECA40; }    
//.ui-selected { background: #F39814; color: white; }
$( "#sortable" ).sortable();
$( "#sortable" ).disableSelection();

/* Widgets */
$( "#accordion" ).accordion(); //Heading h3 and Content div
$( "#tags" ).autocomplete({ //Input
	source: availableTags //['txt1',txt2']
});
$( "input[type=submit], a, button" ).button(); //버튼으로 만들어줌
//event.preventDefault(); href, onclick etc 할수 없게
$( "#datepicker" ).datepicker(); //Input
$( "#dialog" ).dialog(); //Div At att Title is Subject
$( "#menu" ).menu(); //Common Menu
//.ui-menu { width: 150px; }  class="ui-state-disabled"
$( "#progressbar" ).progressbar({
	value: 37
});
$( "#slider" ).slider();
$( "#spinner" ).spinner();
$( "#tabs" ).tabs();
/*
<ul><li><a href="#tab-1">Tab</a></li></ul>
<div id="tab-1"><p>Content</p></div>
*/
$( document ).tooltip(); //At attr Title

/* Effects */ // class="ui-corner-all"이것을 써줘야 부드럽게 됨
$("#effect").addClass("newClass",1000,callback);
$("#effect").removeClass("newClass",1000,callback);
$("#effect").switchClass("NowClass","ChangeClass",1000);
$("#effect").toggleClass("NewClass",1000);

$("#effect").effect("Effect Name",option,1000,callback);
$("#effect").hide("Effect Name",option,1000,callback);
$("#effect").show("Effect Name",option,1000,callback);
$("#effect").toggle("Effect Name",option,1000);
/*
Effect Name = blind, bounce, clip, drop, explode, fade, fold, highlight, puff, pulsate, scale, shake, size, slide, Transfer
option={};
IF scale { percent : 0 }
IF size { to : { width:100, height:100 } }
*/