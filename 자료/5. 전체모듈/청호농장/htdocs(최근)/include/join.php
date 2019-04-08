<?php
if($_SESSION['ulv']){
	alert("이미 로그인 하셨습니다.");
	move("/");
	exit;
}
if($type){
	include("./include/join/".$type.".php");
}else{
	$token = uniqid(time());
	$_SESSION['token'] = $token;
?>
<div class="w100 fl h30"><?php img("/img/jointxt.png","*는 필수 입력사항입니다.");?></div>
<form action="<?php echo PAGE."/join_ok";?>" method="post" onsubmit="if(confirm('이대로 가입하시겠습니까?')){return frmchk('join');} return false;">
	<div class="content">
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("성명","name"); ?></li>
			<li class="w80"><?php nb(3); $input->input("text","name","","10");?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); label("전화번호","home");?></li>
			<li class="w80 c6"><?php nb(3); $input->input("text","home","","20");?> '-' 없이 입력해주세요.</li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("휴대폰번호","phone");?></li>
			<li class="w80 c6"><?php nb(3); $input->input("text","phone","","20");?> '-' 없이 입력해주세요.</li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("주소","address");?></li>
			<li class="w80"><?php nb(3); ?><input type="text" size="4" name="u1" id="u1" disabled='disabled' /> <input type="text" size="4" name="u2" id="u2" disabled='disabled' /> <input type="text" size="25" name="address1" id="address1" /> <a href="javascript:popup('/include/zipcode.php','zipcodepopup',400,200);" class="fw">주소찾기</a></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("나머지 주소","address");?></li>
			<li class="w80 c6"><?php nb(3); $input->input("text","address2","","50");?></li>
		</ul>
		<ul class="bt"><li></li></ul>
	</div>
	<div class="content">
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("아이디","id"); $input->input("hidden","token",$_SESSION['token']);?></li>
			<li class="w80 c6"><?php nb(3); $input->input("text","id","","20");?> 최소 영문, 숫자4글자로 해주세요</li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("패스워드","pwd");?></li>
			<li class="w30"><?php nb(3); $input->input("password","pwd","","20");?></li>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("패스워드 확인","pwd_ok");?></li>
			<li class="w30"><?php nb(3); $input->input("password","pwd_ok","","20");?></li>
		</ul>
		<ul class="bt">
			<li><?php $input->input("submit2","회원가입"); nb(); $input->input("reset","다시쓰기");?></li>
		</ul>
	</div>
</form>
<?php
}
?>