<?
if($type){
	include("../include/product/".$type.".php");
}else{
	if(!$_SESSION[name]) session_destroy();
?>
<ul class="w100">
	<li class="w60 fl ft12 fw fm cg"><?if($_SESSION[name]){?><a href="<?=PAGE?>/my">[내 주문현황보기/장바구니]</a><?}else{?><a href="<?=PAGE?>/my">[내 주문현황보기]</a><?}?></li>
	<li class="w40 ar fl">&nbsp;<span class="cr">*</span> 상품소개를 클릭하시면 주문페이지가 있습니다.</li>
</ul>
<ul class="w100 fw fm ac">
	<li class="w10 bt2c fl">상품명</li>
	<li class="w20 bt2c fl">이미지</li>
	<li class="w50 bt2c fl">상품소개</li>
	<li class="w10 bt2c fl">가격/kg</li>
	<li class="w10 bt2c fl">고객문의</li>
</ul>
	<?
	$res = sql("select * from product order by no desc");
	while($row= mysql_fetch_array($res)){
	?>
	<ul class="w100">
	<li class="w10 bt1c fl ac"><?=$row[name]?></li>
	<li class="w20 bt1c fl ac"><img src="<?=$file?>/<?=$row[wfile]?>" alt="<?=$row[file_name]?>" title="<?=$row[file_name]?>" onchange="yunsan();" onkeyup="yunsan()" style="width:100px;height:80px;" /></li>
	<li class="w50 bt1c fl"><a href="<?=PAGE?>/view/<?=$row[no]?>"><?=$row[content]?></a></li>
	<li class="w10 bt1c fl ac"><?=$row[price]?>원<br />/<?=$row[kg]?>kg</li>
	<li class="w10 bt1c fl"><?=$row[anser]?></li>
	</ul>
	<?
	}
	?>
<ul class="w100">
	<li class="w100 bt1c fl">&nbsp;</li>
</ul>
	<?
}
?>