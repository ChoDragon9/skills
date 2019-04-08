<?
$date = date("$Y-$type-$no");
sql("delete from today_menu where name='$_SESSION[name]' && wdate = '$date'");
move(PAGE."/write/".$type."/".$no);
?>