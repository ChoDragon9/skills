<?php

	// ���̺� ����
	$db->table = 'furniture';

	$list_s = "lv='1'";

	// ������ ������
	$line = '6';
	$start = ($page_num-1) * $line;
	$total = $db->cnt($list_s);
	$paginate = paginate($page_num,$line,$total,"{$get_page}gallery/&&/",'gallery');

	$list_r = $db->select("{$list_s} order by title asc, cause asc limit {$start},{$line}");
	
?>

<div class="gallery">

	<?php

		for($i = $total-$start; $list = mysql_fetch_assoc($list_r); $i--) {

			echo "<ul>";

				echo "<li><img src=\"/data/uploaded_file/{$list['file_name']}\" title=\"{$list['file']}\" alt=\"{$list['file']}\" /></li>";

				if($_SESSION['login'] == 'login') {

				echo "<li><a href=\"{$get_page}gallery_view/{$list['idx']}/\" title=\"{$list['title']}\" class=\"bold\">������ : {$list['title']}</a></li>";

				} else {

					echo "<li><a href=\"/page/member/join/\" title=\"{$list['title']}\" class=\"bold\">������ : {$list['title']}</a></li>";

				}

				echo "<li>������ : {$list['company']}</li>";

				echo "<li>�Լ��� : {$list['date']}</li>";

				echo "<li>���뵵 : {$list['cause']}</li>";

			echo "</ul>";

		}

	?>

</div>

<?php echo $paginate ?>