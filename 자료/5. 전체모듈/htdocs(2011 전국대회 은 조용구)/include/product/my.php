<?
if($_SESSION[name]){
?>
<ul class="w100">
	<li class="w100 fl fw fm ft12">�� �ֹ���Ȳ</li>
</ul>
<ul class="w100 fw fm ac">
	<li class="w20 bt2c fl">��ǰ��</li>
	<li class="w20 bt2c fl">��ǰ����</li>
	<li class="w20 bt2c fl">�ѱݾ�</li>
	<li class="w20 bt2c fl">�ֹ�����</li>
	<li class="w20 bt2c fl">��ǰ����</li>
</ul>
	<?
	$res = sql("select * from orderlist where id='$_SESSION[id]' order by no desc");
	while($row= mysql_fetch_array($res)){
		$row2 = fetch("select * from product where no='$row[procode]'");
	?>
	<ul class="w100 ac">
		<li class="w20 bt1c fl"><?=$row2[name]?></li>
		<li class="w20 bt1c fl"><?=$row[num]?></li>
		<li class="w20 bt1c fl"><?=$row[totalmoney]?></li>
		<li class="w20 bt1c fl"><?=$row[wdate]?></li>
		<li class="w20 bt1c fl"><a href="<?=$index?>/main4/sub1/view/<?=$row2[no]?>">[��ǰ����]</a></li>
	</ul>
	<?
	}
?>
<ul class="w100">
	<li class="w100 bt1c fl"><?=input("button","�������","location.replace('".PAGE."');","");?></li>
</ul>
<ul class="w100">
	<li class="w100 fl fw fm ft12">&nbsp;</li>
</ul>
<ul class="w100">
	<li class="w100 fl fw fm ft12">�� ��ٱ���</li>
</ul>

<form action="<?=PAGE?>/basket_ok" method="post" id="frm">
<ul class="w100 fw fm ac">
	<li class="w20 bt2c fl">��ǰ��<?=input("hidden","procode","","");?></li>
	<li class="w30 bt2c fl">��ǰ����<?=input("hidden","num","","");?></li>
	<li class="w30 bt2c fl">�ѱݾ�<?=input("hidden","total","","");?></li>
	<li class="w10 bt2c fl">�ֹ��ϱ�<?=input("hidden","number","","");?></li>
	<li class="w10 bt2c fl">����</li>
</ul>
	<?
	$i = 1;
	$res = sql("select * from basket where id='$_SESSION[id]' order by no desc");
	while($row= mysql_fetch_array($res)){
		$row2 = fetch("select * from product where no='$row[procode]'");
	?>
	<ul class="w100 ac">
		<li class="w20 bt1c fl"><?=$row2[name]?><?=input("hidden","price".$i,$row2[price],"");?><?=input("hidden","procode".$i,$row[procode],"");?><?=input("hidden","number".$i,$row[no],"");?></li>
		<li class="w30 bt1c fl"><?=input("button","���ϱ�","plu2('+','".$i."')","");?>&nbsp;<input type="text" name="num<?=$i?>" id="num<?=$i?>" title="num<?=$i?>" class="input ar" onkeyup="yunsan2('<?=$i?>')" onkeypress="return onlynum();" style="width:50px;" value="<?=$row[num]?>" />��&nbsp;<?=input("button","����","plu2('-','".$i."')","");?></li>
		<li class="w30 bt1c fl"><input type="text" name="total<?=$i?>" id="total<?=$i?>" title="total<?=$i?>" class="input ar" style="width:100px;" value="<?=$row[totalmoney]?>" readonly />&nbsp;��</li>
		<li class="w10 bt1c fl"><?=input("button","�ֹ��ϱ�","basketsubmit('".$i."')","");?></li>
		<li class="w10 bt1c fl"><?=input("button","����","if(confirm('�����Ͻðڽ��ϱ�?')){location.replace('".PAGE."/delete/".$row[no]."')}","");?></li>
	</ul>
	<?
		$i++;
	}
	?>

</form>
<ul class="w100">
	<li class="w100 bt1c fl">&nbsp;</li>
</ul>
<?
}else if($_SESSION[ordercode]){
?>
<ul class="w100 fw fm ac">
	<li class="w20 bt2c fl">��ǰ��</li>
	<li class="w20 bt2c fl">��ǰ����</li>
	<li class="w20 bt2c fl">�ѱݾ�</li>
	<li class="w20 bt2c fl">�ֹ�����</li>
	<li class="w20 bt2c fl">��ǰ����</li>
</ul>
	<?
	$res = sql("select * from orderlist where ordercode='$_SESSION[ordercode]' order by no desc");
	while($row= mysql_fetch_array($res)){
		$row2 = fetch("select * from product where no='$row[procode]'");
	?>
	<ul class="w100 ac">
		<li class="w20 bt1c fl"><?=$row2[name]?></li>
		<li class="w20 bt1c fl"><?=$row[num]?></li>
		<li class="w20 bt1c fl"><?=$row[totalmoney]?></li>
		<li class="w20 bt1c fl"><?=$row[wdate]?></li>
		<li class="w20 bt1c fl"><a href="<?=$index?>/main4/sub1/view/<?=$row2[no]?>">[��ǰ����]</a></li>
	</ul>
	<?
	}
?>
<ul class="w100">
	<li class="w100 bt1c fl"><?=input("button","�������","location.replace('".PAGE."');","");?></li>
</ul>
<?
}else{
?>
<ul class="w100">
	<li class="w100 fw fm c6">
	���� ��ȸ�� �ֹ� ��ȸ�� �ϰ� �Խʴϴ�. �ֹ���ȣ�� �Է����ּ���.
	</li>
</ul>
<form action="<?=PAGE?>/my_ok" method="post">
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><?=label("ordercode","�ֹ���ȣ")?></li>
	<li class="w80 fl bt1c fw fm cg ft14"><?=input("text","ordercode","","");?></li>
</ul>
<ul class="w100">
	<li class="w100 bt1c fl"><?=input("submit","��ȸ�ϱ�","","");?>&nbsp;<?=input("button","�������","location.replace('".PAGE."');","");?></li>
</ul>
</form>
	<?
}
?>