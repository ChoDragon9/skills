<?php
if($_POST['no'] and $_POST['content']){
	$no = $_POST['no'];
	$content = $db->change($_POST['content']);
	$row = $db->fetarr("select * from menu where no='$no'");
	$db->query("update","","content='$content'","no='$no'");
	alert("�����Ǿ����ϴ�.");
	move(PAGE."/view/".$row['main_id']);
}else{
	alert("�߸��� �����Դϴ�.");
	session_destroy();
	move("/");
}
?>