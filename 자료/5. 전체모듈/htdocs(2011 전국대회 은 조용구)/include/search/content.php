<ul class="w100">
	<li class="w100 fl fw fm">일반 페이지 영역</li>
</ul>
<ul class="w100 fw fm ac">
	<li class="w20 fl bt2c">타이틀</li>
	<li class="w70 fl bt2c">내용</li>
	<li class="w10 fl bt2c">단어일치수</li>
</ul>
<?
$page = 5;
$page_num = $_POST[page_num];
if(!$page_num) $page_num = 1;
$total = num("select * from menu where content like '%$schText%' or title like '%$schText%' and type!='main' and type='html'");
$start = $page * ($page_num - 1);
$page_arr  = ceil($total/$page);
$res = sql("select * from menu where content like '%$schText%' or title like '%$schText%' and type!='main' and type='html' limit $start,$page");
while($row =mysql_fetch_array($res)){
	$num = substr_count($row[content],$schText) + substr_count($row[title],$schText);
	?>
	<ul class="w100 ac">
	<li class="w20 fl bt1c"><?=hlt($row[title])?></li>
	<li class="w70 fl bt1c"><a href="<?=$index?>/<?=$row[main_id]?>/<?=$row[sub_id]?>"><?=hlthex(hlt(substr(strip_tags($row[content]),0,50)))?></a></li>
	<li class="w10 fl bt1c"><?=$num?></li>
</ul>
	<?
}
?>
<ul class="w100">
	<li class="w100 fl bt1c ac"><?=page($page_num,$page_arr,"javascript:page")?></li>
</ul>