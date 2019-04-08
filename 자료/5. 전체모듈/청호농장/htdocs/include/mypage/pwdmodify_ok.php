<?php
$pwd = $db->change($_POST['lastpwd']);
$row = $db->num("select * from member where no='$_SESSION[uno]' and pwd=password('$pwd');");
if($row == 1){
	$db->query("update","",$db->colume($_POST,"lastpwd/pwd_ok/lv"),"no='$_SESSION[uno]'");
	alert("수정되었습니다.");
	move(PAGE);
}else{
	alert("다시 입력해주세요.");
	back();
}
?>