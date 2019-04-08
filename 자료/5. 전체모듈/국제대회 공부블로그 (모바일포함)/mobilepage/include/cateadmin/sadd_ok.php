<?php
include("../config.php");
include("../lib.php");
include("../header.php");

$mainid = escape($_POST['mainid']);
$subid = escape($_POST['subid']);
$title = escape($_POST['title']);

if($mainid == "" or $subid == "" or $title == ""){
	move("/mobilepage/include/cateadmin/sadd.php");
}else{
	if(!empty($no)){
		sql("update menu set main_id='$mainid', sub_id='$subid', title='$title' where no='$no'");
	}else{
		sql("insert into menu set main_id='$mainid', sub_id='$subid', title='$title', type='board'");
	}
	move("/mobilepage/include/cateadmin.php");
}
?>