<?php
$state = !empty($_POST['state']) ? $_POST['state'] : "delete";
switch($state){
	case "insert":
		sql("insert into menu set main_id='$_POST[main_id]',title='$_POST[title]',type='main',hd='1'");
		alert("등록 되었습니다.");
	break;
	case "update":
		sql("update menu set main_id='$_POST[main_id]',title='$_POST[title]' where no='$no' limit 1");
		alert("수정 되었습니다.");
	break;
	case "delete":
		$row = fetarr("select * from menu where no='$no'");
		sql("delete from menu where main_id='$row[main_id]' limit 1");
		alert("삭제 되었습니다.");
	break;
}
move(PAGE);
?>