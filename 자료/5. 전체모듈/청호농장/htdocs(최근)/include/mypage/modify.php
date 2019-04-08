<?php
$row = $db->fetarr("select * from member where no='$_SESSION[uno]'");
$row['pwd'] = "";
$input->value = $row;
?>
<div class="w100 fl h30"><?php img("/img/jointxt.png","*는 필수 입력사항입니다.");?></div>
<form action="<?php echo PAGE."/modify_ok";?>" method="post">
	<div class="content">
		<ul>
			<li class="w20 bg"><?php nb(3); label("아이디","id"); ?></li>
			<li class="w80"><?php nb(3); echo $row['id'];?></li>
		</ul>
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
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("거주시","address1");?></li>
			<li class="w80"><?php nb(3); $input->input("text","address","","20");?> 예) 전남 여수시, 경기도 안양</li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("상세주소","address2");?></li>
			<li class="w80"><?php nb(3); $input->input("text","address2","","60");?></li>
		</ul>
		<ul class="bt">
			<li><?php $input->input("submit2","수정하기"); nb(); $input->input("button","뒤로가기","move('".PAGE."');");?></li>
		</ul>
	</div>
</form>