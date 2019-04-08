<?php
if($_SESSION['ulv']){
	alert("이미 로그인 하셨습니다.");
	move("/");
	exit;
}
if($type){
	include("./include/join/".$type.".php");
}else{
?>
<div id="joinimg">
<?php img("/img/joinfirst.png","");?>
</div>
<div class="w100 fl h30"><?php img("/img/jointxt.png","*는 필수 입력사항입니다.");?></div>
<form action="<?php echo PAGE."/join_login";?>" method="post" onsubmit="if(confirm('이대로 가입하시겠습니까?')){return frmchk('join');} return false;">
	<div class="content">
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("성명","name"); ?></li>
			<li class="w80"><?php nb(3); $input->input("text","name","","10");?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); label("전화번호","home");?></li>
			<li class="w30"><?php nb(3); $input->input("text","home","","20");?></li>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("휴대폰번호","phone");?></li>
			<li class="w30"><?php nb(3); $input->input("text","phone","","20");?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("거주시","address");?></li>
			<li class="w80"><?php nb(3); $input->input("text","address","","20");?> 예) 전남 여수시, 경기도 안양</li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("상세주소","address2");?></li>
			<li class="w80"><?php nb(3); $input->input("text","address2","","60");?></li>
		</ul>
		<ul class="bt">
			<li><?php $input->input("submit2","다음단계"); nb(); $input->input("reset","다시쓰기");?></li>
		</ul>
	</div>
</form>
<?php
}
?>