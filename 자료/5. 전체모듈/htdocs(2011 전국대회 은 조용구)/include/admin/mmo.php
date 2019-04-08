<?
$row = fetch("select * from menu where no='$no'");
?>
<form action="<?=PAGE?>/mmo_ok/<?=$row[no]?>" method="post">
<ul class="w100">
	<li class="w100 fw fm fl">&nbsp;<span class="cr">*</span>&nbsp;는 필수 기입사항입니다.</li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c"><span class="cr">*</span>&nbsp;<?=label("mainid","메인아이디");?></li>
	<li class="w80 fl bt2c"><?=input("text","mainid",$row[main_id],"200");?>&nbsp;<span class="c9">영어로 만 입력해주세요.</span></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("title","타이틀");?></li>
	<li class="w80 fl bt1c"><?=input("text","title",$row[title],"200");?></li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","수정하기","","");?>&nbsp;<?=input("reset","다시쓰기","","");?>&nbsp;<?=input("button","목록으로","location.replace('".PAGE."');","");?></li>
</ul>
</form>