<?php
if($_POST['num'] and $_POST['state']){
	$num = $db->change($_POST['num']);
	$state = $db->change($_POST['state']);
	$db->query("update","","state='".$state."'","no=".$num);
	alert("�����Ǿ����ϴ�.");
	move(PAGE);
}else{
	alert("�߸��� �����Դϴ�.");
	session_destroy();
	move("/");
}
?>