<?php

	// ����Ÿ ó�� ����
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/trade_ok.php");

	access($view = $db->fetch("idx='{$idx}'",'furniture'),'������ �ҷ����� ���Ͽ����ϴ�.');


?>
<div class="caption">
	<?php echo '�����뿩 ��û' ?>
</div>

<div class="table mb30 none">
	<div>
		<div>������</div>
		<div><?php echo $view['title'] ?></div>
	</div>
	<div>
		<div>������</div>
		<div><?php echo $view['company'] ?></div>
	</div>
	<div>
		<div><label for="year">�Լ���</label></div>
		<div>
			<?php echo $view['date'] ?>
		</div>
	</div>
	<div>
		<div><label for="cause">���뵵</label></div>
		<div>
			<?php echo $view['cause'] ?>
		</div>
	</div>
	<div>
		<div><label for="file">��������</label></div>
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
		<div class="caption">ȸ������ �Է¶�</div>
		<div class="table mb30">
			<div>
				<div><label for="id">���̵�</label></div>
				<div><input type="text" name="id" id="id" title="���̵�" value="<?php echo $_SESSION['id'] ?>" <?php if($_SESSION['login'] == 'login') echo "readonly=\"readonly\"" ?> /></div>
			</div>
			<div>
				<div><label for="name">�̸�</label></div>
				<div><input type="text" name="name" id="name" title="�̸�" value="<?php echo $_SESSION['name'] ?>" /></div>
			</div>
			<div>
				<div><label for="email">�̸���</label></div>
				<div><input type="text" name="email" id="email" title="�̸���" value="<?php echo $_SESSION['email'] ?>" /></div>
			</div>
		</div>
		<div class="bottom_btn">
			<input type="submit" title="�뿩��û�ϱ�" value="�뿩��û�ϱ�" class="big" />
			<input type="reset" title="�ٽþ���" value="�ٽþ���" class="btn" />
			<input type="button" title="�ڷΰ���" value="�ڷΰ���" class="btn" onclick="history.back(); return false;" />
		</div>
	</fieldset>
</form>