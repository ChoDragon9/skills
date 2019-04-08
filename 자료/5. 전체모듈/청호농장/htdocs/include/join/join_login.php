<?php
$address = $db->change($_POST['address']);
$address2 = $db->change($_POST['address2']);
$phone = $db->change($_POST['phone']);
$home = $db->change($_POST['home']);
$name = $db->change($_POST['name']);
if(trim($address) == "" || trim($address2) == ""  || trim($phone) == "" || trim($name) == "" ){
	alert("정확히 입력해주세요.");
	back();
}else{
$input->value = $_POST;
?>
<div id="joinimg">
<?php img("/img/joinsecond.png","");?>
</div>
<div class="w100 fl h30"><?php img("/img/jointxt.png","*는 필수 입력사항입니다.");?></div>
<form action="<?php echo PAGE."/join_ok";?>" method="post" onsubmit="if(confirm('이대로 가입하시겠습니까?')){return frmchk('join_login');} return false;">
	<div class="content">
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("아이디","id"); $input->input("hidden","name"); $input->input("hidden","home"); $input->input("hidden","phone"); $input->input("hidden","address"); $input->input("hidden","address2");?></li>
			<li class="w80"><?php nb(3); $input->input("text","id","","20");?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("패스워드","pwd");?></li>
			<li class="w30"><?php nb(3); $input->input("password","pwd","","20");?></li>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("패스워드 확인","pwd_ok");?></li>
			<li class="w30"><?php nb(3); $input->input("password","pwd_ok","","20");?></li>
		</ul>
		<ul class="bt">
			<li><?php $input->input("submit2","다음단계"); nb(); $input->input("reset","다시쓰기"); nb(); $input->input("button","뒤로가기","if(confirm('뒤로 가시겠습니까?')){back();}");?></li>
		</ul>
	</div>
</form>
<?php
}
?>