<?
$row = fetch("select * from board where no='$no'");
?>
<form action="<?=PAGE?>/modify_ok/<?=$no?>" method="post">
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c"><?=label("name","이름");?></li>
	<li class="w80 fl bt2c"><?=input("text","name",$row[name],"100");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><?=label("subject","제목");?></li>
	<li class="w80 fl bt1c"><?=input("text","subject",$row[subject],"300");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><?=label("content","내용");?></li>
	<li class="w80 fl bt1c"><?=input("textarea","content",$row[content],"");?></li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","수정하기","","");?>&nbsp;<?=input("reset","다시쓰기","","");?>&nbsp;<?=input("button","목록으로","location.replace('".PAGE."');","");?></li>
</ul>
</form>