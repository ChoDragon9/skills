<?
$procode = change($no);
$num = change($_POST[num]);
$totalmoney = change($_POST[total]);
if($_POST[basket] == 2){
	sql("insert into basket values('','$_SESSION[id]','$num','$totalmoney','$procode');");
		alert("등록되었습니다.");
		move(PAGE);
}else{
if($_SESSION[name]){
	sql("insert into orderlist values('','$_SESSION[id]','$procode','$num','$totalmoney','',now())");
	alert("주문되었습니다.");
	move(PAGE);
}else{
	$str = rand(0,99999);
	$str = str_pad($str,5,0,STR_PAD_LEFT);
	sql("insert into orderlist values('','NoMember','$procode','$num','$totalmoney','$str',now())");
	alert("주문되었습니다.");
	move(PAGE."/chk/".$str);
}
}
?>