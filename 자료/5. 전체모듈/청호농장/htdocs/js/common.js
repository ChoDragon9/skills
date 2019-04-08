/* display menu start
------------------------------------------------*/

function dismenu(id,total){
	for(i = 1; i <= total; i++){
		if(id == i){
			$("#sub"+i).show();
		}else{
			$("#sub"+i).hide();
		}
	}
}

/*
hide(); hidden
show inline;
fadeIn ���������鼭 ������
fadeOut ���������鼭 �����
*/

/* display menu end
------------------------------------------------*/

/* move start
------------------------------------------------*/

function move(str){
	location.replace(str);
}

function back(){
	history.back();
}

/* move end
------------------------------------------------*/

/* selectid start
------------------------------------------------*/

function selectid(id){
	return document.getElementById(id);
}

/* selectid end
------------------------------------------------*/

/* login start
------------------------------------------------*/
function login_move(){
	selectid("login_frm").submit();
}
/* login end
------------------------------------------------*/

/* Animation start
------------------------------------------------*/

function mainani(){
	selectid("menubg").top = 25;
	var toppx = selectid("menubg").top;
	var i = 1;
	setInterval(function(){
		$("#mani"+i).fadeOut(1000);
		if(toppx == 185){
			i = 1;
			toppx = 25;
		}else{
			i++;
			toppx = toppx + 40;
		}
		$("#mani"+i).fadeIn(1000);
		$("#menubg").animate({top:toppx+"px"},"slow");
	},3000);
}

function subani(){
	var i = 1;
	setInterval(function(){
		$("#sani"+i).fadeOut(1000);
		if(i == 5){
			i = 1;
		}else{
			i++;
		}
		$("#sani"+i).fadeIn(1000);
	},3000);
}

/* Animation end
------------------------------------------------*/

/* Form chk start
------------------------------------------------*/

function valchk(id){
	var isok = true;
	var arr = id.split(",");
	for(i = 0; i < arr.length; i++){
		var ele = selectid(arr[i]);
		if(ele.value == ""){
			isok = false;
			ele.style.background = "#fffabc";
		}else{
			ele.style.background = "";
		}
		
		if(i == arr.length-1){
			if(!isok){
				alert("��Ȯ�� �Է����ּ���.");
				return false;
			}
			return true;
		}
	}
}

function regchk(id,type){
	switch(type){
		case "num":
			reg = new RegExp(/^([0-9]{11,12})$/);
			msg = "���ڷθ� �Է����ּ���.";
		break;
		case "num2":
			reg = new RegExp(/^([0-9]+)$/);
			msg = "���ڷθ� �Է����ּ���.";
		break;
		case "id":
			reg = new RegExp(/^([0-9a-zA-Z]{4,})$/);
			msg = "���̵�� �ּ� ����, ����4���ڷ� ���ּ���.";
		break;
	}
	if(reg.test(selectid(id).value) == false){
		alert(msg);
		selectid(id).style.background = "#fffabc";
		return false;
	}else{
		selectid(id).style.background = "#fff";
		return true;
	}
}

function frmchk(frm){
	switch(frm){
		case "search":
			isok = valchk("schText");
			if(!isok){
				return isok;
			}else{
				if(selectid("schText").value.length < 2 ){
					alert("�˻���� �ּ� �α��ڸ� �Է����ּ���.");
					selectid("schText").style.background = "#fffabc";
					return false;
				}
			}
		break;
		case "join":
			selectid("home").style.background = "";
			isok = valchk("name,phone,address,address2");
			if(!isok){
				return isok;
			}else{
				if(selectid("home").value != ''){
					if(!regchk("home","num2")){return false;}
				}
				if(!regchk("phone","num2")){return false;}
			}
		break;
		case "join_login":
			isok = valchk("id,pwd,pwd_ok");
		if(!isok){
			return isok;
		}else{
			if(!regchk("id","id")){return false;}
			if(selectid("pwd").value != selectid("pwd_ok").value){
				alert("�н����带 Ȯ�����ּ���.");
				selectid("pwd").style.background = "#fffabc";
				selectid("pwd_ok").style.background = "#fffabc";
				return false;
			}
		}
		break;
		case "pwd":
			isok = valchk("lastpwd,pwd,pwd_ok");
			if(!isok){
				return isok;
			}else{
				if(selectid("pwd").value != selectid("pwd_ok").value){
					alert("�н����带 Ȯ�����ּ���.");
					selectid("pwd").style.background = "#fffabc";
					selectid("pwd_ok").style.background = "#fffabc";
					return false;
				}
			}
		break;
		case "product":
			isok = valchk('name,price,size,nownum,unit,intro,wfile');
			if(!isok){
				return isok;
			}else{
				if(!regchk("price","num2")){return false;}
				if(!regchk("nownum","num2")){return false;}
			}
		break;
		case "buy":
			isok = valchk("num");
		if(!isok){
			return isok;
		}else{
			if(!regchk("num","num2")){return false;}
			if(parseInt(selectid("num").value) > parseInt(selectid("nownum").value)){
				alert("������ ���� ������ �ʰ��߽��ϴ�.");
				selectid("num").style.background = "#fffabc";
				selectid("num").focus();
				return false;
			}
		}
		break;
		case "buy_ok":
			isok = valchk("name,home,phone,address,address2");
			if(!isok){
				return false;
			}else{
				if(!regchk("phone","num")){return false;}
			}
		break;
	}
}

