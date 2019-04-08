<?php

	// 테이블 선택
	$db->table = 'furniture';

	$list_s = "lv='1'";

	// 페이지 나누기
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

				echo "<li><a href=\"{$get_page}gallery_view/{$list['idx']}/\" title=\"{$list['title']}\" class=\"bold\">가구명 : {$list['title']}</a></li>";

				} else {

					echo "<li><a href=\"/page/member/join/\" title=\"{$list['title']}\" class=\"bold\">가구명 : {$list['title']}</a></li>";

				}

				echo "<li>제조사 : {$list['company']}</li>";

				echo "<li>입수일 : {$list['date']}</li>";

				echo "<li>사용용도 : {$list['cause']}</li>";

			echo "</ul>";

		}

	?>

</div>

<?php echo $paginate ?>