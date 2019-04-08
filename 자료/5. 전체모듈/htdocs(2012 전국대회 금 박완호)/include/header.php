<?php

	// DB ���� & ���̺귯��
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/dbcon.php");
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

	// ��� ����
	header('Content-Type:text/html; charset=euc-kr');

	// ���� & ���� ����
	if($current == 'main') {

		$site_title = '������Ʈ';
		$meta_keywords = '�Ұ�, ���հ˻�, ȸ������, ������, �����Խ���, �뿩, ���������û';
		$meta_description = '������Ʈ ������Ʈ�� ���Ű��� ȯ���մϴ�.';

	} else {

		// ���̺� ����
		if($page_mode == 'admin') { 
			$menu_table = 'admin_menu';
		} else if(!ctype_digit($midx)) {
			$menu_table = 'default_menu';
		} else {
			$menu_table = 'menu';
		}

		// ���� ������ ����
		access($main = $db->fetch("idx='{$midx}'",$menu_table,false),'���ο���');
		access($sub = $db->fetch("idx='{$sidx}'",$menu_table,false),'���꿡��');
		access($page = $db->fetch("parent='{$midx}' order by od asc limit 1",$menu_table,false),'����������');
		
		// ���� �� ����
		$main_title = $main['title'];
		$main_od = $main['od'];
		$sub_title = $sub['title'];
		$sub_od = $sub['od'];
		$site_title = "������Ʈ &gt; {$main_title} &gt; {$sub_title}";
		$meta_keywords = $meta_description = $site_title;

		// ��Ŭ��� ���� ����
		if($page_mode == 'admin') {
			$type = explode('_',$sidx); array_pop($type);
			$type = implode('_',$type);
			$include_file = $action ? "{$type}_{$action}" : $sidx;
		} else if(!ctype_digit($midx)) {
			$include_file = $action ? "{$sidx}_{$action}" : $sidx;
			if($sidx == 'search') $include_file = 'search';
		} else {
			switch($sub['type']) {
				case 'search' :
					$include_file = 'search';
				break;
				default :
					$type = explode('_',$sub['type']); array_pop($type);
					$type = implode('_',$type);
					$include_file = $action ? "{$type}_{$action}" : $sub['type'];
				break;
			}
		}

	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- Html Start -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko" xml:lang="ko">
<!-- Head Start -->
<head>
<!-- Title -->
<title> <?php echo $site_title ?> </title>
<meta name="generator" content="editplus" />
<meta http-equiv="Content-Type" content="text/html; charste=euc-kr" />
<meta name="author" content="WanHo Park" />
<meta name="keywords" content="<?php echo $meta_keywords ?>" />
<meta name="description" content="<?php echo $meta_description ?>" />
<!-- Css, Js, Flash, Print -->
<link rel="stylesheet" type="text/css" href="/common/css/common.css" />
<link rel="stylesheet" type="text/css" href="/common/css/<?php echo $current ?>.css" />
<link rel="stylesheet" type="text/css" href="/common/css/print.css" media="print" />
<script type="text/javascript" src="/common/js/common.js"></script>
<script type="text/javascript" src="/common/js/flash.js"></script>
<script type="text/javascript">
	window.onload = function() {
		
		<!--

			var current = "<?php echo $current ?>";
			var popup = "<?php echo $_COOKIE['popup'] ?>";

			if(current == 'main' && popup != 'popup') window.open('/page/now_popup.php','_blank','width=320px,height=240px,top=100px,left=100px');


		-->

	}
</script>
</head>
<!-- // Head End -->
<!-- Body Start -->
<body>

	<form id="popup_frm" action="" method="post">	
		<fieldset>
			<legend>Popup Form</legend>
			<div class="blind">
				<input type="hidden" name="popup" value="popup" />
			</div>
		</fieldset>
	</form>
	
	<!-- �� ����Ʈ Wrap Start -->
	<div id="wrap">
		<!-- ����Ʈ ��� Header Start -->
		<div id="header">
			<div id="header_inner">
				<!-- �ΰ� Logo -->
				<h1 id="logo"><a href="/" title="������Ʈ"><img src="/img/logo.png" title="������Ʈ" alt="������Ʈ" /></a></h1>
				<!-- ��ƿ �޴� Util Menu Start -->
				<ul class="util">
					<li><span>
						���� ���� �Ǽ� : <?php echo $db->cnt("lv='1'",'furniture') ?>�� /
						ȸ�� �� : <?php echo $db->cnt(false,'member') ?>�� 
						<?php if($_SESSION['login'] == 'login'){ ?>
						/ �뿩 �Ǽ� : <?php echo $db->cnt("lv != '2' and id=binary('{$_SESSION['id']}')",'trade') ?>�� / 
						�뿩 ���� �Ǽ� : <?php echo $db->cnt("lv = '2' and id=binary('{$_SESSION['id']}')",'trade') ?>�� 
						<?php } ?>
					</span></li>
					<li><a href="/"><img src="/img/util_1.png" title="����ȭ��" alt="����ȭ��" /></a></li>
					<?php if($_SESSION['login'] != 'login') { ?>
					<li><a href="/page/member/login/"><img src="/img/util_2.png" title="�α���" alt="�α���" /></a></li>
					<li><a href="/page/member/join/"><img src="/img/util_3.png" title="ȸ������" alt="ȸ������" /></a></li>
					<?php } else { ?>
					<li><a href="/page/member/mypage/"><img src="/img/util_4.png" title="�� ���� Ȯ��" alt="�� ���� Ȯ��" /></a></li>
					<li><a href="/page/logout.php"><img src="/img/util_5.png" title="�α׾ƿ�" alt="�α׾ƿ�" /></a></li>
					<?php } ?>
					<li><a href="/page/etc/sitemap/"><img src="/img/util_6.png" title="����Ʈ��" alt="����Ʈ��" /></a></li>
					<li><a href="/page/etc/search/"><img src="/img/util_7.png" title="�˻�" alt="�˻�" /></a></li>
					<li><a href="mailto:<?php echo hex('admin@furniture.co.kr') ?>"><img src="/img/util_8.png" title="���Ϲ���" alt="���Ϲ���" /></a></li>
				</ul>
				<!-- // ��ƿ �޴� Util Menu End -->
				<!-- ���� �޴� Main Menu Start -->
				<div class="gnb">
				<?php

					// ���̺� ����
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
				<!-- // ���� �޴� Main Menu End -->
			</div>
		</div>
		<!-- // ����Ʈ ��� Header End -->

		<!-- ����Ʈ ������ Content Start -->
		<div id="content">
			<div id="content_inner">