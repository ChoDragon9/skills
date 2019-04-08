<?
$id = change($_POST[id]);
$pwd = change($_POST[pwd]);
$row = fetch("select * from member where id='$id' and pwd=password('$pwd');");
if($row[no]){
	$_SESSION[name] = $row[name];
	$_SESSION[id] = $row[id];
	$_SESSION[lv] = $row[lv];
	move(PAGE);
}else{
	alert("다시입력해주세요.");
	move(PAGE);
}
?>