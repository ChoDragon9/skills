<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
* { margin:0; padding:0; }
#wrap { width:300px; height:60px; background:#f0f0f0; border:1px solid #dbdbdb; margin:100px auto 0; position:relative; padding-top:40px; }
input[type="text"] { height:18px; border:1px solid #dbdbdb; position:absolute; left:21px; }
input[type="submit"] { width:40px; height:20px; background-color:#000; border:none; color:#fff; font-size:11px; font-weight:bold; position:absolute; right:23px; }
img { position:absolute; right:66px; }
p { position:absolute; top:20px; left:20px; font-size:12px; font-weight:bold; }
.msg_failed { color:#f00; }
</style>
</head>
<body>
<div id="wrap">
<form action="ok.php" method="post">
	<input type="text" name="capt" id="capt" />
	<img src="captcha.php" alt="캡차인증이미지" title="캡차인증이미지" />
	<input type="submit" value="인증" />
</form>
<?php
if(isset($_SESSION['msg'])){
	if($_SESSION['msg']){
		$msg_class = "msg_ok";
		$msg_txt= "인증을 성공했습니다.";
	}else{
		$msg_class = "msg_failed";
		$msg_txt= "인증을 실패했습니다.";
	}
	echo '<p class="'.$msg_class.'">'.$msg_txt.'</p>';
}
$_SESSION['msg'] = null;
?>
</div>
</body>
</html>