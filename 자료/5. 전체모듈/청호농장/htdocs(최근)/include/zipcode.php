<?php
session_start();
include("./config.php");
include("./lib.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>주소검색</title>
<meta name="generator" content="editplus" />
<meta name="author" content="" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="../css/common.css" />
<style type="text/css">
ul > li > input[type="text"] { height:20px; border:solid 4px #857c5f; margin-top:1px; }
</style> 
</head>
<body>
<div class="w100 fl" style="font-size:25px; font-family:'맑은 고딕'; font-weight:bold; color:#333; padding-left:5px;">주소를 검색해주세요.</div>
<form action="" method="post">
	<ul class="w100 fl" style="margin-left:5px;">
		<li class="w70 fl tc"><?php $input->input("text","schText",$schText,"38");?></li>
		<li class="w30 fl"><?php $input->input("submit2","검색");?></li>
	</ul>
</form>
</body>
</html>