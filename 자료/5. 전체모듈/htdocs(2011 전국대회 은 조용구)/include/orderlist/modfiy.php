<?
$row = fetch("select * from orderlist where no='$no'");
$row2 = fetch("select * from product where no='$row[procode]'");
?>
<form action="<?=PAGE?>/modify_ok/<?=$row[no]?>" method="post" id="frm">
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c">주문자</li>
	<li class="w80 fl bt2c"><?=hex($row[id])?></li>
</ul>
<?
if($row[ordercode] != ""){
?>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">주문코드</li>
	<li class="w80 fl bt1c"><?=$row[ordercode]?></li>
</ul>
<?
}
?>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">상품명</li>
	<li class="w80 fl bt1c"><?=$row2[name]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">가격/kg</li>
	<li class="w80 fl bt1c"><?=$row2[price]?>원/<?=$row2[kg]?>kg<?=input("hidden","price",$row2[price],"");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">수량</li>
	<li class="w80 fl bt1c"><?=input("button","더하기","plu('+')","");?>&nbsp;<input type="text" name="num" id="num" title="num" class="input ar" onkeyup="yunsan()" onkeypress="return onlynum();" style="width:50px;" value="<?=$row[num]?>" />개&nbsp;<?=input("button","빼기","plu('-')","");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">총금액</li>
	<li class="w80 fl bt1c"><input type="text" name="total" id="total" title="total" class="input ar" style="width:100px;" value="<?=$row[totalmoney]?>" readonly />&nbsp;원</li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","수정하기","","");?>&nbsp;<?=input("reset","리셋","","");?>&nbsp;<?=input("button","목록으로","location.replace('".PAGE."');","");?></li>
</ul>
</form>