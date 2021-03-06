<?php

	// 데이타 처리 파일
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/trade_ok.php");

	access($_SESSION['login'] == 'login','로그인 후 이용해주세요.','/page/member/login/');

	$list_s = "lv != '2' and id=binary('{$_SESSION['id']}')";

	// 페이지 나누기
	$line = '5';
	$start = ($page_num-1) * $line;
	$total = $db->cnt($list_s);
	$paginate = paginate($page_num,$line,$total,"{$get_page}mypage/&&/",'mypage');

	$list_r = $db->select("{$list_s} order by idx desc limit {$start}, {$line}");


?>

<form id="update_frm" action="" method="post">
	<fieldset>
		<legend>Update Form</legend>
		<div class="blind">
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="idx" value="" />
		</div>
	</fieldset>
</form>

<div class="caption">

	<?php echo $_SESSION['id'] ?> 님이 대여한 가구목록입니다.

</div>

<table cellspacing="0" summary="가구대여목록" class="table_list">
	
	<colgroup>
		<col width="10%" />
	</colgroup>

	<thead>	
		<tr>
			<th scope="col">번호</th>
			<th scope="col">가구명</th>
			<th scope="col">제조사</th>
			<th scope="col">사용용도</th>
			<th scope="col">대여일시</th>
			<th scope="col">반납하기</th>
		</tr>
	</thead>

	<tbody>
		<?php

			if($total == 0) echo "<tr><td colspan=\"6\">대여중인 가구가 없습니다.</td></tr>";

			for($i = $total-$start; $list = mysql_fetch_assoc($list_r); $i--) {

				$view = $db->fetch("idx='{$list['parent']}'",'furniture');

				echo "<tr>";

					echo "<td>{$i}</td>";

					echo "<td>{$view['title']}</td>";

					echo "<td>{$view['company']}</td>";

					echo "<td>{$view['cause']}</td>";

					echo "<td>{$list['date']}</td>";

					if($list['lv'] == '1') {

					echo "<td><a href=\"javascript:frmSubmit('update_frm','{$list['idx']}')\" title=\"반납하기\">반납하기</a></td>";

					} else {

						echo "<td>반납대기중</td>";

					}

				echo "</tr>";

			}

		?>
	</tbody>

</table>