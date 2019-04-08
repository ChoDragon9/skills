<?
$num = change($_POST[num]);
$total = change($_POST[total]);
sql("update orderlist set num='$num', totalmoney='$total' where no='$no'");
move(PAGE);
?>