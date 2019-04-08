<?php
$row = fetarr("select * from menu where no='$no'");
$input->value = $row;
?>
<form action="<?php echo PAGE."/madd_ok/{$no}";?>" method="post">
<div class="content">
	<ul>
		<li><?php echo label("메인아이디","main_id");?></li>
		<li><?php echo $input->input("text","main_id","","20");?></li>
	</ul>
	<ul>
		<li><?php echo label("타이틀","title");?></li>
		<li><?php echo $input->input("text","title","","20").$input->input("hidden","state","update"); ?></li>
	</ul>
	<ul class="bt">
		<li><?php echo $input->input("submit","수정하기").nb().$input->input("button","뒤로가기","move('".PAGE."');"); ?></li>
	</ul>
</div>
</form>