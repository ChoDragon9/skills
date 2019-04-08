<?php
foreach($_POST as $key => $val){
	$$key = $val;
}
if($_SESSION['token'] != $_POST['token']){
	alert("잘못된 접근입니다.");
	move("/");
	exit;
}else if(empty($id) or empty($pwd) or empty($pwd_ok) or empty($name) or empty($phone) or empty($address1) or empty($address2) or empty($u1) or empty($u2)){
	alert("정확히 입력해주세요.");
	back();
	exit;
}
$id = $db->change($_POST['id']);
$row = $db->num("select * from member where id='$id'");
if($row > 0){
	alert("이미 가입된 아이디입니다.");
	back();
}else{
	$db->query("insert","member",$db->colume($_POST,"pwd_ok").",lv='1'","");
	alert("가입되었습니다.");
	move("/");
}
?>