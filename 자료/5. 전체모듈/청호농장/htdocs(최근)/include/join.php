<?php
if($_SESSION['ulv']){
	alert("�̹� �α��� �ϼ̽��ϴ�.");
	move("/");
	exit;
}
if($type){
	include("./include/join/".$type.".php");
}else{
	$token = uniqid(time());
	$_SESSION['token'] = $token;
?>
<div class="w100 fl h30"><?php img("/img/jointxt.png","*�� �ʼ� �Է»����Դϴ�.");?></div>
<form action="<?php echo PAGE."/join_ok";?>" method="post" onsubmit="if(confirm('�̴�� �����Ͻðڽ��ϱ�?')){return frmchk('join');} return false;">
	<div class="content">
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("����","name"); ?></li>
			<li class="w80"><?php nb(3); $input->input("text","name","","10");?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); label("��ȭ��ȣ","home");?></li>
			<li class="w80 c6"><?php nb(3); $input->input("text","home","","20");?> '-' ���� �Է����ּ���.</li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("�޴�����ȣ","phone");?></li>
			<li class="w80 c6"><?php nb(3); $input->input("text","phone","","20");?> '-' ���� �Է����ּ���.</li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("�ּ�","address");?></li>
			<li class="w80"><?php nb(3); ?><input type="text" size="4" name="u1" id="u1" disabled='disabled' /> <input type="text" size="4" name="u2" id="u2" disabled='disabled' /> <input type="text" size="25" name="address1" id="address1" /> <a href="javascript:popup('/include/zipcode.php','zipcodepopup',400,200);" class="fw">�ּ�ã��</a></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("������ �ּ�","address");?></li>
			<li class="w80 c6"><?php nb(3); $input->input("text","address2","","50");?></li>
		</ul>
		<ul class="bt"><li></li></ul>
	</div>
	<div class="content">
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("���̵�","id"); $input->input("hidden","token",$_SESSION['token']);?></li>
			<li class="w80 c6"><?php nb(3); $input->input("text","id","","20");?> �ּ� ����, ����4���ڷ� ���ּ���</li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("�н�����","pwd");?></li>
			<li class="w30"><?php nb(3); $input->input("password","pwd","","20");?></li>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("�н����� Ȯ��","pwd_ok");?></li>
			<li class="w30"><?php nb(3); $input->input("password","pwd_ok","","20");?></li>
		</ul>
		<ul class="bt">
			<li><?php $input->input("submit2","ȸ������"); nb(); $input->input("reset","�ٽþ���");?></li>
		</ul>
	</div>
</form>
<?php
}
?>