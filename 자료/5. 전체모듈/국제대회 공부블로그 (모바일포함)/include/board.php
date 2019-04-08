<?php
if(!defined("IN_SITE")) exit;
?>
<div id="now_total">
<strong>
<?php
$schsql = " ( subject like binary('%$schText%') or content like binary('%$schText%') or wdate like binary('%$schText%') or wdate2 like binary('%$schText%') or tags like binary('%$schText%') )";
$numsql = "select no from board";
if(!empty($sdt)){
	echo $sdt['title']."</strong> (";
	$numsql .= " where sub_id='$sub_id'";
	if($schText != "") $numsql .= " and".$schsql;
}else{
	if($schText != "") $numsql .= " where".$schsql;
	echo "전체</strong> (";
}
echo num($numsql).")";
?>
</div>
<?php
$sql = "select * from board";
if(!empty($sdt)){
	$sql .= " where sub_id='$sdt[sub_id]'";
	if($schText != "") $sql .= " and".$schsql;
}else if($schText != ""){
	$sql .= " where ".$schsql;
}
$page = 10;
$no = !empty($no)  ? $no : 1;
$pageing = pageing($page,$no,$sql);
if($pageing['total'] > 0){
?>
<div class="con_right_pageing"><?php echo $pageing['button'];?></div>
<?php
}
$res = sql($sql." order by no desc limit $pageing[start],$page");
while($row = fetch($res)){
?>
	<ul class="sub_info">
		<li>
		<?php
		if(!empty($row['wtype'])) echo $row['wtype']."-";
		echo hlt($row['subject'])."<span class='subid'>";
		echo nb(2)."|".nb(2);
		echo $row['sub_id']."</span>";
		?>
		</li>
		<li class="wdate">
		<?php
			if($row['wdate2'] != "0000-00-00 00:00:00"){
				echo hlt(board($row['wdate2']))."<strong>수정됨</strong>";
			}else{
				echo hlt(board($row['wdate']));
			}
		?>
		</li>
	</ul>
	<div class="content_out"><?php echo hlt(view($row['content']));?></div>
	<ul class="content_tags">
		<li class="tags"><strong>&lt;태그&gt;</strong><?php echo nb(2).hlt($row['tags']);?></li>
		<li class="control">
		<?php
		if(!empty($_SESSION['ulv'])){
			echo $input->input("button","수정","if(confirm('수정하시겠습니까?')){move('/modify/".$row['no']."');}").$input->input("button","삭제","if(confirm('삭제하시겠습니까?')){if(confirm('정말로 삭제하시겠습니까?')){move('/delete/".$row['no']."');}}");
		}
		?>
		</li>
	</ul>
<?php
}
?>
<div class="con_right_pageing"><?php if($pageing['total'] > 0){echo $pageing['button'];}?></div>