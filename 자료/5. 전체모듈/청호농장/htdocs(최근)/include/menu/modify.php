<?php
$row = $db->fetarr("select * from menu where no='$no'");
$input->value = $row;
?>
<form action="<?php echo PAGE."/modify_ok";?>" method="post">
	<div class="content">
	<ul>
		<li class="w20 bg"><?php nb(3);?>메뉴명</li>
		<li class="w80"><?php nb(3); echo $row['title'];?></li>
	</ul>
	<ul class="con">
		<li class="w20 bg"><?php nb(3);?>콘텐츠</li>
		<li class="w80"><?php nb(3); $input->input("textarea","content"); $input->input("hidden","no");?></li>
	</ul>
	<ul class="bt">
		<li><?php $input->input("submit","수정하기"); nb(); $input->input("button","뒤로가기","back();");?></li>
	</ul>
	</div>
</form>