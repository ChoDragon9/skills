<?php

	// 테이블 선택
	$db->table = 'board';

	access($view = $db->fetch("idx='{$idx}'"),'정보를 불러오지 못하였습니다.');

	$search_key = $var_array[5] ? decode($var_array[5]) : NULL;

	$bcontent = hit($view['content'],$search_key);

	$bsubject = hit($view['subject'],$search_key);

	$bname = hit($view['name'],$search_key);

	$bemail = hex($view['email']);

	$bemail = hit($view['email'],$search_key);

	$bdate = hit($view['date'],$search_key);

?>
<div class="caption"><span class="f_left"><?php echo $bsubject ?></span><span class="f_right"><?php echo $bname ." | ". $bemail ." | " . $bdate ?></span></div>
<div class="table_cont mb30">
	<?php echo nl2br($bcontent) ?>
</div>
<div class="bottom_btn">

	<button title="글 목록" class="btn" onclick="link('<?php echo "{$get_page}" ?>'); return false;">글 목록</button>
	
</div>