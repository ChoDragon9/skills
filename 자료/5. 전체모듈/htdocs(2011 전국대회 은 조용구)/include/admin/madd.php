<form action="<?=PAGE?>/madd_ok" method="post">
<ul class="w100">
	<li class="w100 fw fm fl">&nbsp;<span class="cr">*</span>&nbsp;�� �ʼ� ���Ի����Դϴ�.</li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c"><span class="cr">*</span>&nbsp;<?=label("mainid","���ξ��̵�");?></li>
	<li class="w80 fl bt2c"><?=input("text","mainid","","200");?>&nbsp;<span class="c9">����� �� �Է����ּ���.</span></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("title","Ÿ��Ʋ");?></li>
	<li class="w80 fl bt1c"><?=input("text","title","","200");?></li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","�߰��ϱ�","","");?>&nbsp;<?=input("reset","�ٽþ���","","");?>&nbsp;<?=input("button","�������","location.replace('".PAGE."');","");?></li>
</ul>
</form>