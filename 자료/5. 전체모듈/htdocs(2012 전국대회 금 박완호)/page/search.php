<?php

	// 데이타 처리 파일
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/trade_ok.php");

	// 테이블 선택
	$db->table = 'furniture';

	if($_POST['type']) alert(false,"{$get_page}list/1/{$_POST['type']}/".encode($_POST['key'])."/");

	// 주소 값 저장
	$search_type = $var_array[5] ? $var_array[5] : NULL;
	$search_key = $var_array[6] ? decode($var_array[6]) : NULL;


	if($search_type) {

		$type_sel[$search_type] = "selected=\"selected\"";

		if($search_type == 'title') $furniture_s = "instr(title,binary('{$search_key}'))";
		if(!$search_key) $furniture_s = "idx";

		$search_key = str_replace('\\\\','\\',$search_key);

		// 페이지 나누기
		$line = '5';
		$start = ( $page_num - 1) * $line;
		$total = $db->cnt($furniture_s);
		$paginate = paginate($page_num,$line,$total,"{$get_page}list/&&/{$search_type}/".encode($search_key)."/",'search');

		// 단어 수 세기
		if($search_key) {
			$furniture_record = '0';
			$furniture_total_r = $db->select($furniture_s);
			while($furniture_total = mysql_fetch_assoc($furniture_total_r)) {
				$furniture_record += substr_count($furniture_total['title'],$search_key);
				$furniture_record += substr_count($furniture_total['company'],$search_key);
				$furniture_record += substr_count($furniture_total['cause'],$search_key);
			}
		}
		
		$furniture_r = $db->select("{$furniture_s} order by idx desc limit {$start}, {$line}");

	}

?>
<form id="insert_frm" action="" method="post">
	<fieldset>
		<legend>Search Form</legend>
		<div class="blind">
			<input type="hidden" name="action" value="insert" />
			<input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>" />
			<input type="hidden" name="name" value="<?php echo $_SESSION['name'] ?>" />
			<input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>" />
			<input type="hidden" name="lv" value="2" />
			<input type="hidden" name="idx" value="" />
		</div>
	</fieldset>
</form>
<form id="frm" action="" method="post" onsubmit="return frmChk(this,'key')">
	<fieldset>
		<legend>Search Form</legend>
		<div class="blind">
			<input type="hidden" name="member_lv" id="member_lv" value="<?php echo $_SESSION['lv'] ?>" />
			<input type="hidden" name="type" value="title" />
		</div>
		<div class="search">
			<div class="search_inner">
				<div>
					<label for="key">가구명 :</label>
					<input type="text" name="key" id="key" title="검색어" value="<?php echo $search_key ?>" />
					<input type="submit" title="검색" value="검색" class="btn" />
				</div>
			</div>
		</div>
	</fieldset>
</form>
<?php if($search_key) { ?>
<p class="f_right mt15">
	총 검색 결과 단어 수 <span class="bold red"><?php echo $furniture_record ?></span> 개
</p>
<?php } ?>

<?php 
	
	if($search_type) {

?>

	

	<table cellspacing="0" summary="가구 검색" class="table_list mb30 mt30">

		<colgroup>
			<col width="10%" />
		</colgroup>

		<thead>
			<tr>
				<th scope="col">번호</th>
				<th scope="col">가구명</th>
				<th scope="col">제조사</th>
				<th scope="col">입수일</th>
				<th scope="col">사용용도</th>
				<?php if($_SESSION['login'] == 'login') { ?>
				<th scope="col">대여가능상태</th>
				<th scope="col">대여예약상태</th>
				<th scope="col">대여예약</th>
				<?php } ?>
				<th scope="col">일치단어수</th>
			</tr>
		</thead>

		<tbody>

<?php

		if($total == 0) echo "<tr><td colspan=\"9\">검색어와 일치하는 가구가 없습니다</td></tr>";

		for($i = $total-$start; $list = mysql_fetch_assoc($furniture_r); $i--) {

			$count = 0;

			if($search_key) {

				$count = substr_count($list['title'],$search_key);
				$count += substr_count($list['cause'],$search_key);
				$count += substr_count($list['company'],$search_key);
				$count += substr_count($list['date'],$search_key);

			}

			$furniture_type = $db->cnt("parent='{$list['idx']}'",'trade');

			$ftype = $furniture_type ? '불가능' : '가능';

			$furniture_type2 = $db->cnt("id=binary('{$_SESSION['id']}') and parent='{$list['idx']}'",'trade');

			$ftype2 = $furniture_type2 ? '예약중' : '비예약';

			if($search_type == 'title') {

				$list['title'] = hit($list['title'],$search_key);
				$list['company'] = hit($list['company'],$search_key);
				$list['date'] = hit($list['date'],$search_key);
				$list['cause'] = hit($list['cause'],$search_key);

			}

?>

			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $list['title'] ?></td>
				<td><?php echo $list['company'] ?></td>
				<td><?php echo $list['date'] ?></td>
				<td><?php echo $list['cause'] ?></td>
				<?php if($_SESSION['login'] == 'login') { ?>
				<td><?php echo $ftype ?></td>
				<td><?php echo $ftype2 ?></td>
				<?php if(!$furniture_type) { ?>
				<td><a href="#" onclick="frmSubmit('insert_frm','<?php echo $list['idx'] ?>'); return false;" title="예약하기">예약하기</a></td>
				<?php } else { ?>
				<td>-</td>
				<?php } ?>
				<?php } ?>
				<td><?php echo $count ?>개</td>
			</tr>

<?php

		}

?>

		
		</tbody>

	</table>

	<?php echo $paginate ?>

<?php

	} else {

		echo "<p class=\"center mt30\">가구명을 입력해주세요.</p>";

	}

?>