<form action="<?php echo PAGE."/add_ok";?>" method="post" id="frm">
<div class="content">
	<ul>
		<li class="w20 bg"><?php nb(3); label("����","subject");?></li>
		<li class="w80"><?php nb(3); $input->input("text","subject","","50"); $input->input("hidden","state","insert");?></li>
	</ul>
	<ul class="con">
		<li class="w20 bg"><?php nb(3); label("����","content");?></li>
		<li class="w80"><?php nb(3); $input->input("textarea","content");?></li>
	</ul>
	<!--
	<ul>
		<li class="w20 bg"><?php nb(3); label("÷������","wfile");?></li>
		<li class="w80"><?php nb(3); $input->input("file","wfile","","30");?></li>
	</ul>
	-->
	<ul class="bt">
		<li><?php $input->input("button","����ϱ�","this.style.display='none'; selectid('frm').submit();"); nb(); $input->input("button","�ڷΰ���","move('".PAGE."');");?></li>
	</ul>
</div>
<?php
?>
</form>