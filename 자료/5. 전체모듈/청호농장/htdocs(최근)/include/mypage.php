<?php
if($_SESSION['ulv']){
	$db->table = "member";
	if($type){
		include("./include/mypage/".$type.".php");
	}else{
		$row = $db->fetarr("select * from member where no='$_SESSION[uno]'");
	?>
	<div class="content">
		<ul>
			<li class="w20 bg"><?php nb(3);label("���̵�","id"); ?></li>
			<li class="w30"><?php nb(3); echo $row['id'];?></li>
			<li class="w20 bg"><?php nb(3);label("����","name"); ?></li>
			<li class="w30"><?php nb(3); echo $row['name'];?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3); label("��ȭ��ȣ","home");?></li>
			<li class="w30"><?php nb(3); echo $row['home']; ?></li>
			<li class="w20 bg"><?php nb(3);label("�޴�����ȣ","phone");?></li>
			<li class="w30"><?php nb(3); echo $row['phone']; ?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3);label("���ֽ�","address1");?></li>
			<li class="w80"><?php nb(3); echo $row['address'];?></li>
		</ul>
		<ul>
			<li class="w20 bg"><?php nb(3);label("���ּ�","address2");?></li>
			<li class="w80"><?php nb(3); echo $row['address2'];?></li>
		</ul>
		<ul class="bt">
			<li><?php $input->input("button","��������","move('".PAGE."/modify');"); nb(); $input->input("button","�н����� ����","move('".PAGE."/pwdmodify');");?></li>
		</ul>
	</div>
	<?php
	}
}else{
	alert("�α����� ���ּ���.");
	move("/login/login");
}
?>