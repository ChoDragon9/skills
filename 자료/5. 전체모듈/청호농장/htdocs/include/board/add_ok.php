<?php
$db->table = "board";
$state = $_POST['state'] == "" ? "delete" : $_POST['state'];
switch($state){
	case "insert":
		$_POST['main_id'] = $main_id;
		$_POST['sub_id'] = $sub_id;
		$_POST['name'] = $_SESSION['uno'];
		$db->query("insert","",$db->colume($_POST,"/state").",wdate=now()");
		alert("��ϵǾ����ϴ�.");
		move(PAGE);
	break;
	case "update":
		$db->query("update","",$db->colume($_POST,"/state"),"no='$no'");
		alert("�����Ǿ����ϴ�.");
		move(PAGE."/view/".$no);
	break;
	case "delete":
		$db->query("delete","board","","no='$no'");
		alert("�����Ǿ����ϴ�.");
		move(PAGE);
	break;
	default:
		alert("�߸��� �����Դϴ�.");
		move("/");
	break;
}
?>