function fla(url,w,h,id){
	var fla=('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="'+w+'" height="'+h+'" id="'+id+'" align="middle">'+
	'<param name="allowScriptAccess" value="sameDomain" />'+
	'<param name="allowFullScreen" value="false" />'+
	'<param name="movie" value="'+url+'" />'+
	'<param name="quality" value="high" />'+
	'<param name="wmode" value="transparent" />'+
	'<param name="bgcolor" value="#ffffff" />'+
	'<embed src="'+url+'" quality="high" wmode="transparent" bgcolor="#ffffff" width="'+w+'" height="'+h+'" name="'+id+'" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />'+
	'</object>');
	document.write(fla);
}

function page(i){
	document.getElementById("page_num").value = i;
	document.getElementById("page").submit();
}

function page1(i){
	document.getElementById("page_num1").value = i;
	document.getElementById("page1").submit();
}

function page2(i){
	document.getElementById("page_num2").value = i;
	document.getElementById("page2").submit();
}

function chk(){
	var isok = true;
	var main_id = document.getElementById("main_id").value;
	if(main_id == ""){
		isok = false;
		document.getElementById("main_id").style.bakcgroundColor = "#0f0";
	}else{
		document.getElementById("main_id").style.bakcgroundColor = "#0ff";
	}
	var subject = document.getElementById("subject").value;
	if(subject == ""){
		isok = false;
		document.getElementById("subject").style.bakcgroundColor = "#0f0";
	}else{
		document.getElementById("subject").style.bakcgroundColor = "#0ff";
	}
	var con = document.getElementById("con").value;
	if(con == ""){
		isok = false;
		document.getElementById("con").style.bakcgroundColor = "#0f0";
	}else{
		document.getElementById("con").style.bakcgroundColor = "#0ff";
	}
	var tags = document.getElementById("tags").value;
	if(tags == ""){
		isok = false;
		document.getElementById("tags").style.bakcgroundColor = "#0f0";
	}else{
		document.getElementById("tags").style.bakcgroundColor = "#0ff";
	}
	if(!isok){ alert("모두입력해주세요"); }
	return isok;
}

function open(m){
	if(document.getElementById(m).style.display != "none"){
		document.getElementById(m).style.display = "none";
	}else{
		document.getElementById(m).style.display = "";
	}
}

function form(){
	var isok = true;
	var schtext = document.getElementById("schtext").value;
	if(schtext == ""){
		isok = false;
	}else{
		isok = true;
	}
	if(!isok){ alert("검색어를 입력해주세요!!"); }
	return isok;
}

function cate(){
	var isok = true;
	var title = document.getElementById("title").value;
	if(title == ""){
		isok = false;
	}else{
		isok = true;
	}
	if(!isok){alert("정확히 입력을 해주세요!")};
	return isok;
}

function cate1(){
	var isok = true;
	var title = document.getElementById("title1").value;
	if(title == ""){
		isok = false;
	}else{
		isok = true;
	}
	if(!isok){alert("정확히 입력을 해주세요!")};
	return isok;
}

function submit(){
	document.getElementById("mouth").value;
	document.getElementById("cel").submit();
}

function winopen(){
	window.open("http://blog.jinzza.net","blog","");
}