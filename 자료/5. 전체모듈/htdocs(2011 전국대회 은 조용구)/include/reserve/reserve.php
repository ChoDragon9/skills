<?
$row = fetch("select * from experlist where wyear = '$type' and wmonth ='$no' and wday = '$day' and name='$_SESSION[name]'");
if($row[no]){
	alert("�̹̽�û�� �ϼ̽��ϴ�.");
	move(PAGE);
}else{
?>
<form action="<?=PAGE?>/<?=$type?>/<?=$no?>/<?=$day?>/reserve_ok" method="post" onsubmit="return chk();" enctype="multipart/form-data">
<ul class="w100">
	<li class="w100 fw fm fl">&nbsp;<span class="cr">*</span>&nbsp;�� �ʼ� ���Ի����Դϴ�.</li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("name","�̸�");?></li>
	<li class="w80 fl bt1c"><?=$_SESSION[name]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><?=label("sex","����");?></li>
	<li class="w80 fl bt1c"><?=input("text","sex","","100");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;������</li>
	<li class="w80 fl bt1c"><?=date("Y-m-d",strtotime(date("$type-$no-$day")));?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("address","�ּ�");?></li>
	<li class="w80 fl bt1c"><?=input("text","address","","300");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("phone","�ڵ�����ȣ");?></li>
	<li class="w80 fl bt1c"><?=input("text","phone","","300");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">	<?=label("wfile","����");?></li>
	<li class="w80 fl bt1c"><?=input("file","wfile","","");?></li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","��û�ϱ�","","");?>&nbsp;<?=input("reset","�ٽþ���","","");?>&nbsp;<?=input("button","�������","location.replace('".PAGE."');","");?></li>
</ul>
</form>
<?
}
?>