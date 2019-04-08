<form action="<?php echo PAGE."/add_ok";?>" method="post" id="frm">
<div class="content">
	<ul>
		<li class="w20 bg"><?php nb(3); label("제목","subject");?></li>
		<li class="w80"><?php nb(3); $input->input("text","subject","","50"); $input->input("hidden","state","insert");?></li>
	</ul>
	<ul class="con">
		<li class="w20 bg"><?php nb(3); label("내용","content");?></li>
		<li class="w80"><?php nb(3); $input->input("textarea","content");?></li>
	</ul>
	<!--
	<ul>
		<li class="w20 bg"><?php nb(3); label("첨부파일","wfile");?></li>
		<li class="w80"><?php nb(3); $input->input("file","wfile","","30");?></li>
	</ul>
	-->
	<ul class="bt">
		<li><?php $input->input("button","등록하기","this.style.display='none'; selectid('frm').submit();"); nb(); $input->input("button","뒤로가기","move('".PAGE."');");?></li>
	</ul>
</div>
<?php
?>
</form>