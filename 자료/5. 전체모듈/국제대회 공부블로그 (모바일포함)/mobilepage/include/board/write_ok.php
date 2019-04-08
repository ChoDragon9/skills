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
	sql("insert into board set sub_id='$name',subject='$subject',content='$content',wdate=now()");
	$row = fetarr("select no from board where sub_id='$name' and subject='$subject' and content='$content'");
	move("/mobilepage/include/board/view.php?no=".$row['no']);
}else{
	move("/mobilepage/include/board/write.php?sub_id=".$name);
}

?>