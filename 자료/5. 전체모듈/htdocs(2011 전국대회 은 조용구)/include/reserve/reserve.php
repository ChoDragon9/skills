<?
$row = fetch("select * from experlist where wyear = '$type' and wmonth ='$no' and wday = '$day' and name='$_SESSION[name]'");
if($row[no]){
	alert("이미신청을 하셨습니다.");
	move(PAGE);
}else{
?>
<form action="<?=PAGE?>/<?=$type?>/<?=$no?>/<?=$day?>/reserve_ok" method="post" onsubmit="return chk();" enctype="multipart/form-data">
<ul class="w100">
	<li class="w100 fw fm fl">&nbsp;<span class="cr">*</span>&nbsp;는 필수 기입사항입니다.</li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("name","이름");?></li>
	<li class="w80 fl bt1c"><?=$_SESSION[name]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><?=label("sex","성별");?></li>
	<li class="w80 fl bt1c"><?=input("text","sex","","100");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;예약일</li>
	<li class="w80 fl bt1c"><?=date("Y-m-d",strtotime(date("$type-$no-$day")));?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("address","주소");?></li>
	<li class="w80 fl bt1c"><?=input("text","address","","300");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("phone","핸드폰번호");?></li>
	<li class="w80 fl bt1c"><?=input("text","phone","","300");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">	<?=label("wfile","사진");?></li>
	<li class="w80 fl bt1c"><?=input("file","wfile","","");?></li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","신청하기","","");?>&nbsp;<?=input("reset","다시쓰기","","");?>&nbsp;<?=input("button","목록으로","location.replace('".PAGE."');","");?></li>
</ul>
</form>
<?
}
?>