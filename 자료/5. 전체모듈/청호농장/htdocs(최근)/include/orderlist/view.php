<?php
$row = $db->fetarr("select * from buy where no='$no'");
?>
<ul class="w100 fl h30">
	<li class="w60 fl"><?php img("/img/proinfo.png","1 ��ǰ����");?></li>
	<li class="w40 tr fl"><a href="<?php echo PAGE;?>"><img src="/img/backbt.png" /></a></li>
</ul>
<div class="content">
	<ul class="tc bg board ft12">
		<li class="w60">��ǰ��</li>
		<li class="w20">����</li>
		<li class="w20">�� �ݾ�</li>
	</ul>
	<?php
	$price = "";
	$pronumarr = explode(",",$row['pronum']);
	$numarr = explode(",",$row['num']);
	for($i = 0; $i < sizeof($pronumarr); $i++){
		$row2 = $db->fetarr("select * from product where no='$pronumarr[$i]'");
	?>
	<ul class="ft12">
		<li class="w20"><img src="/file/thumb_<?php echo $row2['wfile'];?>" alt="<?php echo $row2['wfile'];?>" title="<?php echo $row2['wfile'];?>" class="w80" /></li>
		<li class="w20"><?php echo $row2['name'];?></li>
		<li class="w20 tc fw cr"><?php echo number_format($row2['price'])." �� (".$row2['size'].")";?></li>
		<li class="w20 tc"><?php echo number_format($row['num']).$row2['unit'];?></li>
		<li class="w20 tc ft14 fw"><?php echo number_format($row2['price']*$numarr["$i"])." ��";?></li>
	</ul>
	<?php
		$price += $row2['price'] * $numarr["$i"];
	}
	?>
	<ul class="bt tr ft18 fw cr">
		<li>�� �ֹ� �ݾ� : <?php echo number_format($price)."��";?></li>
	</ul>
</div>
<div class="w100 h30 fl"><?php img("/img/meminfo.png","2 ������� �� ȸ������");?></div>
<div class="content">
	<ul>
		<li class="w20 bg"><?php nb(3);?>������</li>
		<li class="w80"><?php nb(3); echo $row['name'];?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); ?>��ȭ��ȣ</li>
		<li class="w30"><?php nb(3); echo $row['home'];?></li>
		<li class="w20 bg"><?php nb(3); ?>�޴�����ȣ</li>
		<li class="w30"><?php nb(3); echo $row['phone'];?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); ?>���ֽ�</li>
		<li class="w80"><?php nb(3); echo $row['address'];?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); ?>���ּ�</li>
		<li class="w80"><?php nb(3); echo $row['address2'];?></li>
	</ul>
	<ul class="bt">
		<li><?php if($row['state'] == "�ֹ��Ϸ�"){}else{} $input->input("button","�ڷΰ���","move('".PAGE."')");?></li>
	</ul>
</div>