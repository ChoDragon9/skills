<?php
if($_SESSION['ulv']){
	alert("�̹� �α��� �ϼ̽��ϴ�.");
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
<div class="w100 fl h30"><?php img("/img/jointxt.png","*�� �ʼ� �Է»����Դϴ�.");?></div>
<form action="<?php echo PAGE."/join_login";?>" method="post" onsubmit="if(confirm('�̴�� �����Ͻðڽ��ϱ�?')){return frmchk('join');} return false;">
	<div class="content">
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
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("���ֽ�","address");?></li>
			<li class="w80"><?php nb(3); $input->input("text","address","","20");?> ��) ���� ������, ��⵵ �Ⱦ�</li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); img("/img/chk.png","*"); nb(); label("���ּ�","address2");?></li>
			<li class="w80"><?php nb(3); $input->input("text","address2","","60");?></li>
		</ul>
		<ul class="bt">
			<li><?php $input->input("submit2","�����ܰ�"); nb(); $input->input("reset","�ٽþ���");?></li>
		</ul>
	</div>
</form>
<?php
}
?>