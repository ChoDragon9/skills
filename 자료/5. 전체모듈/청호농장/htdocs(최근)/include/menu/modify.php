<?php
$row = $db->fetarr("select * from menu where no='$no'");
$input->value = $row;
?>
<form action="<?php echo PAGE."/modify_ok";?>" method="post">
	<div class="content">
	<ul>
		<li class="w20 bg"><?php nb(3);?>�޴���</li>
		<li class="w80"><?php nb(3); echo $row['title'];?></li>
	</ul>
	<ul class="con">
		<li class="w20 bg"><?php nb(3);?>������</li>
		<li class="w80"><?php nb(3); $input->input("textarea","content"); $input->input("hidden","no");?></li>
	</ul>
	<ul class="bt">
		<li><?php $input->input("submit","�����ϱ�"); nb(); $input->input("button","�ڷΰ���","back();");?></li>
	</ul>
	</div>
</form>