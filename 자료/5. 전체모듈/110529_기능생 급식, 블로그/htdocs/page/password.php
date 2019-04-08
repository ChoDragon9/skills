<? header("content-type:text/html; charset=utf-8"); session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title>PASSWORD</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="generator" content="editplus" />
  <meta name="author" content="" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link rel="stylesheet" type="text/css" href="/common/style.css" />
 </head>
 <body>
<?
mysql_connect("localhost","semicon","whdydrn");
mysql_select_db("semicon");
mysql_query("set names utf8");
$arr = explode("/",$_SERVER['REQUEST_URI']);
$url = "http://semicon.jinzza.net";
$index = $url."/page/password.php";
$login = $arr[3];
function change($sql){
	return mysql_real_escape_string(strip_tags(htmlspecialchars($sql)));
}
function alert($sql){
	echo '<script type="text/javascript">alert("'.$sql.'");</script>';
}
function move($sql){
	echo '<script type="text/javascript">location.replace("'.$sql.'");</script>';
}
function back($sql){
	echo '<script type="text/javascript">history.back();</script>';
}
function fetch($sql){
	$res = mysql_query($sql);
	return mysql_fetch_array($res);
}

if($login){
	include("../include/".$login.".php");
}else{
?>
<div id="password">
	<form action="<?=$index?>/login_ok" method="post">
	<ul>
		<li class="w100"><input type="text" value="" name="id" style="width:150px;border:solid 1px #ccc;height:20px;" /></li>
		<li class="w100"><input type="password" value="" name="pwd" style="width:150px;border:solid 1px #ccc;height:20px;" /></li>
		<li class="w100"><input type="submit" value="로그인" style="width:70px;height:25px;" />&nbsp;<input type="button" value="회원가입" style="width:80px;height:25px;" onclick="location.href='<?=$index?>/join'" /></li>
		<li class="w100 ft14 fw"><a href="http://semicon.jinzza.net">식단프로그램가기</a></li>
	</ul>
</form>
</div>
<?
}
?>
 </body>
</html>