<?
if(!$_SESSION[lv] == 10){
	alert("������ �����ϴ�.");
	move($index);
}else{
?>
<ul class="w100">
	<li class="w100 fl"><?=input("button","������CSV���������ϱ�","location.replace('".$url."/file/csv.php');","");?></li>
</ul>

<ul class="W100">
	<li class="w100 fl">&nbsp;</li>
</ul>
<ul class="w100 fw fm ac">
	<li class="w20 bt2c fl">����</li>
	<li class="w10 bt2c fl">������</li>
	<li class="w10 bt2c fl">����</li>
	<li class="w30 bt2c fl">�ּ�</li>
	<li class="w30 bt2c fl">��û��</li>
</ul>
<?
$res = sql("select * from experlist order by no desc");
while($row= mysql_fetch_array($res)){
	if(!file_exists("../file/".$row[wfile])){
		$row[wfile] = "nofile.jpg";
	}
?>
<ul class="w100 ac">
	<li class="w20 bt1c fl"><img src="<?=$file?>/<?=$row[wfile]?>" title="<?=$row[file_name]?>" alt="<?=$row[file_name]?>" style="width:80px; height:50px;" /></li>
	<li class="w10 bt1c fl"><?=$row[name]?></li>
	<li class="w10 bt1c fl"><?=$row[sex]?></li>
	<li class="w30 bt1c fl"><?=$row[address]?></li>
	<li class="w30 bt1c fl"><?=date("Y-m-d",strtotime(date("$row[wyear]-$row[wmonth]-$row[wday]")));?></li>
</ul>
<?
}
?>
<ul class="W100">
	<li class="w100 bt1c fl">&nbsp;</li>
</ul>
<?
}
?>