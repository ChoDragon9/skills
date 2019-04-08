<?
$row = fetch("select * from board where no='$no'");
?>
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c">이름</li>
	<li class="w80 fl bt2c"><?=$row[name]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">제목</li>
	<li class="w80 fl bt1c"><?=$row[subject]?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">이미지</li>
	<li class="w80 fl bt1c"><img src="<?=$file?>/<?=$row[wfile]?>" title="<?=$row[file_name]?>" alt="<?=$row[file_name]?>" style="width:300px; height:200px;" /></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c">내용</li>
	<li class="w80 fl bt1c"><?=$row[content]?></li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("button","목록으로","location.replace('".PAGE."');","");?>&nbsp;<?=input("button","삭제","if(confirm('삭제하시겠습니까?')){location.replace('".PAGE."/delete/".$row[no]."');}","");?>&nbsp;<?=input("button","수정","if(confirm('수정하시겠습니까?')){location.replace('".PAGE."/modify/".$row[no]."');}","");?></li>
</ul>