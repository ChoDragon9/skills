<?
$procode = change($_POST[procode]);
$id1 = change($_POST[id]);
$num = change($_POST[num]);
$row=fetch("select * from product where no='$procode'");
$totalmoney = $num * $row[price];
sql("insert into orderlist values('','$id1','$procode','$num','$totalmoney','',now())");
alert("��ϵǾ����ϴ�.");
move(PAGE);
?>