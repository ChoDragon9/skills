<?
$row = fetch("select * from product where no='$no'");
if(!$_SESSION[name]){
?>
<ul class="w100">
	<li class="w100 fw fm c6 fl">
	���� ��ȸ������ �ֹ��ϰ� �Խʴϴ�.
	</li>
</ul>
<?
}
?>
<form action="<?=PAGE?>/view_ok/<?=$row[no]?>" method="post" id="frm">
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c">��ǰ��</li>
	<li class="w80 fl bt2c"><?=$row[name]?><?=input("hidden","basket","1","");?><?=input("hidden","procode",$row[procode],"");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">����</li>
	<li class="w80 fl bt1c"><?=$row[local]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">�̹���</li>
	<li class="w80 fl bt1c"><img src="<?=$file?>/<?=$row[wfile]?>" title="<?=$row[file_name]?>" alt="<?=$row[file_name]?>" style="width:300px; height:200px;" /></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">����</li>
	<li class="w80 fl bt1c"><?=$row[content]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">������</li>
	<li class="w80 fl bt1c"><?=$row[anser]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">����/kg</li>
	<li class="w80 fl bt1c"><?=$row[price]?>��/<?=$row[kg]?>kg<?=input("hidden","price",$row[price],"");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">����</li>
	<li class="w80 fl bt1c"><?=input("button","���ϱ�","plu('+')","");?>&nbsp;<input type="text" name="num" id="num" title="num" class="input ar" onkeyup="yunsan()" onkeypress="return onlynum();" style="width:50px;" value="1" />��&nbsp;<?=input("button","����","plu('-')","");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">�ѱݾ�</li>
	<li class="w80 fl bt1c"><input type="text" name="total" id="total" title="total" class="input ar" style="width:100px;" value="<?=$row[price]?>" readonly />&nbsp;��</li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","�ֹ��ϱ�","","");?>&nbsp;<? if(!$_SESSION[name]){echo input("button","��ٱ��ϴ��","alert('��ٱ��ϼ��񽺴� �α����� �ϼž� �̿밡���մϴ�.'); location.replace('".$index."/login/login');","");}else{echo input("button","��ٱ��ϴ��","bas()","");}?>&nbsp;<?=input("button","�������","location.replace('".PAGE."');","");?></li>
</ul>
</form>