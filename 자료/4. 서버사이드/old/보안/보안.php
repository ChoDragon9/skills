<?
//security start
function securitymysql($str){
	return mysql_real_escape_string(strip_tags($str));
}

function htmlsecurity($text){
	$text=preg_replace("!<iframe(.*?)<\/iframe>!is","",$text);
	$text=preg_replace("!<script(.*?)<\/script>!is","",$text); 
	return nl2br($text);
}
//security end

//헥스
function hex($str){
	preg_match_all("/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{1,})/",$str,$a,PREG_SET_ORDER);
	for($i=0; $i < sizeof($a); $i++){ 
		$str = str_replace($a[$i][0],hex2($a[$i][0]),$str);
	}
	return $str;
}

echo hexord("04whdydrn30@naver.com")."<br />";
echo hex2("04whdydrn30@naver.com")."<br />";
function hexord($str){ //10���� ��ȣȭ���
	for($i = 0; $i < strlen($str); $i++){
		$r .= "&#".ord($str["$i"]).";";
	}
	return $r;
}

function hex2($str){ //16���� ��ȣȭ���
	for($i = 0; $i < strlen($str); $i++){
		$r .= "&#x".bin2hex($str["$i"]).";";
	}
	return $r;
}

isset(); //변수가 비어있는 지 검사 if(isset($row)) 비어있을 때 실행
strpos($data,$find); //$data에 $find가 있는 지 검사 후 숫자번호를 반환 0부터 시작

//확장자 가져오기 
$filename = "125.txt";
$info = pathinfo($filename);
echo $info['extension']; //txt출력

//파일이름 가져오기
$filename = "../../1.jpg";
echo basename($filename);

ctype_alnum(); //문자열, 숫자, 영문만 들어 있는 지 검사
print_r(); //배열속에 있는 것을 모두 보여준다.

/*한글 정렬이 되지 않을 때 : 필드 => 보기 => binary로 수정*/
?>
링크를 걸면 기본적으로 다운로드 되는 확장자 = hwp, xls, ppt, zip, mp3, pdf