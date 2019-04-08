<?php
if($_SESSION['token'] != $_POST['token']){
	alert("잘못된 접근입니다.");
	move("/");
	exit;
}
if($_SESSION['uno'] and $_POST['name'] and $_POST['pronum'] and $_POST['num'] and $_POST['phone'] and $_POST['home'] and $_POST['address'] and $_POST['address2']){
	$db->query("insert","buy",$db->colume($_POST,'token').", wdate=now(),state='주문완료',memnum='$_SESSION[uno]'");
	$db->query("update","product","nownum = nownum-$_POST[num]","no='$_POST[pronum]'");
	alert("주문되었습니다.");
	move("/mypage/orderlist");
}else{
	alert("잘못된 접근입니다.");
	move("/");
}
?>