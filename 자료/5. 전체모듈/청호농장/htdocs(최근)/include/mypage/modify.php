<?php
$row = $db->fetarr("select * from member where no='$_SESSION[uno]'");
$row['pwd'] = "";
$input->value = $row;
?>
<div class="w100 fl h30"><?php img("/img/jointxt.png","*�� �ʼ� �Է»����Դϴ�.");?></div>
<form action="<?php echo PAGE."/modify_ok";?>" method="post">
	<div class="content">
		<ul>
			<li class="w20 bg"><?php nb(3); label("���̵�","id"); ?></li>
			<li class="w80"><?php nb(3); echo $row['id'];?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("����","name"); ?></li>
			<li class="w80"><?php nb(3); $input->input("text","name","","10");?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); label("��ȭ��ȣ","home");?></li>
			<li class="w30"><?php nb(3); $input->input("text","home","","20");?></li>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("�޴�����ȣ","phone");?></li>
			<li class="w30"><?php nb(3); $input->input("text","phone","","20");?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("���ֽ�","address1");?></li>
			<li class="w80"><?php nb(3); $input->input("text","address","","20");?> ��) ���� ������, ��⵵ �Ⱦ�</li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("���ּ�","address2");?></li>
			<li class="w80"><?php nb(3); $input->input("text","address2","","60");?></li>
		</ul>
		<ul class="bt">
			<li><?php $input->input("submit2","�����ϱ�"); nb(); $input->input("button","�ڷΰ���","move('".PAGE."');");?></li>
		</ul>
	</div>
</form>