<?php
if($_SESSION['token'] != $_POST['token']){
	alert("������ �����ϴ�.");
	move("/");
	exit;
}
if($_SESSION['uno'] and $_POST['basketnum'] and $_POST['basketno'] and $_POST['prono'] and $_POST['baskettotalprice']){
	$basketnum = substr($_POST['basketnum'],2);
	$basketno = substr($_POST['basketno'],2);
	$prono = substr($_POST['prono'],2);
	$basketnumarr = explode(",",$basketnum);
	$basketnoarr = explode(",",$basketno);
	$pronoarr = explode(",",$prono);
	$token = uniqid(time());
	$_SESSION['token'] = $token;
	?>
	<ul class="w100 fl h30">
		<li class="w60 fl"><?php img("/img/proinfo.png","1 ��ǰ����");?></li>
		<li class="w40 tr fl"><a href="<?php echo PAGE;?>"><img src="/img/backbt.png" /></a></li>
	</ul>
	<div class="content">
		<ul class="tc bg board ft12">
			<li class="w60">��ǰ��</li>
			<li class="w20">����</li>
			<li class="w20">�հ�</li>
		</ul>
	<?php
	for($i = 0; $i < sizeof($basketnoarr); $i++){
		$row = $db->fetarr("select * from product where no='$pronoarr[$i]'");
		?>
		<ul class="ft12">
			<li class="w20"><img src="/file/thumb_<?php echo $row['wfile'];?>" alt="<?php echo $row['wfile'];?>" title="<?php echo $row['wfile'];?>" class="w80" /></li>
			<li class="w20"><?php echo $row['name'];?></li>
			<li class="w20 tc fw cr"><?php echo number_format($row['price'])." �� (".$row['size'].")";?></li>
			<li class="w20 tc"><?php echo number_format($basketnumarr["$i"]).$row['unit'];?></li>
			<li class="w20 tc ft14 fw"><?php echo number_format($basketnumarr["$i"]*$row['price'])." ��";?></li>
		</ul>
		<?php
	}
	?>
		<ul class="bt">
			<li class="tr ft18 mg fw cr">�� �ֹ� �ݾ� : <?php echo number_format($_POST['baskettotalprice']);?> ��</li>
		</ul>
	</div>
	<?
	$row2 = $db->fetarr("select * from member where no='$_SESSION[uno]'");
	$input->value = $row2;
	?>
	<div class="w100 h30 fl"><?php img("/img/meminfo.png","2 ������� �� ȸ������");?></div>
	<form action="<?php echo PAGE."/buy_ok";?>" method="post" onsubmit="if(confirm('�̴�� �ֹ��Ͻðڽ��ϱ�?')){return frmchk('buy_ok');}else{return false;}">
		<div class="content">
			<ul>
				<li class="w20 bg"><?php nb(3); label("������","name"); $input->input("hidden","pronum",$prono); $input->input("hidden","num",$basketnum); $input->input("hidden","basketno",$basketno); ?></li>
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
				<li class="w80"><?php nb(3); $input->input("text","address2","","60"); $input->input("hidden","token",$_SESSION['token']);?></li>
			</ul>
			<ul class="bt">
				<li><?php  $input->input("submit2","�ֹ��ϱ�"); nb(); $input->input("button","�ڷΰ���","move('".PAGE."')");?></li>
			</ul>
		</div>
	</form>
<?php
}else{
	alert("�߸��� �����Դϴ�.");
	move("/");
}
?>