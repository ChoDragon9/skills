<?php
if(isset($_SESSION['ulv'])){
?>
<form action="/write" method="post" id="moveWrite">
<div><?php echo $input->input("hidden","name");?></div>
</form>
<div id="main_login">
	<div id="profile_img"><?php echo img("/img/thumb_profileimg.jpg","내 사진");?></div>
	<ul id="profile_info">
		<li>조용구님</li>
		<li>오늘도 화이팅!!</li>
		<li class="bt">
			<?php
			if(!empty($sdt)){
				?>
				<a href="javascript:return false;" onclick="selectid('name').value = '<?php echo $sdt['sub_id'];?>'; selectid('moveWrite').submit();">
				<?php
			}else{
				?>
				<a href="/write">
				<?php
			}
			echo img("/img/write_bt.png","글쓰기")."</a>";
			echo $input->input("button2","로그아웃","move('/include/logout.php');");
			?>
		</li>
	</ul>
</div>
<?php
}else{
	$_SESSION['token'] = time();
?>
<form action="/include/login.php" method="post" id="login_frm">
<div id="main_login">
	<ul id="main_login_input">
		<li><input type="text" name="email" id="email" value="E-mail" onfocus="if(this.value=='E-mail'){this.value='';}" onblur="if(this.value==''){this.value='E-mail';}" /></li>
		<li><input type="password" name="pwd" id="pwd" value="test" onfocus="if(this.value=='test'){this.value='';}" onblur="if(this.value==''){this.value='test';}" />
		<?php echo $input->input("hidden","token",$_SESSION['token']).$input->input("hidden","link",PAGE); ?>
		</li>
	</ul>
	<div id="main_login_submit"><?php echo $input->input("submit2","");?></div>
	<?php
	if(isset($_POST['loginerr'])){
		echo '<div id="login_errmsg">';
		$msg = $_POST['loginerr'] == "email" ? "이메일" : "패스워드";
		echo $msg."를 정확히 입력해주세요.";
		echo '</div>';
	}
	?>
</div>
</form>
<?php
}
?>