<?
$date = date("$Y-$type-$no");
sql("insert into today(no,first,second,third,fourth,wdate) values('','$_POST[first]','$_POST[second]','$_POST[third]','$_POST[fourth]','$date')");
move(PAGE.'/view/'.$type.'/'.$no);
?>