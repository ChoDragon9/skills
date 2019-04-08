<?php
include("../config.php");
include("../lib.php");
include("../header.php");

if(!empty($no)){
	$row = fetarr("select * from menu where no='$no'");
	sql("delete from menu where main_id='$row[main_id]'");
}

move("/mobilepage/include/cateadmin.php");
?>