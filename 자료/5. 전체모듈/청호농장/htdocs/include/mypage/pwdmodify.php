<form action="<?php echo PAGE."/pwdmodify_ok";?>" method="post" onsubmit="return frmchk('pwd');">
<div class="content">
	<ul>
		<li class="w20 bg"><?php nb(3);  label("���� �н�����","lastpwd"); ?></li>
		<li class="w80"><?php nb(3); $input->input("password","lastpwd","","20");?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("�н�����","pwd");?></li>
		<li class="w30"><?php nb(3); $input->input("password","pwd","","20");?></li>
		<li class="w20 bg"><?php nb(3);  label("�н����� Ȯ��","pwd_ok");?></li>
		<li class="w30"><?php nb(3); $input->input("password","pwd_ok","","20");?></li>
	</ul>
	<ul class="bt">
		<li><?php $input->input("submit2","�����ϱ�"); nb(); $input->input("button","�ڷΰ���","move('".PAGE."');");?></li>
	</ul>
</div>
</form>