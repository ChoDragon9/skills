<?
$ordercode = change($_POST[ordercode]);
if($ordercode){
	$row = fetch("select * from orderlist where ordercode='$ordercode'");
	if($row[no]){
		$_SESSION[ordercode] = $row[ordercode];
		move(PAGE."/my");
	}else{
	alert("�ֹ���ȣ�� ��Ȯ�� �Է����ּ���");
	back();
	}
}else{
	alert("�ֹ���ȣ�� ��Ȯ�� �Է����ּ���");
	back();
}
?>