<?php

	// ����Ÿ ó�� ����
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/member_ok.php");
	access($_SESSION['login'] != 'login','�α׾ƿ� �� �̿����ּ���.');

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
						<label for="id">�ƾƵ� :</label>
						<input type="text" name="id" id="id" title="���̵�" value="" />
					</div>
					<div>
						<label for="pw">��й�ȣ :</label>
						<input type="password" name="pw" id="pw" title="��й�ȣ" value="" />
					</div>
				</div>
				<input type="image" src="/img/button_login2.png" title="�α���" alt="�α���" />
			</div>
		</div>
		<p class="f_right mt15">

			������ ������Ʈ ȸ���� �ƴϼ��� ? <a href="/page/member/join/" title="ȸ�������Ϸΰ���"  class="bold">ȸ�������Ϸΰ���</a>
			
		</p>
	</fieldset>
</form>