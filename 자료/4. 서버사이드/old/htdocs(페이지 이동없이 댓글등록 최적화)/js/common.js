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
//서버에서 값을 가져옴
function getResponseText(){
	if(xmlHttp.readyState == 4 && xmlHttp.status == 200){ //서버의 상태
		var comment = selectid("comment");
		var commentText = xmlHttp.responseText;
		if(commentText) comment.innerHTML = unescape(commentText); 
		//DB에 escape된 상태이기 때문에 unescape로 다시 바꿔준다.
	}
}

function comadd(){
	if(selectid("name").value == "" || selectid("content").value == ""){

		alert("모두입력해주세요");
		selectid("name").style.background = "#fffabc";
		selectid("content").style.background = "#fffabc";

	}else{

		selectid("name").style.background = "#fff";
		selectid("content").style.background = "#fff";

		var name = escape(selectid("name").value); // 한글을 쓰기 위해서는 escape로 인코딩을 해서 DB에 담아야 한다.
		var content = escape(selectid("content").value);
		var boardnum = selectid("boardnum").value;

		selectid("name").value = "";
		selectid("content").value = "";
		
		sendRequest("add.php?name="+name+"&content="+content+"&boardnum="+boardnum);
	}
}

//XMLHttpRequest object create end