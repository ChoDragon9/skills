<?
if($type){
	include("../include/gallery/".$type.".php");
}else{
	?>
<ul class="W100">
	<li class="w100 bb1c"><?=input("button","�����ø���","location.replace('".PAGE."/add');","");?></li>
</ul>
<?
$row2=fetch("select * from board where main_id='$main_id' and sub_id='$sub_id' order by no desc");
$res = sql("select * from board where main_id='$main_id' and sub_id='$sub_id' order by no desc");
while($row= mysql_fetch_array($res)){
?>
<ul class="gal ac">
	<li class="w100"><a href="<?=PAGE?>/view/<?=$row[no]?>"><img src="<?=$file?>/<?=$row[wfile]?>" title="<?=$row[file_name]?>" alt="<?=$row[file_name]?>" /></a></li>
	<li class="w100 fw fm">�ۼ��� : <?=$row[name]?></li>
	<li class="w100">�ۼ��� : <?=$row[wdate]?></li>
</ul>
<?
}
if(!$row2[no]){
	?>
	<ul class="w100">
		<li class="w100 ac fl ft14 fw">��ϵ� ������ �����ϴ�.</li>
	</ul>
	<?
}
?>
<ul class="W100">
	<li class="w100 bt1c"><?=input("button","�����ø���","location.replace('".PAGE."/add');","");?></li>
</ul>
<?
}
?>