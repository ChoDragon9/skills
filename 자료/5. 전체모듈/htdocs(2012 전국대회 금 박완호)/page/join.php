<?php

	// ����Ÿ ó�� ����
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/member_ok.php");

	access($_SESSION['login'] != 'login','�α׾ƿ� �� �̿����ּ���.');

?>
<form id="frm" action="" method="post" onsubmit="return frmChk(this,'id','pw','name','email')" enctype="multipart/form-data">
	<fieldset>
		<legend>Join Form</legend>
		<div class="blind">
			<input type="hidden" name="action" value="insert" />
		</div>
		<div class="caption">�α��� ���� �Է���</div>
		<div class="table mb30">
			<div>
				<div><label for="id">���̵�</label></div>
				<div><input type="text" name="id" id="id" title="���̵�" value="<?php echo $_POST['id'] ?>" /> ���̵�� ������ ������ �������� �Է����ּ���. </div>
			</div>
			<div>
				<div><label for="pw">��й�ȣ</label></div>
				<div><input type="password" name="pw" id="pw" title="��й�ȣ" value="<?php echo $_POST['pw'] ?>" class="input" /> ��й�ȣ�� �ּ� 4�� �̻��Դϴ�. </div>
			</div>
		</div>
		<div class="caption">ȸ�� ���� �Է¶�</div>
		<div class="table mb30">
			<div>
				<div><label for="name">����</label></div>
				<div><input type="text" name="name" id="name" title="����" value="<?php echo $_POST['name'] ?>" /> �� �ѱ۷� �Է����ּ���. </div>
			</div>
			<div>
				<div><label for="email">�̸���</label></div>
				<div><input type="text" name="email" id="email" title="�̸���" value="<?php echo $_POST['email'] ?>" /> ex)email@email.com</div>
			</div>
			<div>
				<div><label for="sex" class="none">����</label></div>
				<div>
					<select name="sex" id="sex" title="����">
						<option value="����">����</option>
						<option value="����">����</option>
					</select>
				</div>
			</div>
			<div>
				<div><label for="address" class="none">�ּ�</label></div>
				<div><input type="text" name="address" id="address" title="�ּ�" value="<?php echo $_POST['address'] ?>" /></div>
			</div>
			<div>
				<div><label for="cell" class="none">��ȭ��ȣ</label></div>
				<div><input type="text" name="cell" id="cell" title="��ȭ��ȣ" value="<?php echo $_POST['cell'] ?>" /> ex)000-0000-0000</div>
			</div>
			<div>
				<div><label for="phone" class="none">�޴�����ȣ</label></div>
				<div><input type="text" name="phone" id="phone" title="�޴�����ȣ" value="<?php echo $_POST['phone'] ?>" /> ex)000-0000-0000</div>
			</div>
		</div>
		<div class="bottom_btn">
			<input type="submit" title="ȸ������" value="ȸ������" class="btn bold" />
			<input type="reset" title="�ٽþ���" value="�ٽþ���" class="btn" />
			<input type="button" title="�ڷΰ���" value="�ڷΰ���" class="btn" onclick="history.back(); return false;" />
		</div>
	</fieldset>
</form>