<?php
$row = fetarr("select * from menu where no='$no'");
$input->value = $row;
?>
<form action="<?php echo PAGE."/sadd_ok/{$no}";?>" method="post">
<div class="content">
	<ul>
		<li><?php echo label("서브아이디","sub_id");?></li>
		<li><?php echo $input->input("text","sub_id","","20");?></li>
	</ul>
	<ul>
		<li><?php echo label("타이틀","title");?></li>
		<li><?php echo $input->input("text","title","","20").$input->input("hidden","state","update"); ?></li>
	</ul>
	<ul>
		<li><?php echo label("파일명","type");?></li>
		<li><?php echo $input->input("text","type","","20").$input->input("hidden","main_id",$row['main_id']); ?></li>
	</ul>
	<ul class="bt">
		<li><?php echo $input->input("submit","등록하기").nb().$input->input("button","뒤로가기","move('".PAGE."');"); ?></li>
	</ul>
</div>
</form>