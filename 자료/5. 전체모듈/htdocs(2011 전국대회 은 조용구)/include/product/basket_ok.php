<?
$procode = change($_POST[procode]);
$num = change($_POST[num]);
$totalmoney = change($_POST[total]);
sql("insert into orderlist values('','$_SESSION[id]','$procode','$num','$totalmoney','',now())");
sql("delete from basket where no='$_POST[number]'");
alert("주문되었습니다.");
move(PAGE."/my");
?>