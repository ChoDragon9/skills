<?
$date = date("$Y-$type-$no");
//if($_POST[first]){sql("update today set first='$_POST[first]' where wdate='$date'");}
if($_POST[second]){sql("update today set second='$_POST[second]' where wdate='$date'");}
if($_POST[third]){sql("update today set third='$_POST[third]' where wdate='$date'");}
if($_POST[fourth]){sql("update today set fourth='$_POST[fourth]' where wdate='$date'");}
move(PAGE.'/view/'.$type.'/'.$no);
?>