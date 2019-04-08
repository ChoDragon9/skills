<?php
$row = $db->fetarr("select * from board where no='$no'");
$row2= $db->fetarr("select * from member where no='$row[name]'");
?>
<div class="w100 fl h35 tr"><?php $input->input("button","뒤로가기","move('".PAGE."');");?></div>
<div class="content">
	<ul class="board">
		<li class="w20 bg"><?php nb(3);?>작성자</li>
		<li class="w30"><?php nb(3); echo $row2['name'];?></li>
		<li class="w20 bg"><?php nb(3);?>작성일</li>
		<li class="w30"><?php nb(3); echo wdate2($row['wdate']);?></li>
	</ul>
	<ul class="board">
		<li class="w20 bg"><?php nb(3);?>제목</li>
		<li class="w80"><?php nb(3); echo strcut($row['subject'],0,94);?></li>
	</ul>
	<ul class="bt">
		<li><?php echo nl2br($row['content']);?></li>
	</ul>
	<ul class="bt">
		<li>
		<?php
		$input->input("button","뒤로가기","move('".PAGE."');"); 
		if( ($_SESSION['ulv'] == 10 and $sub_id == "sub0") || ($sub_id == "sub1" and $_SESSION['uno'] == $row['name']) || $_SESSION['ulv'] == 10){
			nb();
			$input->input("button","수정","move('".PAGE."/modify/".$row['no']."');"); 
			nb(); 
			$input->input("button","삭제","if(confirm('삭제하시겠습니까?')){move('".PAGE."/add_ok/".$row['no']."');}");
		}
		?>
		</li>
	</ul>
</div>