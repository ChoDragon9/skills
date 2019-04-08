function valchk(id){
	var arr = id.split(",");
	var isok = true;
	for(i = 0; i < arr.length; i++){
		var ele = selectid(arr[i]);
		if(ele.value == ""){
			ele.style.background = "#fffabc";
			isok = false;
		}else{
			ele.style.background = "";
		}
		if(i == arr.length-1){
			if(!isok){
				alert("정확히 입력해주세요.");
			}
			return isok;
		}
	}
}

function regchk(id,type){
	var emailreg = new RegExp(/^([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+[\.]{1,1}[a-z]+)$/);
	var numreg = new RegExp(/^([0-9]{9,11})$/);
	var num2reg = new RegExp(/^([0-9]+)$/);
	var engnumreg = new RegExp(/^([0-9a-zA-Z]+)$/);
	var ele = selectid(id);
	switch(type){
		case "email":
			if(emailreg.test(ele.value) == false){
				alert("이메일형식으로 입력해주세요.");
				ele.style.background = "#fffabc";
				return false;
			}else{
				ele.style.background = "";
			}
		break;
		case "num":
			if(numreg.test(ele.value) == false){
				alert("숫자로 9~11자로 입력해주세요.");
				ele.style.background = "#fffabc";
				return false;
			}else{
				ele.style.background = "";
			}
		break;
	}
	return true;
}

function frmchk(frm){
	switch(frm){
		case "join_frm":
			isok = valchk('email,pwd,name,home');
			if(!isok){
				return false;
			}else{
				if(!regchk("email","email")){return false;}
				if(!regchk("home","num")){return false;}
			}
		break;
	}
}