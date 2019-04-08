<?
$row = fetch("select * from product where no='$no'");
if(!$_SESSION[name]){
?>
<ul class="w100">
	<li class="w100 fw fm c6 fl">
	현제 비회원으로 주문하고 게십니다.
	</li>
</ul>
<?
}
?>
<form action="<?=PAGE?>/view_ok/<?=$row[no]?>" method="post" id="frm">
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c">상품명</li>
	<li class="w80 fl bt2c"><?=$row[name]?><?=input("hidden","basket","1","");?><?=input("hidden","procode",$row[procode],"");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">지역</li>
	<li class="w80 fl bt1c"><?=$row[local]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">이미지</li>
	<li class="w80 fl bt1c"><img src="<?=$file?>/<?=$row[wfile]?>" title="<?=$row[file_name]?>" alt="<?=$row[file_name]?>" style="width:300px; height:200px;" /></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">내용</li>
	<li class="w80 fl bt1c"><?=$row[content]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">고객문의</li>
	<li class="w80 fl bt1c"><?=$row[anser]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">가격/kg</li>
	<li class="w80 fl bt1c"><?=$row[price]?>원/<?=$row[kg]?>kg<?=input("hidden","price",$row[price],"");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">수량</li>
	<li class="w80 fl bt1c"><?=input("button","더하기","plu('+')","");?>&nbsp;<input type="text" name="num" id="num" title="num" class="input ar" onkeyup="yunsan()" onkeypress="return onlynum();" style="width:50px;" value="1" />개&nbsp;<?=input("button","빼기","plu('-')","");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">총금액</li>
	<li class="w80 fl bt1c"><input type="text" name="total" id="total" title="total" class="input ar" style="width:100px;" value="<?=$row[price]?>" readonly />&nbsp;원</li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","주문하기","","");?>&nbsp;<? if(!$_SESSION[name]){echo input("button","장바구니담기","alert('장바구니서비스는 로그인을 하셔야 이용가능합니다.'); location.replace('".$index."/login/login');","");}else{echo input("button","장바구니담기","bas()","");}?>&nbsp;<?=input("button","목록으로","location.replace('".PAGE."');","");?></li>
</ul>
</form>