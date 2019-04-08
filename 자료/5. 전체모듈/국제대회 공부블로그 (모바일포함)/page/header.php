<?php
include("./include/config.php");
include("./include/lib.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $title;?></title>
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="generator" content="editplus" />
<meta name="author" content="조용구" />
<meta name="keywords" content="" />
<meta name="description" content="기능경기대회 웹을 공부하는 아이들에게 자료와 도움을 주기 위한 사이트" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/common.css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/js/default.js"></script>
</head>
<body>
<div id="wrapper">
	<div id="wrap">
		<div id="header">
			<div id="logo"><a href="/"><?php echo img("/img/logo.png","YK Blog world skills korea");?></a></div>
			<form action="" method="post" id="sch_frm">
			<ul id="main_sch">
			<?php
			$schText = !empty($_POST['schText']) ? escape($_POST['schText']) : "";
			?>
				<li class="submit"><?php echo $input->input("submit"," "); echo $input->input("hidden","link",PAGE); ?></li>
				<li class="input"><?php echo $input->input("text","schText",$schText);?></li>
			</ul>
			</form>
		</div>