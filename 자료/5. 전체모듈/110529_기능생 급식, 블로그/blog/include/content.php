<?
if($sub_id){
	$where = "where main_id='$main_id' && sub_id='$sub_id' order by no desc";
}else{
	$where = "where main_id='$main_id' order by no desc";
}
if(!$ok = fetch("select no from content $where")){
	echo '<span class="ft11 c9">등록된 게시물이 없습니다.</span>';
}else{
	$page = 5;
	$page_num=$_POST[page_num1];
	if(!$page_num)$page_num=1;
	$total = num("select no from content $where");
	$start = $page * ($page_num-1);
	$page_arr = ceil($total/$page);
	$res=sql("select * from content $where limit $start,$page");
	while($row=mysql_fetch_array($res)){
	?>
	<ul class="w100">
		<li class="w100 text2 ft14 fw ul"><form action="" method="post" id="page1"><input type="hidden" value="1" id="page_num1" name="page_num1" /></form><a href="<?=PAGE?>/<?=$row[sub_id]?>/view.php/<?=$row[no]?>"><?=$row[subject]?></a></li>
		<li class="w100 ft11 c9"><?=$row[name]?>&nbsp;<?=$row[wdate]?></li>
	</ul>
	<ul class="w100 lh">
		<li class="w100 ft12"><?=stripslashes($row[content])?></li>
	</ul>
	<ul class="w100">
	<li class="ul w100 ft11">Tags&nbsp;:&nbsp;<?=$row[tags]?></li>
	</ul>
	<?
	}
	?>
	<ul class="w100">
		<li class="w100 tc ft11 text2"><?=page1($page_num,$page_arr,"javascript:page1");?></li>
	</ul>
	<?
}
?>