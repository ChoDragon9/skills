<?php

	// ����Ÿ ó�� ����
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/trade_ok.php");

	$list_s = "lv='2'";

	// ������ ������
	$line = '5';
	$start = ($page_num-1) * $line;
	$total = $db->cnt($list_s);

	$list_r = $db->select("{$list_s} order by idx desc limit {$start}, {$line}");

	access($_SESSION['lv'] == '1','�����ڸ� ������ �� �ֽ��ϴ�.');


?>

<form id="update_frm" action="" method="post">
	<fieldset>
		<legend>Update Form</legend>
		<div class="blind">
			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="idx" value="" />
		</div>
	</fieldset>
</form>

<div class="caption">

	�뿩���� ���� ���

</div>

<table cellspacing="0" summary="�����뿩���" class="table_list mb30">
	
	<colgroup>
		<col width="10%" />
	</colgroup>

	<thead>	
		<tr>
			<th scope="col">��ȣ</th>
			<th scope="col">���̵�</th>
			<th scope="col">������</th>
			<th scope="col">������</th>
			<th scope="col">���뵵</th>
			<th scope="col">�����ϱ�</th>
		</tr>
	</thead>

	<tbody>
		<?php

			if($total == 0) echo "<tr><td colspan=\"6\">��û�� ������ �����ϴ�.</td></tr>";

			for($i = $total-$start; $list = mysql_fetch_assoc($list_r); $i--) {

				$view = $db->fetch("idx='{$list['parent']}'",'furniture');

				echo "<tr>";

					echo "<td>{$i}</td>";

					echo "<td>{$list['id']}</td>";

					echo "<td>{$view['title']}</td>";

					echo "<td>{$view['company']}</td>";

					echo "<td>{$view['cause']}</td>";

					echo "<td><a href=\"javascript:frmSubmit('update_frm','{$list['idx']}')\" title=\"�����ϱ�\">�����ϱ�</a></td>";

				echo "</tr>";

			}

		?>
	</tbody>

</table>

<?php

	$list_s = "lv!='2'";

	// ������ ������
	$line = '5';
	$start = ($page_num-1) * $line;
	$total = $db->cnt($list_s);

	$list_r = $db->select("{$list_s} order by idx desc limit {$start}, {$line}");


?>

<div class="caption">

	�뿩���� ���� ���

</div>

<table cellspacing="0" summary="�����뿩���" class="table_list">
	
	<colgroup>
		<col width="10%" />
	</colgroup>

	<thead>	
		<tr>
			<th scope="col">��ȣ</th>
			<th scope="col">���̵�</th>
			<th scope="col">������</th>
			<th scope="col">������</th>
			<th scope="col">�Լ���</th>
			<th scope="col">���뵵</th>
			<th scope="col">�뿩�Ͻ�</th>
			<th scope="col">�ݳ�Ȯ��</th>
		</tr>
	</thead>

	<tbody>
		<?php

			for($i = $total-$start; $list = mysql_fetch_assoc($list_r); $i--) {

				$view = $db->fetch("idx='{$list['parent']}'",'furniture');

				echo "<tr>";

					echo "<td>{$i}</td>";

					echo "<td>{$list['id']}</td>";

					echo "<td><a href=\"#\" onclick=\"javascript:window.open('/page/popup.php/{$list['idx']}/','_blank','width=450px,height=300px,top=100px,left=100px'); return false;\" title=\"{$view['title']}\">{$view['title']}</a></td>";

					echo "<td>{$view['company']}</td>";

					echo "<td>{$view['date']}</td>";

					echo "<td>{$view['cause']}</td>";

					echo "<td>{$list['date']}</td>";
					
					if($list['lv'] == '0') {

					echo "<td><a href=\"javascript:frmSubmit('update_frm','{$list['idx']}')\" title=\"�ݳ�Ȯ��\">�ݳ�Ȯ��</a></td>";

					} else {

						echo "<td>-</td>";

					}

				echo "</tr>";

			}

		?>
	</tbody>

</table>

<div class="bottom_btn mt30">
		
	<button class="btn" title="�α׾ƿ�" onclick="link('/page/logout.php'); return false;">�α׾ƿ�</button>
	

<div>