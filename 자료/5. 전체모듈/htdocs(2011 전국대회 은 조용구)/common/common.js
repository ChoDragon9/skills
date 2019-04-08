//flash_start
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
//flash_end

//main menu display_start
function dis(id,total){
	for(i = 1; i <= total; i++){
		if(id == i){
			document.getElementById("dis"+i).style.display= "inline";
		}else{
			document.getElementById("dis"+i).style.display= "none";
		}
	}
}
//main menu display_end

//fontsize_start
size = 0.7;
function resize(s){
	if(s == 0.7){
		size = 0.7; 
		document.getElementById("con_area").style.fontSize = size + "em";
	}else{
		size = size + s;
		document.getElementById("con_area").style.fontSize = size + "em";
	}
}
//fontsize_end
//page_start
function page(i){
	document.getElementById("page_num").value = i;
	document.getElementById("frm").submit();
}
function page2(i){
	document.getElementById("page_num2").value = i;
	document.getElementById("frm").submit();
}
//page_end
//onlynum_start
function onlynum(){
	if(event.keyCode < 47 || event.keyCode > 58){
		return false;
	}
}
//onlynum_end
//yunsan_start
function yunsan(){
	 document.getElementById("total").value =  document.getElementById("num").value * document.getElementById("price").value;
}
function yunsan2(num){
	 document.getElementById("total"+num).value =  document.getElementById("num"+num).value * document.getElementById("price"+num).value;
}
//yunsan_end
//plu_start
function plu(type){
	if(type == "+"){
		var num =document.getElementById("num").value;
		num = parseInt(num);
		document.getElementById("num").value = num + 1;
	}else if(type == "-"){
		var num =document.getElementById("num").value;
		if(num == 1){
			num = 1;
		}else{
			num = num - 1;
		}
		document.getElementById("num").value = num;
	}
	
	 document.getElementById("total").value =  document.getElementById("num").value * document.getElementById("price").value;
}
function plu2(type,n){
	if(type == "+"){
		var num =document.getElementById("num"+n).value;
		num = parseInt(num);
		document.getElementById("num"+n).value = num + 1;
	}else if(type == "-"){
		var num =document.getElementById("num"+n).value;
		if(num == 1){
			num = 1;
		}else{
			num = num - 1;
		}
		document.getElementById("num"+n).value = num;
	}
	
	 document.getElementById("total"+n).value =  document.getElementById("num"+n).value * document.getElementById("price"+n).value;
}
//plu_end
//basket_start
function bas(){
	document.getElementById("total").value;
	document.getElementById("num").value;
	document.getElementById("procode").value;
	document.getElementById("basket").value = 2;
	document.getElementById("frm").submit();
}
//basket_end
//basketsubmit_start
function basketsubmit(no){
	document.getElementById("total").value = document.getElementById("total"+no).value;
	document.getElementById("num").value = document.getElementById("num"+no).value;
	document.getElementById("procode").value = document.getElementById("procode"+no).value;
	document.getElementById("number").value = document.getElementById("number"+no).value;
	document.getElementById("frm").submit();
}
//basketsubmit_end
//formchk_start
function chk(){
	var isok = true;
	var address = document.getElementById("address").value;
	if(address == ""){
		isok = false;
		document.getElementById("address").style.backgroundColor = "#fffabc";
		document.getElementById("hlt_address").style.backgroundColor = "#fffabc";
	}else{
		document.getElementById("address").style.backgroundColor = "#fff";
		document.getElementById("hlt_address").style.backgroundColor = "#fff";
	}
	var phone = document.getElementById("phone").value;
	if(phone == ""){
		isok = false;
		document.getElementById("phone").style.backgroundColor = "#fffabc";
		document.getElementById("hlt_phone").style.backgroundColor = "#fffabc";
	}else{
		document.getElementById("phone").style.backgroundColor = "#fff";
		document.getElementById("hlt_phone").style.backgroundColor = "#fff";
	}
	if(!isok){
		alert("필수 입력사항을 모두입력해주세요.");
	}
	return isok;
}
//formchk_end