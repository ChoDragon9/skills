<?
if($sub_id){
	$where = "where (subject like '%$_POST[schText]%' || content like '%$_POST[schText]%' || tags like '%$_POST[schText]%' || name like '%$_POST[schText]%') && (main_id='$main_id' && sub_id='$sub_id') order by no desc";
}else{
	$where = "where (subject like '%$_POST[schText]%' || content like '%$_POST[schText]%' || tags like '%$_POST[schText]%' || name like '%$_POST[schText]%') && (main_id='$main_id') order by no desc";
}
if(!$ok = fetch("select no from content $where")){
	echo '<ul class="s_2 ft12 cc"><li>등록된 게시물이 없습니다.</li></ul>';
}else{
	$page = 3;
	$page_num=$_POST[page_num2];
	if(!$page_num)$page_num=1;
	$total = num("select no from content $where");
	$start = $page * ($page_num-1);
	$page_arr = ceil($total/$page);
	$res=sql("select * from content $where limit $start,$page");
	while($row=mysql_fetch_array($res)){
	?>
	<ul class="w100">
		<li class="w100 text2 ft14 fw ul"><form action="" method="post" id="page2"><input type="hidden" value="<?=$_POST[schText]?>" name="schText" /><input type="hidden" value="1" id="page_num2" name="page_num2" /></form><a href="<?=PAGE?>/<?=$row[sub_id]?>/view.php/<?=$row[no]?>"><?=hlt($row[subject])?></a></li>
		<li class="w100 ft11 c9"><?=hlt($row[name])?>&nbsp;<?=$row[wdate]?></li>
	</ul>
	<ul class="w100 lh">
		<li class="w100 ft12"><?=hlt(text($row[content],100))?></li>
	</ul>
	<ul class="w100">
	<li class="ul w100 ft11">Tags&nbsp;:&nbsp;<?=hlt($row[tags])?></li>
	</ul>
	<?
	}
	?>
	<ul class="w100">
		<li class="w100 tc ft11 text2"><?=page1($page_num,$page_arr,"javascript:page2");?></li>
	</ul>
	<?
}
?>