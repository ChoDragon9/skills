<?php
$address = $db->change($_POST['address']);
$address2 = $db->change($_POST['address2']);
$phone = $db->change($_POST['phone']);
$home = $db->change($_POST['home']);
$name = $db->change($_POST['name']);
if(trim($address) == "" || trim($address2) == ""  || trim($phone) == "" || trim($name) == "" ){
	alert("��Ȯ�� �Է����ּ���.");
	back();
}else{
$input->value = $_POST;
?>
<div id="joinimg">
<?php img("/img/joinsecond.png","");?>
</div>
<div class="w100 fl h30"><?php img("/img/jointxt.png","*�� �ʼ� �Է»����Դϴ�.");?></div>
<form action="<?php echo PAGE."/join_ok";?>" method="post" onsubmit="if(confirm('�̴�� �����Ͻðڽ��ϱ�?')){return frmchk('join_login');} return false;">
	<div class="content">
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("���̵�","id"); $input->input("hidden","name"); $input->input("hidden","home"); $input->input("hidden","phone"); $input->input("hidden","address"); $input->input("hidden","address2");?></li>
			<li class="w80"><?php nb(3); $input->input("text","id","","20");?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("�н�����","pwd");?></li>
			<li class="w30"><?php nb(3); $input->input("password","pwd","","20");?></li>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("�н����� Ȯ��","pwd_ok");?></li>
			<li class="w30"><?php nb(3); $input->input("password","pwd_ok","","20");?></li>
		</ul>
		<ul class="bt">
			<li><?php $input->input("submit2","�����ܰ�"); nb(); $input->input("reset","�ٽþ���"); nb(); $input->input("button","�ڷΰ���","if(confirm('�ڷ� ���ðڽ��ϱ�?')){back();}");?></li>
		</ul>
	</div>
</form>
<?php
}
?>