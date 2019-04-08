<?php
$db->table = "board";
$state = $_POST['state'] == "" ? "delete" : $_POST['state'];
switch($state){
	case "insert":
		$_POST['main_id'] = $main_id;
		$_POST['sub_id'] = $sub_id;
		$_POST['name'] = $_SESSION['uno'];
		$db->query("insert","",$db->colume($_POST,"/state").",wdate=now()");
		alert("등록되었습니다.");
		move(PAGE);
	break;
	case "update":
		$db->query("update","",$db->colume($_POST,"/state"),"no='$no'");
		alert("수정되었습니다.");
		move(PAGE."/view/".$no);
	break;
	case "delete":
		$db->query("delete","board","","no='$no'");
		alert("삭제되었습니다.");
		move(PAGE);
	break;
	default:
		alert("잘못된 접근입니다.");
		move("/");
	break;
}
?>