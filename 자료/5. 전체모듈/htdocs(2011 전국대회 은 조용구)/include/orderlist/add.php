<form action="<?=PAGE?>/add_ok" method="post" id="frm">
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c">��ǰ��</li>
	<li class="w80 fl bt2c">
	<select name="procode">
	<?
	$res = sql("select * from product");
	while($row= mysql_fetch_array($res)){
		?>
		<option value="<?=$row[no]?>"><?=$row[name]?></option>
		<?
	}
	?>
	</select>
	</li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">�ֹ���</li>
	<li class="w80 fl bt1c"><?=input("text","id","","");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">����</li>
	<li class="w80 fl bt1c"><input type="text" name="num" id="num" title="num" class="input" style="width:100px;" onkeypress="return onlynum()" value="" /> ������ �Է��Ͻø� �ڵ����� �ѱݾ��� ��ϵ˴ϴ�.</li>
</ul>
<ul class="w100">
	<li class="w100 fl bt1c"><?=input("submit","����ϱ�","","")?>&nbsp;<?=input("reset","����","","");?>&nbsp;<?=input("button","�������","location.replace('".PAGE."');","");?></li>
</ul>
</form>