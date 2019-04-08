<form action="<?=PAGE?>/add_ok" method="post" id="frm">
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c">상품명</li>
	<li class="w80 fl bt2c">
	<select name="procode">
	<?
	$res = sql("select * from product");
	while($row= mysql_fetch_array($res)){
		?>
		<option value="<?=$row[no]?>"><?=$row[name]?></option>
		<?
	}
	?>
	</select>
	</li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">주문자</li>
	<li class="w80 fl bt1c"><?=input("text","id","","");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">갯수</li>
	<li class="w80 fl bt1c"><input type="text" name="num" id="num" title="num" class="input" style="width:100px;" onkeypress="return onlynum()" value="" /> 수량을 입력하시면 자동으로 총금액이 등록됩니다.</li>
</ul>
<ul class="w100">
	<li class="w100 fl bt1c"><?=input("submit","등록하기","","")?>&nbsp;<?=input("reset","리셋","","");?>&nbsp;<?=input("button","목록으로","location.replace('".PAGE."');","");?></li>
</ul>
</form>