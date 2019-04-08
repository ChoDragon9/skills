<?php
if($_SESSION['token'] != $_POST['token']){
	alert("권한이 없습니다.");
	move("/");
	exit;
}
if($_SESSION['uno'] and $_POST['name'] and $_POST['pronum'] and $_POST['num'] and $_POST['basketno'] and $_POST['phone'] and $_POST['home'] and $_POST['address'] and $_POST['address2']){
	$basketarr = explode(",",$_POST['basketno']);
	for($i = 0; $i < sizeof($basketarr); $i++){
		$db->query("delete","basket","","no=".$basketarr["$i"]);
	}
	$db->query("insert","buy",$db->colume($_POST,"basketno/token").", wdate=now(),state='주문완료',memnum='$_SESSION[uno]'");
	alert("주문되었습니다.");
 move("/mypage/orderlist");
}else{
	alert("잘못된 접근입니다.");
	move("/");
}
?>