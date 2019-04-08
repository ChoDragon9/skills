<?php

	// 데이타 처리 파일
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/trade_ok.php");

	access($view = $db->fetch("idx='{$idx}'",'furniture'),'정보를 불러오지 못하였습니다.');


?>
<div class="caption">
	<?php echo '가구대여 신청' ?>
</div>

<div class="table mb30 none">
	<div>
		<div>가구명</div>
		<div><?php echo $view['title'] ?></div>
	</div>
	<div>
		<div>제조사</div>
		<div><?php echo $view['company'] ?></div>
	</div>
	<div>
		<div><label for="year">입수일</label></div>
		<div>
			<?php echo $view['date'] ?>
		</div>
	</div>
	<div>
		<div><label for="cause">사용용도</label></div>
		<div>
			<?php echo $view['cause'] ?>
		</div>
	</div>
	<div>
		<div><label for="file">가구사진</label></div>
		<div>
			<img src="/data/uploaded_file/<?php echo $view['file_name'] ?>" title="<?php echo $view['file'] ?>" alt="<?php echo $view['file'] ?>" class="imgs" />
		</div>
	</div>
</div>

<form id="frm" class="f_left width100" action="" method="post" onsubmit="return frmChk(this,'id','name','email')">
	<fieldset>
		<legend>Furniture Insert Form</legend>
		<div class="blind">
			<input type="hidden" name="action" value="insert" />
			<input type="hidden" name="parent" value="<?php echo $view['idx'] ?>" />
		</div>
		<div class="caption">회원정보 입력란</div>
		<div class="table mb30">
			<div>
				<div><label for="id">아이디</label></div>
				<div><input type="text" name="id" id="id" title="아이디" value="<?php echo $_SESSION['id'] ?>" <?php if($_SESSION['login'] == 'login') echo "readonly=\"readonly\"" ?> /></div>
			</div>
			<div>
				<div><label for="name">이름</label></div>
				<div><input type="text" name="name" id="name" title="이름" value="<?php echo $_SESSION['name'] ?>" /></div>
			</div>
			<div>
				<div><label for="email">이메일</label></div>
				<div><input type="text" name="email" id="email" title="이메일" value="<?php echo $_SESSION['email'] ?>" /></div>
			</div>
		</div>
		<div class="bottom_btn">
			<input type="submit" title="대여신청하기" value="대여신청하기" class="big" />
			<input type="reset" title="다시쓰기" value="다시쓰기" class="btn" />
			<input type="button" title="뒤로가기" value="뒤로가기" class="btn" onclick="history.back(); return false;" />
		</div>
	</fieldset>
</form>