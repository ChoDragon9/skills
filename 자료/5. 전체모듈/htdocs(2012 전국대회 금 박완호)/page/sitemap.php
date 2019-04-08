<div class="sitemap">
<?php

	// 테이블 선택
	$db->table = 'menu';

	$dep1_r = $db->select("parent='0' order by od asc");

	echo "<ul>";

	for($i = 1; $dep1 = mysql_fetch_assoc($dep1_r); $i++) {

		$sub_link = $db->fetch("parent='{$dep1['idx']}' order by od asc limit 1");

		$dep2_r = $db->select("parent='{$dep1['idx']}' order by od asc");

		$depNum = $db->cnt("parent='0'");

		$style = $dep1['idx'] == $midx ? 'display:inline' : '';

		echo "<li>";

			echo "<a href=\"/page/{$dep1['idx']}/{$sub_link['idx']}/\" title=\"{$dep1['title']}\" onmouseover=\"depView('{$i}','{$depNum}');\">{$dep1['title']}</a>";

			echo "<ul id=\"dep2_{$i}\" style=\"{$style}\">";

			for($j = 1; $dep2 = mysql_fetch_assoc($dep2_r); $j++) {

				$style = $dep2['idx'] == $sidx ? 'color' : '';

				echo "<li><a class=\"{$style}\" href=\"/page/{$dep2['parent']}/{$dep2['idx']}/\" title=\"{$dep2['title']}\">{$dep2['title']}</a></li>";

			}

			echo "</ul>";

		echo "</li>";

	}

	echo "</ul>";

?>
</div>
