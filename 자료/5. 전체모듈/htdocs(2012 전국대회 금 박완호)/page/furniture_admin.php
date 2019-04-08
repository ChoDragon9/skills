<?php

	// 데이타 처리 파일
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/trade_ok.php");

	$list_s = "lv='2'";

	// 페이지 나누기
	$line = '5';
	$start = ($page_num-1) * $line;
	$total = $db->cnt($list_s);

	$list_r = $db->select("{$list_s} order by idx desc limit {$start}, {$line}");

	access($_SESSION['lv'] == '1','관리자만 접근할 수 있습니다.');


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

	대여예약 가구 목록

</div>

<table cellspacing="0" summary="가구대여목록" class="table_list mb30">
	
	<colgroup>
		<col width="10%" />
	</colgroup>

	<thead>	
		<tr>
			<th scope="col">번호</th>
			<th scope="col">아이디</th>
			<th scope="col">가구명</th>
			<th scope="col">제조사</th>
			<th scope="col">사용용도</th>
			<th scope="col">승인하기</th>
		</tr>
	</thead>

	<tbody>
		<?php

			if($total == 0) echo "<tr><td colspan=\"6\">신청된 가구가 없습니다.</td></tr>";

			for($i = $total-$start; $list = mysql_fetch_assoc($list_r); $i--) {

				$view = $db->fetch("idx='{$list['parent']}'",'furniture');

				echo "<tr>";

					echo "<td>{$i}</td>";

					echo "<td>{$list['id']}</td>";

					echo "<td>{$view['title']}</td>";

					echo "<td>{$view['company']}</td>";

					echo "<td>{$view['cause']}</td>";

					echo "<td><a href=\"javascript:frmSubmit('update_frm','{$list['idx']}')\" title=\"승인하기\">승인하기</a></td>";

				echo "</tr>";

			}

		?>
	</tbody>

</table>

<?php

	$list_s = "lv!='2'";

	// 페이지 나누기
	$line = '5';
	$start = ($page_num-1) * $line;
	$total = $db->cnt($list_s);

	$list_r = $db->select("{$list_s} order by idx desc limit {$start}, {$line}");


?>

<div class="caption">

	대여중인 가구 목록

</div>

<table cellspacing="0" summary="가구대여목록" class="table_list">
	
	<colgroup>
		<col width="10%" />
	</colgroup>

	<thead>	
		<tr>
			<th scope="col">번호</th>
			<th scope="col">아이디</th>
			<th scope="col">가구명</th>
			<th scope="col">제조사</th>
			<th scope="col">입수일</th>
			<th scope="col">사용용도</th>
			<th scope="col">대여일시</th>
			<th scope="col">반납확인</th>
		</tr>
	</thead>

	<tbody>
		<?php

			for($i = $total-$start; $list = mysql_fetch_assoc($list_r); $i--) {

				$view = $db->fetch("idx='{$list['parent']}'",'furniture');

				echo "<tr>";

					echo "<td>{$i}</td>";

					echo "<td>{$list['id']}</td>";

					echo "<td><a href=\"#\" onclick=\"javascript:window.open('/page/popup.php/{$list['idx']}/','_blank','width=450px,height=300px,top=100px,left=100px'); return false;\" title=\"{$view['title']}\">{$view['title']}</a></td>";

					echo "<td>{$view['company']}</td>";

					echo "<td>{$view['date']}</td>";

					echo "<td>{$view['cause']}</td>";

					echo "<td>{$list['date']}</td>";
					
					if($list['lv'] == '0') {

					echo "<td><a href=\"javascript:frmSubmit('update_frm','{$list['idx']}')\" title=\"반납확인\">반납확인</a></td>";

					} else {

						echo "<td>-</td>";

					}

				echo "</tr>";

			}

		?>
	</tbody>

</table>

<div class="bottom_btn mt30">
		
	<button class="btn" title="로그아웃" onclick="link('/page/logout.php'); return false;">로그아웃</button>
	

<div>