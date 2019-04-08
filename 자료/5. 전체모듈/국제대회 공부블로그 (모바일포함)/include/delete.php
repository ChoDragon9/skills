<?php
if(empty($type) or !defined("IN_SITE") or empty($_SESSION['ulv'])){
	move("/");
	exit;
}
$row = fetarr("select sub_id,no from board where no='$type'");
if($row){
	sql("delete from board where no='$type'");
	alert("삭제 되었습니다.");
	move("/".$row['sub_id']);
}else{
	alert("잘못된 접근입니다.");
	move("/");
}
?>