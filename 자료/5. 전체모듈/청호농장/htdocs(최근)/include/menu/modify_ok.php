<?php
if($_POST['no'] and $_POST['content']){
	$no = $_POST['no'];
	$content = $db->change($_POST['content']);
	$row = $db->fetarr("select * from menu where no='$no'");
	$db->query("update","","content='$content'","no='$no'");
	alert("수정되었습니다.");
	move(PAGE."/view/".$row['main_id']);
}else{
	alert("잘못된 접근입니다.");
	session_destroy();
	move("/");
}
?>