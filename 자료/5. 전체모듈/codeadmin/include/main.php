<?php
if($_SESSION['ulogin'] == ""){
?>
<div id="login">
<form action="<?php echo $code."?type=login";?>" method="post">
	<ul>
		<li><input type="text" name="email" id="email" /></li>
		<li><input type="password" name="pwd" id="pwd" /></li>
		<li><input type="submit" value="로그인" /></li>
	</ul>
</form>
</div>
<?php
}else{
?>
<div id="findfrm">
<form action="<?php echo $code;?>" method="post">
	<ul>
		<li><input type="button" value="나갈란다" onclick="location.replace('<?php echo $code."?type=logout";?>');" />
		<?php
		if($state != ""){
			echo $state;
		}
		?>
		</li>
		<li><input type="text" name="url" id="url" value="<?php if($_POST['url']!=""){echo $_POST['url'];}else{echo "Basic diretory는 최상위 html입니다.";};?>" onfocus="if(this.value == 'Basic diretory는 최상위 html입니다.'){this.value='';}" /></li>
		<li><input type="submit" value="찾기" /></li>
	</ul>
</form>
</div>
<?php
}
if($_SESSION['ulogin'] != "" and $_POST['url'] != ""){
	include("./include/find.php");
}
?>