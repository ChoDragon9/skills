<?php
if($_POST['num'] and $_POST['state']){
	$num = $db->change($_POST['num']);
	$state = $db->change($_POST['state']);
	$db->query("update","","state='".$state."'","no=".$num);
	alert("수정되었습니다.");
	move(PAGE);
}else{
	alert("잘못된 접근입니다.");
	session_destroy();
	move("/");
}
?>