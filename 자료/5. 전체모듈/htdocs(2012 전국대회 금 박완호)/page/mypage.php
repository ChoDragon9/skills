<?php

	// 데이타 처리 파일
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/member_ok.php");

	access($view = $db->fetch("id=binary('{$_SESSION['id']}')"),'정보를 불러오지 못하였습니다.');

?>
<div class="caption">로그인 정보 확인란</div>
<div class="table mb30">
	<div>
		<div>아이디</div>
		<div><?php echo $view['id'] ?></div>
	</div>
</div>
<div class="caption">회원 정보 확인란</div>
<div class="table mb30">
	<div>
		<div>성명</div>
		<div><?php echo $view['name'] ?></div>
	</div>
	<div>
		<div>이메일</div>
		<div><?php echo hex($view['email']) ?></div>
	</div>
	<div>
		<div>성별</div>
		<div>
			<?php echo $view['sex'] ?>
		</div>
	</div>
	<div>
		<div>주소</div>
		<div><?php echo $view['address'] ?></div>
	</div>
	<div>
		<div>전화번호</div>
		<div><?php echo $view['cell'] ?></div>
	</div>
	<div>
		<div>휴대폰번호</div>
		<div><?php echo $view['phone'] ?></div>
	</div>
</div>
<div class="bottom_btn">
	<button title="확인완료" class="btn" onclick="link('/'); return false;">확인완료</button>
</div>