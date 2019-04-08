<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Clean URL</title>
</head>
<body>
<?php
/* Clean URL

1) .htaccess 파일을 만들어 준다. 파일속에는 

RewriteEngine on
RewriteRule ^([^.]+)/?$ index.php?param=$1 [L]

이것을 써주면 된다.

2) 127.0.0.1 or localhost 뒤에 /test를 붙이고
echo $_GET['param']; 를 해준다. 그럼
test 만 출력이 될것이다. 하지만!!
/test를 붙지 않을 때 Notice: Undefined index: param in C:\xampp\htdocs\index.php
에러가 날것이다.
그 이유는 초기에는 param이 없기 때문이다. 그래서 isset()로 변수가 있나 확인을 해줘야 한다.

3) 이젠 에러도 않나고 잘 될것이다. 지방,전국대회 프로그램 짤때 URL의 자리가 /main/sub/type/no 로 보통 변수를 만들어 사용할 것이다.
$arr = explode("/",$_GET['param']);  explode(구분자,배열) =>구분자로 끊어서 배열로 저장해줌
$main_id = $arr['0'];
$sub_id = $arr['1'];
$type = $arr['2'];
$no = $arr['3'];
이렇게 하면 되겠지라고 몇몇 학생들은 생각할 것이다. 하지만 만약에 /test 밖에 없다면 $arr['1'],['2'],['3']은 없기 때문에 또 에러가 난다.

4) 해결방법을 foreach와 array를 이용하는 것이다.

$arr = explode("/",$_GET['param']);
$menuarr = array("main_id","sub_id","type","no"); //본인이 원하는 이름들을 차례대로 저장한다.
foreach($arr as $key=>$val){ //foreach를 사용하여 key와 value를 가져온다.
	$$menuarr["$key"] = $val;
}
$key를 0부터 시작할 것이고, $menuarr도 0부터 저장되어 있다. 만약에 $key가 0이면
$$menuarr['0'] 는 곧 $main_id가 되는 것이다. 좀 더 자세히 설명하면 $menuarr['0']는 main_id고 그 뒤에 $를 붙은 것이다.
이렇게 하게 되면 하나씩 써 줄 필요 없이 $menuarr에 추가만 하면되고,
foreach를 배열에 있는 값이 끝까지 출력할 때까지 반복하므로 에러가 나지 않는 다.

5) 나머지는 아래 소스를 통해 이해하기 바랍니다.

*/

//Mysql Function
mysql_connect("localhost","root","germany");
mysql_select_db("db");

function sql($sql){
	return mysql_query($sql);
}

function fetch($res){
	return mysql_fetch_array($res);
}

function fetarr($sql){
	$res = sql($sql);
	return fetch($res);
}

//Clean URL Plus Get Title
if(isset($_GET['param'])){
	$arr = explode("/",$_GET['param']);
	$menuarr = array("main_id","sub_id","type","no");
	foreach($arr as $key=>$val){
		$$menuarr["$key"] = $val;
	}

	if(isset($main_id) and isset($sub_id)){
		$mdt = fetarr("select * from menu where type='main' and main_id='$main_id'");
		$sdt = fetarr("select * from menu where type!='main' and main_id='$main_id' and sub_id='$sub_id'");

		if(isset($mdt) and isset($sdt)){ //DB에 잘못 저장됬을 때를 대비해서 둘다체크
			$title = "Home / ".$mdt['title']." / ".$sdt['title'];
		}else{
			$title = "홈페이지를 방문해주셔서 감사합니다.";
		}
	}
}
/*
여기서 더 깊게 들어가면
주소창에 /main/sub/type/no/etc 이런식으로 $menuarr에 있는 수를 넘어버리면 에러가 난다.
대회에서 이런 체크를 하지 않겠지만 이럴때는 
for($i = 0, $j = 0; $i < sizeof($menuarr) && $j < sizeof($arr); $i++, $j++){
	$$menuarr["$i"] = $arr["$i"];
}
for문을 사용해서 어느 한쪽도 초과가 되지 않게 하는 것이다.
*/
?>
</body>
</html>