<?php
if($_SESSION['ulv']){
	$db->table = "member";
	if($type){
		include("./include/mypage/".$type.".php");
	}else{
		$row = $db->fetarr("select * from member where no='$_SESSION[uno]'");
	?>
	<div class="content">
		<ul>
			<li class="w20 bg"><?php nb(3);label("아이디","id"); ?></li>
			<li class="w30"><?php nb(3); echo $row['id'];?></li>
			<li class="w20 bg"><?php nb(3);label("성명","name"); ?></li>
			<li class="w30"><?php nb(3); echo $row['name'];?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); label("전화번호","home");?></li>
			<li class="w30"><?php nb(3); echo $row['home']; ?></li>
			<li class="w20 bg"><?php nb(3);label("휴대폰번호","phone");?></li>
			<li class="w30"><?php nb(3); echo $row['phone']; ?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3);label("거주시","address1");?></li>
			<li class="w80"><?php nb(3); echo $row['address'];?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3);label("상세주소","address2");?></li>
			<li class="w80"><?php nb(3); echo $row['address2'];?></li>
		</ul>
		<ul class="bt">
			<li><?php $input->input("button","정보수정","move('".PAGE."/modify');"); nb(); $input->input("button","패스워드 수정","move('".PAGE."/pwdmodify');");?></li>
		</ul>
	</div>
	<?php
	}
}else{
	alert("로그인을 해주세요.");
	move("/login/login");
}
?>