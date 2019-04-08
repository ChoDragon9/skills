<?php
$state = !empty($_POST['state']) ? $_POST['state'] : "delete";
switch($state){
	case "insert":
		sql("insert into menu set main_id='$_POST[main_id]',title='$_POST[title]',sub_id='$_POST[sub_id]',type='$_POST[type]'");
		alert("등록 되었습니다.");
	break;
	case "update":
		sql("update menu set title='$_POST[title]',sub_id='$_POST[sub_id]',type='$_POST[type]' where no='$no'");
		alert("수정 되었습니다.");
	break;
	case "delete":
		sql("delete from menu where no='$no' limit 1");
		alert("삭제 되었습니다.");
	break;
}
move(PAGE);
?>