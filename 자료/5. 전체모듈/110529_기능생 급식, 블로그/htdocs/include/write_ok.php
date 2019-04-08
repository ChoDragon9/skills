<?
//if($_POST[first]){ $first = $_POST[first]; }
$date = date("$Y-$type-$no");
if($_POST[second]){ $second = $_POST[second]; }
if($_POST[third]){ $third = $_POST[third]; }
if($_POST[fourth]){ $fourth = $_POST[fourth]; }
sql("delete from today_menu where wdate='$date' and (second = '$second' || third = '$third' || fourth = '$fourth') limit 1");
sql("insert into today_menu(no,first,second,third,fourth,name,wdate) values('','$first','$second','$third','$fourth','$_SESSION[name]','$date')");
move(PAGE."/write/".$type."/".$no);
?>