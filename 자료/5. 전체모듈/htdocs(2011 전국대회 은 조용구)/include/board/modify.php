<?
$row = fetch("select * from board where no='$no'");
?>
<form action="<?=PAGE?>/modify_ok/<?=$no?>" method="post">
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c"><?=label("name","�̸�");?></li>
	<li class="w80 fl bt2c"><?=input("text","name",$row[name],"100");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><?=label("subject","����");?></li>
	<li class="w80 fl bt1c"><?=input("text","subject",$row[subject],"300");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><?=label("content","����");?></li>
	<li class="w80 fl bt1c"><?=input("textarea","content",$row[content],"");?></li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","�����ϱ�","","");?>&nbsp;<?=input("reset","�ٽþ���","","");?>&nbsp;<?=input("button","�������","location.replace('".PAGE."');","");?></li>
</ul>
</form>