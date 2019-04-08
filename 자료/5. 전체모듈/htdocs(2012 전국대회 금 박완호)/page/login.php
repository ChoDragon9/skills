<?php

	// 데이타 처리 파일
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/member_ok.php");
	access($_SESSION['login'] != 'login','로그아웃 후 이용해주세요.');

?>
<form id="frm" action="" method="post" onsubmit="return frmChk(this,'id','pw')">
	<fieldset>
		<legend>Login Form</legend>
		<div class="blind">
			<input type="hidden" name="action" value="login" />
		</div>
		<div class="login">
			<div class="login_inner">
				<div class="input_area">
					<div>
						<label for="id">아아디 :</label>
						<input type="text" name="id" id="id" title="아이디" value="" />
					</div>
					<div>
						<label for="pw">비밀번호 :</label>
						<input type="password" name="pw" id="pw" title="비밀번호" value="" />
					</div>
				</div>
				<input type="image" src="/img/button_login2.png" title="로그인" alt="로그인" />
			</div>
		</div>
		<p class="f_right mt15">

			아직도 가구렌트 회원이 아니세요 ? <a href="/page/member/join/" title="회원가입하로가기"  class="bold">회원가입하로가기</a>
			
		</p>
	</fieldset>
</form>