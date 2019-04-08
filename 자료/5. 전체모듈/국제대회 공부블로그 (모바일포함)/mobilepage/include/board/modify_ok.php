<?php
include("../config.php");
include("../lib.php");

if(empty($_SESSION['ulv'])){
	move("/");
	exit;
}

include("../header.php");

$name = escape($_POST['name']);
$content = escape($_POST['content']);
$subject = escape($_POST['subject']);

$content = preg_replace("/[[:space:]]/","&nbsp;",$content);

if($subject != ""){
	sql("update board set sub_id='$name',subject='$subject',content='$content' where no='$no'");
	move("/mobilepage/include/board/view.php?no=".$no);
}else{
	move("/mobilepage/include/board/modify.php?no=".$no);
}

?>