<?
if($_SESSION[lv] ==10){
if($type){
	include("../include/admin/".$type.".php");
}else{
	?>
		<ul class="w100">
			<li class="w100 fl ft14 cg fw fm"><a href="<?=PAGE?>/madd">[�����������߰�]</a></li>
		</ul>
	<?
	$res = sql("select * from menu where type='main' and (main_id!='admin')");
	while($row = mysql_fetch_array($res)){
		?>
		<ul class="w100 ac">
			<li class="w20 fw fm cg fl bt2c"><?=$row[main_id]?></li>
			<li class="w20 fw fm cg fl bt2c"><?=$row[title]?></li>
			<li class="w20 fw fm cg fl bt2c"><a href="<?=PAGE?>/mmo/<?=$row[no]?>">[����]</a></li>
			<li class="w20 fw fm cg fl bt2c"><a href="<?=PAGE?>/delete/<?=$row[no]?>">[����]</a></li>
			<li class="w20 fw fm cg fl bt2c"><a href="<?=PAGE?>/sadd/<?=$row[no]?>">[�����������߰�]</a></li>
		</ul>
		<?
		$res2= sql("select * from menu where type!='main' and main_id='$row[main_id]'");
		while($row2 = mysql_fetch_array($res2)){
		?>
		<ul class="w100 ac">
			<li class="w20 fl bt1c"><?=$row2[sub_id]?></li>
			<li class="w20 fl bt1c"><?=$row2[title]?></li>
			<li class="w20 fl bt1c"><a href="<?=PAGE?>/smo/<?=$row2[no]?>">[����]</a></li>
			<li class="w20 fl bt1c"><a href="<?=PAGE?>/delete/<?=$row2[no]?>">[����]</a></li>
			<li class="w20 fl bt1c"></li>
		</ul>
		<?
		}
		?>
		<ul class="w100">
			<li class="w100 bt1c fl">&nbsp;</li>
		</ul>
		<?
	}
}
}else{
	alert("������ �����ϴ�.");
	move($index);
}
?>