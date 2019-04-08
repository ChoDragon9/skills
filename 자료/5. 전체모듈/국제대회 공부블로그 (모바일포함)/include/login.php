<?php
session_start();
include("./config.php");
include("./lib.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> new document </title>
<meta name="generator" content="editplus" />
<meta name="author" content="" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<script type="text/javascript" src="/js/default.js"></script>
</head>
<body>
<?php
if(!defined("IN_SITE") or $_POST['token'] != $_SESSION['token']){
	alert("Access Error!");
	move("/");
	exit;
}else{
	?>
	<form action="<?php echo $_POST['link'];?>" method="post" id="loginfrm">
	<input type="hidden" name="loginerr" id="loginerr" value="" />
	</form>
	<?php
	$email = escape($_POST['email']);
	$pwd = escape($_POST['pwd']);
	$link = escape($_POST['link']);
	$row = num("select * from member where email='$email' limit 1");
	if($row > 0){
		$row2 = fetarr("select * from member where email='$email' and pwd=password('$pwd') limit 1");
		if($row2){
			$_SESSION['ulv'] = $row2['lv'];
			move($link);
			exit;
		}else{
			?>
			<script type="text/javascript">
			selectid("loginerr").value = "pwd";
			selectid("loginfrm").submit();
			</script>
			<?php
		}
	}else{
		?>
		<script type="text/javascript">
		selectid("loginerr").value = "email";
		selectid("loginfrm").submit();
		</script>
		<?php
	}
}
?>
</body>
</html>