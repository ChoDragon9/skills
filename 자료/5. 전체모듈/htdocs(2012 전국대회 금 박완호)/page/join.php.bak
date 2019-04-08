<?php

	// 데이타 처리 파일
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/member_ok.php");

	access($_SESSION['login'] != 'login','로그아웃 후 이용해주세요.');

?>
<form id="frm" action="" method="post" onsubmit="return frmChk(this,'id','pw','name','email')" enctype="multipart/form-data">
	<fieldset>
		<legend>Join Form</legend>
		<div class="blind">
			<input type="hidden" name="action" value="insert" />
		</div>
		<div class="caption">로그인 정보 입려란</div>
		<div class="table mb30">
			<div>
				<div><label for="id">아이디</label></div>
				<div><input type="text" name="id" id="id" title="아이디" value="<?php echo $_POST['id'] ?>" /> 아이디는 영문과 숫자의 조합으로 입력해주세요. </div>
			</div>
			<div>
				<div><label for="pw">비밀번호</label></div>
				<div><input type="password" name="pw" id="pw" title="비밀번호" value="<?php echo $_POST['pw'] ?>" class="input" /> 비밀번호는 최소 4자 이상입니다. </div>
			</div>
		</div>
		<div class="caption">회원 정보 입력란</div>
		<div class="table mb30">
			<div>
				<div><label for="name">성명</label></div>
				<div><input type="text" name="name" id="name" title="성명" value="<?php echo $_POST['name'] ?>" /> 순 한글로 입력해주세요. </div>
			</div>
			<div>
				<div><label for="email">이메일</label></div>
				<div><input type="text" name="email" id="email" title="이메일" value="<?php echo $_POST['email'] ?>" /> ex)email@email.com</div>
			</div>
			<div>
				<div><label for="sex" class="none">성별</label></div>
				<div>
					<select name="sex" id="sex" title="성별">
						<option value="남자">남자</option>
						<option value="여자">여자</option>
					</select>
				</div>
			</div>
			<div>
				<div><label for="address" class="none">주소</label></div>
				<div><input type="text" name="address" id="address" title="주소" value="<?php echo $_POST['address'] ?>" /></div>
			</div>
			<div>
				<div><label for="cell" class="none">전화번호</label></div>
				<div><input type="text" name="cell" id="cell" title="전화번호" value="<?php echo $_POST['cell'] ?>" /> ex)000-0000-0000</div>
			</div>
			<div>
				<div><label for="phone" class="none">휴대폰번호</label></div>
				<div><input type="text" name="phone" id="phone" title="휴대폰번호" value="<?php echo $_POST['phone'] ?>" /> ex)000-0000-0000</div>
			</div>
		</div>
		<div class="bottom_btn">
			<input type="submit" title="회원가입" value="회원가입" class="btn bold" />
			<input type="reset" title="다시쓰기" value="다시쓰기" class="btn" />
			<input type="button" title="뒤로가기" value="뒤로가기" class="btn" onclick="history.back(); return false;" />
		</div>
	</fieldset>
</form>