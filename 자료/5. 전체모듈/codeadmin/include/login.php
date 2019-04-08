<?php
$email = "koreaskills";
$pwd = "webcyk";
if($_POST['email'] == "" or $_POST['pwd'] == ""){
	echo "정확히 입력해 꺼져<br /><input type='button' value='꺼지기' onclick='location.replace(\"".$code."\");' />";
}else{
	if($_POST['email'] == $email and $_POST['pwd'] == $pwd){
		$_SESSION['ulogin'] = "ok";
		move($code);
	}else{
		echo "정확히 입력해 꺼져<br /><input type='button' value='꺼지기' onclick='location.replace(\"".$code."\");' />";
	}
}
?>