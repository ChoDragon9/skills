<?
if($_SESSION[lv] ==10){
if($type){
	include("../include/orderlist/".$type.".php");
}else{
?>
<ul class="w100">
	<li class="w100 fl fw fm ft12"><a href="<?=PAGE?>/add">[주문정보 추가하기]</a></li>
</ul>
<ul class="w100 fw fm ac">
	<li class="w20 bt2c fl">주문자</li>
	<li class="w20 bt2c fl">상품명</li>
	<li class="w10 bt2c fl">상품수량</li>
	<li class="w10 bt2c fl">총금액</li>
	<li class="w20 bt2c fl">주문일자</li>
	<li class="w10 bt2c fl">수정</li>
	<li class="w10 bt2c fl">삭제</li>
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
		<li class="w10 bt1c fl"><a href="<?=PAGE?>/modfiy/<?=$row[no]?>">[수정]</a></li>
		<li class="w10 bt1c fl"><a href="<?=PAGE?>/delete/<?=$row[no]?>">[삭제]</a></li>
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
	alert("권한이 없습니다.");
	move($index);
}
?>