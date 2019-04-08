<?php
if($type){
	include("./include/login/".$type.".php");
}else{
	if($_SESSION['uno']){
		alert("이미 로그인 하셨습니다.");
		move("/");
	}
?>
<div id="login">
	<div id="logintxt"><?php img("/img/logintxt.png","LOGIN");?></div>
	<div id="loginfrm">
		<div class="title"><?php img("/img/loginsimbol.png","O"); nb(); img("/img/sublogintitle.png","로그인");?></div>
		<form action="<?php echo PAGE."/login_ok";?>" method="post" onsubmit="return valchk('id,pwd');">
			<ul class="login_label">
				<li><?php label("아이디","id");?></li>
				<li><?php label("패스워드","pwd");?></li>
			</ul>
			<ul class="login_input">
				<li><?php $input->input("text","id");?></li>
				<li><?php $input->input("password","pwd"); $input->input("hidden","move",$_POST['move']);?></li>
			</ul>
			<div class="login_bt"><?php $input->input("submit");?></div>
		</form>
		<ul class="login_join">
			<li>회원가입을 원하시는 분은 회원가입을 클릭해주세요.</li>
			<li><a href="/join/join"><?php img("/img/joinbt.png","회원가입");?></a></li>
		</ul>
	</div>
</div>
<?php
}
?>