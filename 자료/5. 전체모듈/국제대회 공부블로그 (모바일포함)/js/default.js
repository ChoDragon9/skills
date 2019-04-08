//Move Start
function move(str){
	location.replace(str);
}

function back(){
	history.back();
}
//Move End

//select id Start
function selectid(id){
	return document.getElementById(id);
}
//select id Start

//Textarea 에서 tab사용하기 Start

$(function(){
	$("textarea").keydown(function(){
		if(event.keyCode == 9){
			return false;
		}
	});
});

//Textarea 에서 tab사용하기 End