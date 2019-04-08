<?php
include("../config.php");
include("../lib.php");

if(isset($_SESSION['ulv'])){
	move("/");
	exit;
}
include("../header.php");
$email = escape($_POST['email']);
$pwd = escape($_POST['pwd']);

$row = fetarr("select * from member where email='$email' and pwd=password('$pwd')");

if($row){
	$_SESSION['ulv'] = $row['lv'];
	move("/");
}else{
	move("/mobilepage/include/login.php");
}
include("../footer.php");
?>