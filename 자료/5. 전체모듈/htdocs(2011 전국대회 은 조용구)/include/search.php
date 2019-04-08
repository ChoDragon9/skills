<div id="search">
<?
$schText = change($_POST[schText]);
if($schText != "" and $schText != ""){
	$res = sql("select * from menu where content like '%$schText%' or title like '%$schText%' and type!='main' and type='html'");
	while($row = mysql_fetch_array($res)){
	$num = substr_count($row[content],$schText) + substr_count($row[title],$schText);
	$number = $number + $num;
	}
	$res2 = sql("select * from experlist where name like '%$schText%' or sex like '%$schText%' or wyear like '%$schText%' or wmonth like '%$schText%' or wday like '%$schText%' or address like '%$schText%' or phone like '%$schText%'");
	while($row2 = mysql_fetch_array($res2)){
	$num2 = substr_count($row[name],$schText) + substr_count($row[sex],$schText) + substr_count($row[wyear],$schText) + substr_count($row[wmonth],$schText) + substr_count($row[wday],$schText) + substr_count($row[address],$schText) + substr_count($row[phone],$schText);
	$number2=  $number2 + $num2;
	}
}
?>
<form action="" method="post" id="frm">
	<ul class="w100">
		<li class="w20 fl ar fw fm ft12"><?=label("schText","검색어")?>&nbsp;</li>
		<li class="w80 fl"><?=input("text","schText",change($_POST[schText]),"400");?>&nbsp;<?=input("submit"," 검색 ","","");?><?=input("hidden","page_num","1","")?><?=input("hidden","page_num2","1","")?></li>
	</ul>
	<?
	if($schText != " " and $schText != ""){
		?>
	<ul class="w100">
		<li class="w100 fw fm">일치단어수 : <?=$number+$number2?></li>
	</ul>
	<?
}
?>
</form>
</div>
<?
if($schText != " " and $schText != ""){
	include("../include/search/experlist.php");
	include("../include/search/content.php");
}
?>