<?
if($type){
	include("../include/product/".$type.".php");
}else{
	if(!$_SESSION[name]) session_destroy();
?>
<ul class="w100">
	<li class="w60 fl ft12 fw fm cg"><?if($_SESSION[name]){?><a href="<?=PAGE?>/my">[�� �ֹ���Ȳ����/��ٱ���]</a><?}else{?><a href="<?=PAGE?>/my">[�� �ֹ���Ȳ����]</a><?}?></li>
	<li class="w40 ar fl">&nbsp;<span class="cr">*</span> ��ǰ�Ұ��� Ŭ���Ͻø� �ֹ��������� �ֽ��ϴ�.</li>
</ul>
<ul class="w100 fw fm ac">
	<li class="w10 bt2c fl">��ǰ��</li>
	<li class="w20 bt2c fl">�̹���</li>
	<li class="w50 bt2c fl">��ǰ�Ұ�</li>
	<li class="w10 bt2c fl">����/kg</li>
	<li class="w10 bt2c fl">������</li>
</ul>
	<?
	$res = sql("select * from product order by no desc");
	while($row= mysql_fetch_array($res)){
	?>
	<ul class="w100">
	<li class="w10 bt1c fl ac"><?=$row[name]?></li>
	<li class="w20 bt1c fl ac"><img src="<?=$file?>/<?=$row[wfile]?>" alt="<?=$row[file_name]?>" title="<?=$row[file_name]?>" onchange="yunsan();" onkeyup="yunsan()" style="width:100px;height:80px;" /></li>
	<li class="w50 bt1c fl"><a href="<?=PAGE?>/view/<?=$row[no]?>"><?=$row[content]?></a></li>
	<li class="w10 bt1c fl ac"><?=$row[price]?>��<br />/<?=$row[kg]?>kg</li>
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