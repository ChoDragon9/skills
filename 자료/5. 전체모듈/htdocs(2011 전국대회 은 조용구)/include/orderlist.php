<?
if($_SESSION[lv] ==10){
if($type){
	include("../include/orderlist/".$type.".php");
}else{
?>
<ul class="w100">
	<li class="w100 fl fw fm ft12"><a href="<?=PAGE?>/add">[�ֹ����� �߰��ϱ�]</a></li>
</ul>
<ul class="w100 fw fm ac">
	<li class="w20 bt2c fl">�ֹ���</li>
	<li class="w20 bt2c fl">��ǰ��</li>
	<li class="w10 bt2c fl">��ǰ����</li>
	<li class="w10 bt2c fl">�ѱݾ�</li>
	<li class="w20 bt2c fl">�ֹ�����</li>
	<li class="w10 bt2c fl">����</li>
	<li class="w10 bt2c fl">����</li>
</ul>
	<?
	$res = sql("select * from orderlist order by no desc");
	while($row= mysql_fetch_array($res)){
		$row2 = fetch("select * from product where no='$row[procode]'");
	?>
	<ul class="w100 ac">
		<li class="w20 bt1c fl"><?=hex($row[id]);?></li>
		<li class="w20 bt1c fl"><?=$row2[name]?></li>
		<li class="w10 bt1c fl"><?=$row[num]?></li>
		<li class="w10 bt1c fl"><?=$row[totalmoney]?></li>
		<li class="w20 bt1c fl"><?=$row[wdate]?></li>
		<li class="w10 bt1c fl"><a href="<?=PAGE?>/modfiy/<?=$row[no]?>">[����]</a></li>
		<li class="w10 bt1c fl"><a href="<?=PAGE?>/delete/<?=$row[no]?>">[����]</a></li>
	</ul>
	<?
	}
}
?>
<ul class="w100">
	<li class="w100 bt1c fl">&nbsp;</li>
</ul>
<?
}else{
	alert("������ �����ϴ�.");
	move($index);
}
?>