/* Form chk end
------------------------------------------------*/

/* page start
------------------------------------------------*/
function page(i){
	selectid("page_num").value = i;
	selectid("frm").submit();
}
/* page end
------------------------------------------------*/

/* basket start
------------------------------------------------*/
function bastotalchk(total){
	for(i = total; i >= 1; i--){
		if(selectid("totalchk").checked == true){
			selectid("chk"+i).checked = true;
		}else{
			selectid("chk"+i).checked = false;
		}
	}
	bastotal(total);
}

function bastotalprice(num){
	selectid("chk"+num).checked = true;
	var max = parseInt(selectid("max"+num).value);
	var val = selectid("num"+num).value;
	var reg = new RegExp(/^([0-9]+)$/);
	if(reg.test(val) == true){
		if(max < parseInt(val)){
			alert("������ �ʰ��߽��ϴ�.");
			selectid("num"+num).value = max;
		}
	}else{
		alert("���ڷθ� �Է����ּ���.");
		selectid("num"+num).style.background = "#fffabc";
		selectid("num"+num).value = 0;
	}
}

function bastotal(total){
	var totalprice = 0;
	var chk = 0;
	for(i = total; i >= 1; i--){
		if(selectid("chk"+i).checked == true){
			price = selectid("price"+i);
			num = selectid("num"+i);
			totalprice += parseInt(price.value) * parseInt(num.value);
			chk++;
		}
	}
	if(!chk){
		selectid("totalchk").checked = false;
	}else if(chk == total){
		selectid("totalchk").checked = true;
	}
	selectid("totalprice").innerHTML = "�� �ֹ� �ݾ� : "+totalprice+" ��";
	selectid("baskettotalprice").value = totalprice;
}

function bassubmit(total){
	if(selectid('baskettotalprice').value == ''){
		alert('��ǰ�� ������ �ּ���.'); 
		return false;
	}else{
		var basketnum = 0;
		var basketno = 0;
		var prono = 0;
		for(i = 1; i <= total; i++){
			if(selectid("chk"+i).checked == true){
				basketnum += ","+selectid("num"+i).value;
				prono += ","+selectid("no"+i).value;
				basketno += ","+selectid("basketno"+i).value;
			}
		}
		selectid("basketnum").value = basketnum;
		selectid("basketno").value = basketno;
		selectid("prono").value = prono;
		selectid('basket').submit();
	}
}
/* basket end
------------------------------------------------*/

/* basket submit start
------------------------------------------------*/
function basketsubmit(){
	var num = parseInt(selectid("num").value);
	if(num >= 1){
		var nownum = parseInt(selectid('nownum').value);
		if(num > nownum){ //���� ������ �ʰ� �Ͽ��� ��
			alert('���� ������ �ʰ� �Ͽ����ϴ�.');
			selectid('num').style.background = "#fffabc";
			return false;
		}else{
			selectid('number').value=num;
			selectid('basket').submit();
		}
	}else{ //������ ���ڷ� �Է��� ���� �ʾ��� ��
		alert('������ �߸� �ԷµǾ����ϴ�.');
		selectid('num').style.background = "#fffabc";
		return false;
	}
}
/* basket submit end
------------------------------------------------*/