<?php
foreach($_GET as $key=>$val){
	$$key = $val;
}

$code = "/codeadmin/index.php";

function move($str){
	echo '<script type="text/javascript">location.replace("'.$str.'");</script>';
}

function view($str){
	$str = htmlspecialchars($str);
	return $str;
}
?>