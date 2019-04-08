<form action="<?php echo PAGE."/pwdmodify_ok";?>" method="post" onsubmit="return frmchk('pwd');">
<div class="content">
	<ul>
		<li class="w20 bg"><?php nb(3);  label("이전 패스워드","lastpwd"); ?></li>
		<li class="w80"><?php nb(3); $input->input("password","lastpwd","","20");?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("패스워드","pwd");?></li>
		<li class="w30"><?php nb(3); $input->input("password","pwd","","20");?></li>
		<li class="w20 bg"><?php nb(3);  label("패스워드 확인","pwd_ok");?></li>
		<li class="w30"><?php nb(3); $input->input("password","pwd_ok","","20");?></li>
	</ul>
	<ul class="bt">
		<li><?php $input->input("submit2","수정하기"); nb(); $input->input("button","뒤로가기","move('".PAGE."');");?></li>
	</ul>
</div>
</form>