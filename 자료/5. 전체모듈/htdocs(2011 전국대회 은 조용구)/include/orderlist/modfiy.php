<?
$row = fetch("select * from orderlist where no='$no'");
$row2 = fetch("select * from product where no='$row[procode]'");
?>
<form action="<?=PAGE?>/modify_ok/<?=$row[no]?>" method="post" id="frm">
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c">�ֹ���</li>
	<li class="w80 fl bt2c"><?=hex($row[id])?></li>
</ul>
<?
if($row[ordercode] != ""){
?>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">�ֹ��ڵ�</li>
	<li class="w80 fl bt1c"><?=$row[ordercode]?></li>
</ul>
<?
}
?>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">��ǰ��</li>
	<li class="w80 fl bt1c"><?=$row2[name]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">����/kg</li>
	<li class="w80 fl bt1c"><?=$row2[price]?>��/<?=$row2[kg]?>kg<?=input("hidden","price",$row2[price],"");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">����</li>
	<li class="w80 fl bt1c"><?=input("button","���ϱ�","plu('+')","");?>&nbsp;<input type="text" name="num" id="num" title="num" class="input ar" onkeyup="yunsan()" onkeypress="return onlynum();" style="width:50px;" value="<?=$row[num]?>" />��&nbsp;<?=input("button","����","plu('-')","");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">�ѱݾ�</li>
	<li class="w80 fl bt1c"><input type="text" name="total" id="total" title="total" class="input ar" style="width:100px;" value="<?=$row[totalmoney]?>" readonly />&nbsp;��</li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","�����ϱ�","","");?>&nbsp;<?=input("reset","����","","");?>&nbsp;<?=input("button","�������","location.replace('".PAGE."');","");?></li>
</ul>
</form>