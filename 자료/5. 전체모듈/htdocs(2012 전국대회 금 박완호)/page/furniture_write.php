<?php

	// 데이타 처리 파일
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/furniture_ok.php");

	list($year,$month,$day) = explode('-',date('Y-m-d'));

	$ftype = $sub['lv'] == '1' ? " ,'year','month','day'" : '';

	if($sub['lv'] == '1') access($_SESSION['lv'] == '1','관리자만 접근할 수 있습니다.');

?>
<form id="frm" action="" method="post" onsubmit="return frmChk(this,'title','company'<?php echo $ftype ?>,'cause','file')" enctype="multipart/form-data">
	<fieldset>
		<legend>Furniture Write</legend>
		<div class="blind">
			<input type="hidden" name="action" value="insert" />
			<input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>" />
			<input type="hidden" name="name" value="<?php echo $_SESSION['name'] ?>" />
			<?php if($sub['lv'] != '1') { ?>
				<input type="hidden" name="lv" value="2" />
			<?php } ?>
		</div>
		<div class="caption">
			<?php echo $sub['lv'] == '1' ? '신규가구 등록' : '희망가구 신청' ?>
		</div>
		<div class="table mb30">
			<div>
				<div><label for="title">가구명</label></div>
				<div><input type="text" name="title" id="title" title="가구명" value="" /></div>
			</div>
			<div>
				<div><label for="company">제조사</label></div>
				<div><input type="text" name="company" id="company" title="제조사" value="" /></div>
			</div>
			<?php if($sub['lv'] == '1') { ?>
			<div>
				<div><label for="year">입수일</label></div>
				<div>
					<select name="year" id="year" title="입수년도">
						<option value="">입수년도</option>
						<?php
							for($i = date('Y') - 5; $i <= date('Y'); $i++) {
								$sel = $i == $year ? "selected=\"selected\"" : '';
								echo "<option value=\"{$i}\" {$sel} >{$i}</option>";
							}
						?>
					</select> -
					<select name="month" id="month" title="입수월">
						<option value="">입수월</option>
						<?php							
							for($i = 1; $i <= 12; $i++) {
								$sel = $i == $month ? "selected=\"selected\"" : '';
								echo "<option value=\"{$i}\" {$sel} >{$i}</option>";
							}
						?>
					</select> -
					<select name="day" id="day" title="입수일">
						<option value="">입수일</option>
						<?php							
							for($i = 1; $i <= 31; $i++) {
								$sel = $i == $day ? "selected=\"selected\"" : '';
								echo "<option value=\"{$i}\" {$sel} >{$i}</option>";
							}
						?>
					</select>
				</div>
			</div>
			<?php } ?>
			<div>
				<div><label for="cause">사용용도</label></div>
				<div>					
					<select name="cause" id="cause" title="사용용도">
					<?php
						echo "<option value=\"\">사용용도</option>";
						foreach($cause as $idx=>$val) {
							echo "<option value=\"{$val}\">{$val}</option>";
						}
					?>
					</select>
				</div>
			</div>
			<div>
				<div><label for="file">가구사진</label></div>
				<div><input type="file" name="file" id="file" title="가구사진" value="" class="input" /></div>
			</div>
		</div>
		<div class="bottom_btn mb30">
			<?php if($sub['lv'] == '1') { ?>
			<input type="submit" title="가구등록" value="가구등록" class="btn" />
			<?php } else { ?>
			<input type="submit" title="가구신청" value="가구신청" class="btn" />
			<?php } ?>
			<input type="reset" title="다시쓰기" value="다시쓰기" class="btn" />
			<input type="button" title="뒤로가기" value="뒤로가기" class="btn" onclick="history.back(); return false;" />
		</div>

		<div class="bottom_btn">
		
			<?php if($sub['lv'] == '1') { ?>
			<button class="btn" title="로그아웃" onclick="link('/page/logout.php'); return false;">로그아웃</button>
			<?php } ?>

		</div>
	</fieldset>
</form>