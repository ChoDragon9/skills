<?php
if($_SESSION['ulv'] != 10){
	exit;
}
if(!empty($type)){
	include("./include/cateadmin/{$type}.php");
}else{
	?>
	<div class="w100 h30 fl"><?php echo $input->input("button","메인추가","move('".PAGE."/madd');");?></div>
	<?php
	$sql = "select * from menu where type='main' and hd='1' order by no asc";
	$res = sql($sql);
	while($row = fetch($res)){
	?>
	<div class="cateadmin">
		<ul>
			<li><?php echo $row['title'];?></li>
			<li><?php echo $row['main_id'];?></li>
			<li><?php echo $row['type'];?></li>
			<li><?php echo $input->input("button","수정","move('".PAGE."/mmo/".$row['no']."');").nb(2).$input->input("button","삭제","move('".PAGE."/madd_ok/".$row['no']."');").nb(2).$input->input("button","서브추가","move('".PAGE."/sadd/".$row['no']."');"); ?></li>
		</ul>
		<?php
		$sql2 = "select * from menu where type!='main' and main_id='$row[main_id]' order by no asc";
		$res2 = sql($sql2);
		while($row2 = fetch($res2)){
		?>
		<ul>
			<li><?php echo $row2['title'];?></li>
			<li><?php echo $row2['sub_id'];?></li>
			<li><?php echo $row2['type'];?></li>
			<li><?php echo $input->input("button","수정","move('".PAGE."/smo/".$row2['no']."');").nb(2).$input->input("button","삭제","move('".PAGE."/sadd_ok/".$row2['no']."');");?></li>
		</ul>
		<?php
		}
		?>
		<ul class="bt"><li></li></ul>
	</div>
	<?php
	}
}
?>