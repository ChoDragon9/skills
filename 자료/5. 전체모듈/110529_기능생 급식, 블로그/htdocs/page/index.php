<?session_start();include("../include/lib.php");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>식단프로그램</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="generator" content="editplus" />
  <meta name="author" content="" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link rel="stylesheet" type="text/css" href="<?=$common?>/style.css" />
<script type="text/javascript" src="<?=$common?>/common.js"></script>
 </head>
 <body>
 <?
 if(!$_SESSION[name]){
	alert("로그인을 해주세요!");
	move($url);
}else{
?>
<div id="wrap">
	<div id="top_area">
	<?
	if($main_id == "reser" || !$main_id){
		$icon = 'style="display:none;"';
	}else if($main_id == "list"){
		$icon1 = 'style="display:none;"';
	}
	?>
		<ul>
			<li><a href="<?=$index?>/reser">회원페이지</a></li>
			<li><a href="<?=$index?>/list">관리자페이지</a></li>
		</ul>
	</div>
	<div id="main_area">
		<div id="main_t"></div>
		<div id="main_m">
			<?
			if($main_id == "reser" || !$main_id){
				include("../include/reser.php");
			}else if($main_id == "list"){
				include("../include/list.php");
			}
			?>
		</div>
		<div id="main_b"></div>
	</div>
</div>
<?
}
?>
 </body>
</html>