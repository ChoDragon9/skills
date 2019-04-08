<div id="category">
	<div id="category_top"></div>
	<!-- Category Inner Start -->
	<div id="category_middle">
	<?php
	if(!empty($_SESSION['ulv'])){
		echo '<div class="w100 fl fw h20">'.nb(3).'<a href="/cateadmin">카테고리관리</a></div>';
	}
	$sql = "select main_id,title from menu where type='main' and hd='1' order by no asc";
	$res = sql($sql);
	while($row = fetch($res)){
		?>
		<ul class="main_cate">
			<li class="main_txt">
				<div class="left_bg"><?php echo img("/img/cate_left_bg.png",""); ?></div>
				<div class="center_bg"><?php echo $row['title'];?></div>
				<div class="right_bg"><?php echo img("/img/cate_right_bg.png","");?></div>
			</li>
			<li class="view_control"><?php echo img("/img/cate_in.png","close");?></li>
		</ul>
		<?php
		$sql2 = "select sub_id,title from menu where type!='main' and main_id='$row[main_id]' order by no asc";
		$res2 = sql($sql2);
		echo '<ul class="sub_cate">';
		while($row2= fetch($res2)){
			$num = num("select no from board where sub_id='$row2[sub_id]'");
			echo '<li><a href="/'.$row2['sub_id'].'">'.$row2['title'].' ('.$num.')</a></li>';
		}
		echo '</ul>';
	}
	?>
	</div>
	<!-- Category Inner End -->
	<div id="category_bottom"></div>
</div>