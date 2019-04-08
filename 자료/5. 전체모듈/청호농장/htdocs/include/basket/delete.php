<?php
$row = $db->num("select * from basket where no='$no' and memnum='$_SESSION[uno]'");
if($row == 1){
	$row = $db->fetarr("select * from basket where no='$no'");
	$db->query("update","product","nownum=nownum+$row[number]","no='$row[pronum]'");
	$db->query("delete","basket","","no='$no' and memnum='$_SESSION[uno]'");
	alert("삭제 되었습니다.");
	move(PAGE);
}else{
	alert("잘못된 접근입니다.");
	move("/");
}
?>