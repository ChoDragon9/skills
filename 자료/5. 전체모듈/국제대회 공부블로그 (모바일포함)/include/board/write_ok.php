<?php
if(!defined("IN_SITE") or $_SESSION['token'] != $_POST['token']){
	alert("잘못된 접근입니다.");
	move("/");
	exit;
}
foreach($_POST as $key=>$val){
	$$key = escape($val);
}

$content = preg_replace("/[[:space:]]/","&nbsp;",$content);

switch($state){
	case "write":
		sql("insert into board set sub_id='$name',subject='$subject',tags='$tags',wtype='$wtype',content='$content',wdate=now()");
		alert("등록 되었습니다.");
		move("/{$name}");
	break;
	case "modify":
		sql("update board set sub_id='$name',subject='$subject',tags='$tags',wtype='$wtype',content='$content',wdate2=now() where no='$no'");
		alert("수정 되었습니다.");
		move("/{$name}");
	break;
}
?>