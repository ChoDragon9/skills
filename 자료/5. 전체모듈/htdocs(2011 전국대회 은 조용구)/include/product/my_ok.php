<?
$ordercode = change($_POST[ordercode]);
if($ordercode){
	$row = fetch("select * from orderlist where ordercode='$ordercode'");
	if($row[no]){
		$_SESSION[ordercode] = $row[ordercode];
		move(PAGE."/my");
	}else{
	alert("주문번호를 정확히 입력해주세요");
	back();
	}
}else{
	alert("주문번호를 정확히 입력해주세요");
	back();
}
?>