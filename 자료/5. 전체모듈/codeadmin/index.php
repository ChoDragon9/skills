<?php
session_start();
include("./include/lib.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>소스수정 프로그램</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="generator" content="editplus" />
<meta name="author" content="" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="./common/style.css" />
<script type="text/javascript" src="./common/common.js"></script>
</head>
<body>
<div id="wrapper">
	<div id="wrap">
		<div id="header"><a href="<?php echo $code;?>">Source Administration</a></div>
		<div id="content">
		<?php
		if(isset($type)){
			$move = "./include/{$type}.php";
			if(file_exists($move)){
				include($move);
			}else{
				echo "{$type}.php이 딴거 없어 꺼져<input type='button' value='꺼지기' onclick='location.replace(\"".$code."\");' />";
			}
		}else{
			include("./include/main.php");
		}
		?>
		</div>
	</div>
</div>
<div id="footer">Copyright (c) 2012 조용구 All Right Reserved.</div>
</body>
</html>