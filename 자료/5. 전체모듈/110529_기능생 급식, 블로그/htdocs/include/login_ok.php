<?
$id = change($_POST[id]);
$pwd = change($_POST[pwd]);
if(empty($id) || empty($pwd)){
	alert("정확히 입력을 해주세요!");
	move($url);
}else{
	$row=fetch("select * from member where id='$id' && pwd=password('$pwd')");
	if($row){
		$_SESSION[name] = $row[name];
		$_SESSION[lv] = $row[lv];
		move($url."/page/index.php");
	}else{
		alert("회원이 아니십니다.");
		move($url);
	}
}
?>