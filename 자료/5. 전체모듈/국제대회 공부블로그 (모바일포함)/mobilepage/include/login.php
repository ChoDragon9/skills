<?php
include("./config.php");
include("./lib.php");
include("./header.php");
if(isset($_SESSION['ulv'])){
	move("/");
	exit;
}
?>
<div id="login">
	<form action="/mobilepage/include/login/login_ok.php" method="post">
	<ul data-theme="f">
		<li><input type="text" name="email" id="email" placeholder="E-mail" /></li>
		<li><input type="password" name="pwd" id="pwd" placeholder="Password" /></li>
		<li><input type="submit" value="로그인" data-theme="e" /></li>
	</ul>
	</form>
</div>
<?php
include("./footer.php");
?>