<?php

	// ���̺� ����
	$db->table = 'board';

	access($view = $db->fetch("idx='{$idx}'"),'������ �ҷ����� ���Ͽ����ϴ�.');

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

	<button title="�� ���" class="btn" onclick="link('<?php echo "{$get_page}" ?>'); return false;">�� ���</button>
	
</div>