<?
if($type == "join_ok"){
	$id = change($_POST[id]);
	$pwd = change($_POST[pwd]);
	$name1 = change($_POST[name]);
	$sex = change($_POST[sex]);
	sql("insert into member values('','$id',password('$pwd'),'$name1','$sex','1')");
	alert("���ԵǾ����ϴ�.");
	move($index."/login/login");
}else{
?>
<form action="<?=PAGE?>/join_ok" method="post">
<ul class="w100">
	<li class="w100 fw fm fl">&nbsp;<span class="cr">*</span>&nbsp;�� �ʼ� ���Ի����Դϴ�.</li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c"><span class="cr">*</span>&nbsp;<?=label("id","���̵�");?></li>
	<li class="w80 fl bt2c"><?=input("text","id","","200");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("pwd","��й�ȣ");?></li>
	<li class="w80 fl bt1c"><?=input("password","pwd","","200");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("name","�̸�");?></li>
	<li class="w80 fl bt1c"><?=input("text","name","","100");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><?=label("sex","����");?></li>
	<li class="w80 fl bt1c"><?=input("text","sex","","100");?></li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","�����ϱ�","","");?>&nbsp;<?=input("reset","�ٽþ���","","");?></li>
</ul>
</form>
<?
}
?>