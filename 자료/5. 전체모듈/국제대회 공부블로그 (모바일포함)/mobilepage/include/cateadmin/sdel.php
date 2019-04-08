<?php
include("../config.php");
include("../lib.php");
include("../header.php");

if(!empty($no)){
	sql("delete from menu where no='$no'");
}

move("/mobilepage/include/cateadmin.php");
?>