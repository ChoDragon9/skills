<?php
$id = $db->change($_POST['id']);
$pwd = $db->change($_POST['pwd']);
$row = $db->num("select * from member where id='$id' and pwd=password('$pwd')");
if($row > 0){
	$row = $db->fetarr("select * from member where id='$id' and pwd=password('$pwd')");
	$_SESSION['ulv'] = $row['lv'];
	$_SESSION['uname'] = $row['name'];
	$_SESSION['uphone'] = $row['phone'];
	$_SESSION['uhome'] = $row['home'];
	$_SESSION['uno'] = $row['no'];
	$_SESSION['uaddress'] = $row['address']." ".$row['address2'];
	alert("�α��� �Ǿ����ϴ�.");
	if($_POST['move']){
		move($_POST['move']);
	}else{
		move("/");
	}
}else{
	alert("�ٽ� �Է����ּ���");
	move(PAGE);
}
?>