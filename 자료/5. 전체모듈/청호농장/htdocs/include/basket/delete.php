<?php
$row = $db->num("select * from basket where no='$no' and memnum='$_SESSION[uno]'");
if($row == 1){
	$row = $db->fetarr("select * from basket where no='$no'");
	$db->query("update","product","nownum=nownum+$row[number]","no='$row[pronum]'");
	$db->query("delete","basket","","no='$no' and memnum='$_SESSION[uno]'");
	alert("���� �Ǿ����ϴ�.");
	move(PAGE);
}else{
	alert("�߸��� �����Դϴ�.");
	move("/");
}
?>