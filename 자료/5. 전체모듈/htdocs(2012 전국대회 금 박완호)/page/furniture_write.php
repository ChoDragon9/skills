<?php

	// ����Ÿ ó�� ����
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/furniture_ok.php");

	list($year,$month,$day) = explode('-',date('Y-m-d'));

	$ftype = $sub['lv'] == '1' ? " ,'year','month','day'" : '';

	if($sub['lv'] == '1') access($_SESSION['lv'] == '1','�����ڸ� ������ �� �ֽ��ϴ�.');

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
			<?php echo $sub['lv'] == '1' ? '�ű԰��� ���' : '������� ��û' ?>
		</div>
		<div class="table mb30">
			<div>
				<div><label for="title">������</label></div>
				<div><input type="text" name="title" id="title" title="������" value="" /></div>
			</div>
			<div>
				<div><label for="company">������</label></div>
				<div><input type="text" name="company" id="company" title="������" value="" /></div>
			</div>
			<?php if($sub['lv'] == '1') { ?>
			<div>
				<div><label for="year">�Լ���</label></div>
				<div>
					<select name="year" id="year" title="�Լ��⵵">
						<option value="">�Լ��⵵</option>
						<?php
							for($i = date('Y') - 5; $i <= date('Y'); $i++) {
								$sel = $i == $year ? "selected=\"selected\"" : '';
								echo "<option value=\"{$i}\" {$sel} >{$i}</option>";
							}
						?>
					</select> -
					<select name="month" id="month" title="�Լ���">
						<option value="">�Լ���</option>
						<?php							
							for($i = 1; $i <= 12; $i++) {
								$sel = $i == $month ? "selected=\"selected\"" : '';
								echo "<option value=\"{$i}\" {$sel} >{$i}</option>";
							}
						?>
					</select> -
					<select name="day" id="day" title="�Լ���">
						<option value="">�Լ���</option>
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
				<div><label for="cause">���뵵</label></div>
				<div>					
					<select name="cause" id="cause" title="���뵵">
					<?php
						echo "<option value=\"\">���뵵</option>";
						foreach($cause as $idx=>$val) {
							echo "<option value=\"{$val}\">{$val}</option>";
						}
					?>
					</select>
				</div>
			</div>
			<div>
				<div><label for="file">��������</label></div>
				<div><input type="file" name="file" id="file" title="��������" value="" class="input" /></div>
			</div>
		</div>
		<div class="bottom_btn mb30">
			<?php if($sub['lv'] == '1') { ?>
			<input type="submit" title="�������" value="�������" class="btn" />
			<?php } else { ?>
			<input type="submit" title="������û" value="������û" class="btn" />
			<?php } ?>
			<input type="reset" title="�ٽþ���" value="�ٽþ���" class="btn" />
			<input type="button" title="�ڷΰ���" value="�ڷΰ���" class="btn" onclick="history.back(); return false;" />
		</div>

		<div class="bottom_btn">
		
			<?php if($sub['lv'] == '1') { ?>
			<button class="btn" title="�α׾ƿ�" onclick="link('/page/logout.php'); return false;">�α׾ƿ�</button>
			<?php } ?>

		</div>
	</fieldset>
</form>