<?php
if($_SESSION['token'] != $_POST['token']){
	alert("�߸��� �����Դϴ�.");
	move("/");
	exit;
}
if($_SESSION['uno'] and $_POST['pronum'] and $_POST['num']){
	$row = $db->fetarr("select * from product where no='$_POST[pronum]'");
	$row2 = $db->fetarr("select * from member where no='$_SESSION[uno]'");
	$input->value = $row2;
	$token = uniqid(time());
	$_SESSION['token'] = $token;
	?>
	<ul class="w100 fl h30">
		<li class="w60 fl"><?php img("/img/proinfo.png","1 ��ǰ����");?></li>
		<li class="w40 tr fl"><a href="<?php echo PAGE."/view/".$_POST['pronum'];?>"><img src="/img/backbt.png" /></a></li>
	</ul>
	<div class="content">
		<ul class="tc bg board ft12">
			<li class="w60">��ǰ��</li>
			<li class="w20">����</li>
			<li class="w20">�հ�</li>
		</ul>
		<ul class="ft12">
			<li class="w20"><img src="/file/thumb_<?php echo $row['wfile'];?>" alt="<?php echo $row['wfile'];?>" title="<?php echo $row['wfile'];?>" class="w80" /></li>
			<li class="w20"><?php echo $row['name'];?></li>
			<li class="w20 tc fw cr"><?php echo number_format($row['price'])." �� (".$row['size'].")";?></li>
			<li class="w20 tc"><?php echo number_format($_POST['num']).$row['unit'];?></li>
			<li class="w20 tc ft14 fw"><?php echo number_format($_POST['num']*$row['price'])." ��";?></li>
		</ul>
		<ul class="bt">
			<li></li>
		</ul>
	</div>
	<div class="w100 h30 fl"><?php img("/img/meminfo.png","2 ������� �� ȸ������");?></div>
	<form action="<?php echo PAGE."/buy_ok";?>" method="post" onsubmit="if(confirm('�̴�� �ֹ��Ͻðڽ��ϱ�?')){return frmchk('buy_ok');}else{return false;}">
		<div class="content">
			<ul>
				<li class="w20 bg"><?php nb(3); label("������","name"); $input->input("hidden","pronum",$_POST['pronum']); $input->input("hidden","num",$_POST['num']); $input->input("hidden","token",$_SESSION['token']); ?></li>
				<li class="w80"><?php nb(3); $input->input("text","name","","10");?></li>
			</ul>
			<ul>
				<li class="w20 bg"><?php nb(3); label("��ȭ��ȣ","home");?></li>
				<li class="w30"><?php nb(3); $input->input("text","home","","20");?></li>
				<li class="w20 bg"><?php nb(3); label("�޴�����ȣ","phone");?></li>
				<li class="w30"><?php nb(3); $input->input("text","phone","","20");?></li>
			</ul>
			<ul>
				<li class="w20 bg"><?php nb(3); label("���ֽ�","address");?></li>
				<li class="w80"><?php nb(3); $input->input("text","address","","20");?> ��) ���� ������, ��⵵ �Ⱦ�</li>
			</ul>
			<ul>
				<li class="w20 bg"><?php nb(3); label("���ּ�","address2");?></li>
				<li class="w80"><?php nb(3); $input->input("text","address2","","60");?></li>
			</ul>
			<ul class="bt">
				<li><?php  $input->input("submit2","�ֹ��ϱ�"); nb(); $input->input("button","�ڷΰ���","move('".PAGE."/view/".$row['no']."')");?></li>
			</ul>
		</div>
	</form>
<?php
}else{
	alert("�߸��� �����Դϴ�.");
	move("/");
}
?>