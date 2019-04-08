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

//XMLHttpRequest object create start

function sendRequest(url){
	xmlHttp = new XMLHttpRequest();
	var url = "/include/comment/"+url+"&dum="+Math.random();
	xmlHttp.open("GET",url,true);
	xmlHttp.onreadystatechange = getResponseText;
	xmlHttp.send(null); 
}
//�������� ���� ������
function getResponseText(){
	if(xmlHttp.readyState == 4 && xmlHttp.status == 200){ //������ ����
		var comment = selectid("comment");
		var commentText = xmlHttp.responseText;
		if(commentText) comment.innerHTML = unescape(commentText); 
		//DB�� escape�� �����̱� ������ unescape�� �ٽ� �ٲ��ش�.
	}
}

function comadd(){
	if(selectid("name").value == "" || selectid("content").value == ""){

		alert("����Է����ּ���");
		selectid("name").style.background = "#fffabc";
		selectid("content").style.background = "#fffabc";

	}else{

		selectid("name").style.background = "#fff";
		selectid("content").style.background = "#fff";

		var name = escape(selectid("name").value); // �ѱ��� ���� ���ؼ��� escape�� ���ڵ��� �ؼ� DB�� ��ƾ� �Ѵ�.
		var content = escape(selectid("content").value);
		var boardnum = selectid("boardnum").value;

		selectid("name").value = "";
		selectid("content").value = "";
		
		sendRequest("add.php?name="+name+"&content="+content+"&boardnum="+boardnum);
	}
}

//XMLHttpRequest object create end