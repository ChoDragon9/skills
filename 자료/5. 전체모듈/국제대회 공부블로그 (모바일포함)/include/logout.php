<?php
session_start();
session_destroy();
include("./config.php");
include("./lib.php");
if(!defined("IN_SITE")){
	alert("잘못된 접근입니다.");
	move("/");
	exit;
}
echo '<script type="text/javascript" src="../js/default.js"></script>';
move("/");
?>