<?php

	// 데이타 처리 파일
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/furniture_ok.php");

	$list_s = "lv='2'";

	$list_r = $db->select("{$list_s} order by idx desc");

	$total = $db->cnt($list_s);

	access($_SESSION['lv'] == '1','관리자만 접근할 수 있습니다.');

?>

<form id="update_frm" method="post" action="">
	<fieldset>
		<legend>Update Form</legend>
		<div class="blind">
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="date" value="<?php echo date('Y-m-d') ?>" />
			<input type="hidden" name="idx" value="" />
			<input type="hidden" name="lv" value="1" />
		</div>
	</fieldset>
</form>

<?php

	if($total == 0) echo "<p class=\"mb30\"><span class=\"bold\">현재 신청된 가구가 없습니다.</span></p>";

	for($i = 1; $list = mysql_fetch_assoc($list_r); $i++) {

?>

	<div class="caption"><?php echo $list['id'] ?>님이 신청하신 가구입니다.</div>

	<div class="table mb30 none">
		<div>
			<div>가구명</div>
			<div><?php echo $list['title'] ?></div>
		</div>
		<div>
			<div>제조사</div>
			<div><?php echo $list['company'] ?></div>
		</div>
		<div>
			<div><label for="cause">사용용도</label></div>
			<div>
				<?php echo $list['cause'] ?>
			</div>
		</div>
		<div>
			<div><label for="file">가구사진</label></div>
			<div>
				<img src="/data/uploaded_file/<?php echo $list['file_name'] ?>" title="<?php echo $list['file'] ?>" alt="<?php echo $list['file'] ?>" class="imgs" />
			</div>
		</div>
	</div>

	<div class="bottom_btn mb30">

		<button title="가구등록" class="btn" onclick="frmSubmit('update_frm','<?php echo $list['idx'] ?>'); return false;">가구등록</button>

	</div>


<?php

	}

?>

<div class="bottom_btn">
	<button title="로그아웃" class="btn" onclick="link('/page/logout.php'); return false;">로그아웃</button>
</div>