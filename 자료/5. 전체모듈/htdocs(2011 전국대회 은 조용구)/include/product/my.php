<?
if($_SESSION[name]){
?>
<ul class="w100">
	<li class="w100 fl fw fm ft12">내 주문현황</li>
</ul>
<ul class="w100 fw fm ac">
	<li class="w20 bt2c fl">상품명</li>
	<li class="w20 bt2c fl">상품수량</li>
	<li class="w20 bt2c fl">총금액</li>
	<li class="w20 bt2c fl">주문일자</li>
	<li class="w20 bt2c fl">상품보기</li>
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
		<li class="w20 bt1c fl"><a href="<?=$index?>/main4/sub1/view/<?=$row2[no]?>">[상품보기]</a></li>
	</ul>
	<?
	}
?>
<ul class="w100">
	<li class="w100 bt1c fl"><?=input("button","목록으로","location.replace('".PAGE."');","");?></li>
</ul>
<ul class="w100">
	<li class="w100 fl fw fm ft12">&nbsp;</li>
</ul>
<ul class="w100">
	<li class="w100 fl fw fm ft12">내 장바구니</li>
</ul>

<form action="<?=PAGE?>/basket_ok" method="post" id="frm">
<ul class="w100 fw fm ac">
	<li class="w20 bt2c fl">상품명<?=input("hidden","procode","","");?></li>
	<li class="w30 bt2c fl">상품수량<?=input("hidden","num","","");?></li>
	<li class="w30 bt2c fl">총금액<?=input("hidden","total","","");?></li>
	<li class="w10 bt2c fl">주문하기<?=input("hidden","number","","");?></li>
	<li class="w10 bt2c fl">삭제</li>
</ul>
	<?
	$i = 1;
	$res = sql("select * from basket where id='$_SESSION[id]' order by no desc");
	while($row= mysql_fetch_array($res)){
		$row2 = fetch("select * from product where no='$row[procode]'");
	?>
	<ul class="w100 ac">
		<li class="w20 bt1c fl"><?=$row2[name]?><?=input("hidden","price".$i,$row2[price],"");?><?=input("hidden","procode".$i,$row[procode],"");?><?=input("hidden","number".$i,$row[no],"");?></li>
		<li class="w30 bt1c fl"><?=input("button","더하기","plu2('+','".$i."')","");?>&nbsp;<input type="text" name="num<?=$i?>" id="num<?=$i?>" title="num<?=$i?>" class="input ar" onkeyup="yunsan2('<?=$i?>')" onkeypress="return onlynum();" style="width:50px;" value="<?=$row[num]?>" />개&nbsp;<?=input("button","빼기","plu2('-','".$i."')","");?></li>
		<li class="w30 bt1c fl"><input type="text" name="total<?=$i?>" id="total<?=$i?>" title="total<?=$i?>" class="input ar" style="width:100px;" value="<?=$row[totalmoney]?>" readonly />&nbsp;원</li>
		<li class="w10 bt1c fl"><?=input("button","주문하기","basketsubmit('".$i."')","");?></li>
		<li class="w10 bt1c fl"><?=input("button","삭제","if(confirm('삭제하시겠습니까?')){location.replace('".PAGE."/delete/".$row[no]."')}","");?></li>
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
	<li class="w20 bt2c fl">상품명</li>
	<li class="w20 bt2c fl">상품수량</li>
	<li class="w20 bt2c fl">총금액</li>
	<li class="w20 bt2c fl">주문일자</li>
	<li class="w20 bt2c fl">상품보기</li>
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
		<li class="w20 bt1c fl"><a href="<?=$index?>/main4/sub1/view/<?=$row2[no]?>">[상품보기]</a></li>
	</ul>
	<?
	}
?>
<ul class="w100">
	<li class="w100 bt1c fl"><?=input("button","목록으로","location.replace('".PAGE."');","");?></li>
</ul>
<?
}else{
?>
<ul class="w100">
	<li class="w100 fw fm c6">
	현제 비회원 주문 조회를 하고 게십니다. 주문번호를 입력해주세요.
	</li>
</ul>
<form action="<?=PAGE?>/my_ok" method="post">
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><?=label("ordercode","주문번호")?></li>
	<li class="w80 fl bt1c fw fm cg ft14"><?=input("text","ordercode","","");?></li>
</ul>
<ul class="w100">
	<li class="w100 bt1c fl"><?=input("submit","조회하기","","");?>&nbsp;<?=input("button","목록으로","location.replace('".PAGE."');","");?></li>
</ul>
</form>
	<?
}
?>