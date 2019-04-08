<?php
include("../config.php");
include("../lib.php");
include("../header.php");

$mainid = escape($_POST['mainid']);
$title = escape($_POST['title']);

if($mainid == "" or $title == ""){
	if(!empty($no)){
		move("/mobilepage/include/cateadmin/mmo.php?no=".$no);
	}else{
		move("/mobilepage/include/cateadmin/madd.php");
	}
}else{
	if(!empty($no)){
		sql("update menu set main_id='$mainid', title='$title' where no='$no'");
	}else{
		sql("insert into menu set main_id='$mainid', title='$title', hd='1', type='main'");
	}
	move("/mobilepage/include/cateadmin.php");
}
?>