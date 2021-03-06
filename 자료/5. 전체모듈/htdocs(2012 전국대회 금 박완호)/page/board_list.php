<?php

	// 테이블 선택
	$db->table = 'board';

	$list_s = "idx";

	if($_POST['type'] && $_POST['line']) alert(false,"{$get_page}list/1/{$_POST['line']}/{$_POST['type']}/".encode($_POST['key'])."/");

	// 주소 값 저장
	$search_type = $var_array[6] ? $var_array[6] : NULL;
	$search_key = $var_array[7] ? decode($var_array[7]) : NULL;

	$line = $var_array[5] ? $var_array[5] : '5';

	$order = "date desc";

	if($search_type) {

		$sel_type[$search_type] = "selected=\"selected\"";
		$sel_line[$line] = "selected=\"selected\"";

		if($search_key) $list_s = "instr(name,binary('{$search_key}')) || instr(subject,binary('{$search_key}')) || instr(date,binary('{$search_key}')) || instr(email,binary('{$search_key}')) || instr(content,binary('{$search_key}'))";

		$add_paginate = "{$line}/{$search_type}/".encode($search_key)."/";

		$order = "{$search_type} asc";

	}

	// 페이지 나누기
	$start = ($page_num-1) * $line;
	$total = $db->cnt($list_s);
	$paginate = paginate($page_num,$line,$total,"{$get_page}list/&&/{$add_paginate}",'board');

	$list_r = $db->select("{$list_s} order by {$order} limit {$start}, {$line}");

?>
<p class="mb15">
	총 게시글 : <span class="bold red"><?php echo $total ?></span> 개
</p>
<table cellspacing="0" summary="게시글 목록" class="table_list mb30">
	<colgroup>
		<col width="10%" />
	</colgroup>
	<thead>
		<tr>
			<th scope="col">번호</th>
			<th scope="col">작성자</th>
			<th scope="col">이메일</th>
			<th scope="col">제목</th>
			<th scope="col">작성일</th>
		</tr>
	</thead>
	<tbody>
	<?php

		for($i = $total-$start; $list = mysql_fetch_assoc($list_r); $i--) {

			$list = safe_html($list);

			$bname = hit($list['name'],$search_key);

			$bemail = hit($list['email'],$search_key);

			$bsubject = hit($list['subject'],$search_key);

			$bdate = hit($list['date'],$search_key);

			$list['email'] = hex($bdate);

			echo "<tr>";
				
				echo "<td>{$list['idx']}</td>";

				echo "<td>{$bname}</td>";

				echo "<td>{$bemail}</td>";

				echo "<td><a href=\"{$get_page}view/{$list['idx']}/".encode($search_key)."\" title=\"{$list['subject']}\">{$bsubject}</a></td>";

				echo "<td>{$bdate}</td>";

			echo "</tr>";

		}

	?>
	</tbody>
</table>

<?php echo $paginate ?>

<form id="bfrm" class="f_right" action="" method="post" enctype="multipart/form-data">
	<fieldset>
		<legend>Board Search</legend>
		<div class="blind">
		</div>
		<div class="bfrm">
			<select name="type" id="type" title="정렬방법">
				<option value="name" <?php echo $sel_type['name'] ?>>작성자</option>
				<option value="email" <?php echo $sel_type['email'] ?>>이메일</option>
				<option value="subject" <?php echo $sel_type['subject'] ?>>제목</option>
			</select>
			<select name="line" id="line" title="리트스 개수">
				<option value="5" <?php echo $sel_line['5'] ?>>5개</option>
				<option value="10" <?php echo $sel_line['10'] ?>>10개</option>
				<option value="15" <?php echo $sel_line['15'] ?>>15개</option>
			</select>
			<input type="text" name="key" id="key" title="검색어" value="<?php echo $search_key ?>" class="input" />
			<input type="submit" title="검색" value="검색" class="btn" />
		</div>
	</fieldset>
</form>