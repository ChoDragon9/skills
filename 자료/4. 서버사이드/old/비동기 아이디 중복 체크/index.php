<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AJAX 아이디 중복체크</title>
<style type="text/css">
#login { width:400px; margin:100px auto 0; }
#login fieldset { padding:20px 50px 20px; }
#chk { width:100%; height:20px; margin-top:5px; font-size:11px; font-weight:bold; }
</style>
<script type="text/javascript">
function selectid(id){
	return document.getElementById(id);
}
//송신, 수신
function sendRequest(){
	xmlHttp = new XMLHttpRequest(); //객체 생성
	xmlHttp.open("GET","loginchk.php?id="+selectid("id").value+"&dum="+Math.random(),true);
	//open('GET or POST','URL','ture는 비동기화, false는 동기화'); -> 전송방식 설정 및 전송준비
	xmlHttp.onreadystatechange = getResponseText;
	//통신상태가 변하면 생기는 이벤트 핸들러
	xmlHttp.send(null);
}

//값을 가져옴
function getResponseText(){
	var chk = selectid("chk");
	if(xmlHttp.readyState == 4){ //수신완료
		if(xmlHttp.status == 200){ //서버의 상태
			chk.innerHTML = xmlHttp.responseText;
		}else{ //페이지를 찾지 못했을 때 404
			chk.innerHTML = 'HTTP상태가 불안정합니다.';
		}
	}else{
		chk.innerHTML = '수신이 불안정합니다.';
	}
}
</script>
</head>
<body>
<div id="login">
<form action="" method="post">
	<fieldset>
		<legend>회원가입</legend>
		<label for="id">아이디</label>
		<input type="text" name="id" id="id" onkeyup="sendRequest();" />
		<div id="chk"></div>
	</fieldset>
</form>
</div>
</body>
</html>