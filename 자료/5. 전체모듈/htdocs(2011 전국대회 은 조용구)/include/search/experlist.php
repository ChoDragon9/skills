<ul class="w100">
	<li class="w100 fl fw fm">&nbsp;</li>
</ul>
<ul class="w100">
	<li class="w100 fl fw fm">������ ������ ����</li>
</ul>
<ul class="w100 fw fm ac">
	<li class="w10 fl bt2c">�ֹ���</li>
	<li class="w20 fl bt2c">�ּ�</li>
	<li class="w40 fl bt2c">����ó</li>
	<li class="w20 fl bt2c">��û��</li>
	<li class="w10 fl bt2c">�ܾ���ġ��</li>
</ul>
<?
$page = 5;
$page_num = $_POST[page_num2];
if(!$page_num) $page_num = 1;
$total = num("select * from experlist where name like '%$schText%' or sex like '%$schText%' or wyear like '%$schText%' or wmonth like '%$schText%' or wday like '%$schText%' or address like '%$schText%' or phone like '%$schText%'");
$start = $page * ($page_num - 1);
$page_arr = ceil($total/$page);
$res = sql("select * from experlist where name like '%$schText%' or sex like '%$schText%' or wyear like '%$schText%' or wmonth like '%$schText%' or wday like '%$schText%' or address like '%$schText%' or phone like '%$schText%' limit $start,$page");
while($row =mysql_fetch_array($res)){
	$num = substr_count($row[name],$schText) + substr_count($row[sex],$schText) + substr_count($row[wyear],$schText) + substr_count($row[wmonth],$schText) + substr_count($row[wday],$schText) + substr_count($row[address],$schText) + substr_count($row[phone],$schText);
	?>
	<ul class="w100 ac">
	<li class="w10 fl bt1c"><?=hlt($row[name])?>&nbsp;</li>
	<li class="w20 fl bt1c"><?=hlt($row[address])?>&nbsp;</li>
	<li class="w40 fl bt1c"><?=hlt($row[phone])?></li>
	<li class="w20 fl bt1c"><?=hlt(date("Y-m-d",strtotime(date("$row[wyear]-$row[wmonth]-$row[wday]"))));?></li>
	<li class="w10 fl bt1c"><?=$num?></li>
</ul>
	<?
}
?>
<ul class="w100">
	<li class="w100 fl bt1c ac"><?=page($page_num,$page_arr,"javascript:page2");?></li>
</ul>