<?php
include("../config.php");
include("../lib.php");

if(empty($_SESSION['ulv'])){
	move("/");
	exit;
}

$row = fetarr("select * from board where no='$no'");

sql("delete from board where no='$row[no]'");

move("/mobilepage/include/board.php?sub_id=".$row['sub_id']);
exit;
?>