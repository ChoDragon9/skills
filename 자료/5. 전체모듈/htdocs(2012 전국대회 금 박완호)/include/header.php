<?php

	// DB 접속 & 라이브러리
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/dbcon.php");
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

	// 헤더 설정
	header('Content-Type:text/html; charset=euc-kr');

	// 메인 & 서브 구분
	if($current == 'main') {

		$site_title = '가구렌트';
		$meta_keywords = '소개, 통합검색, 회원서비스, 관리자, 자유게시판, 대여, 희망가구신청';
		$meta_description = '가구렌트 웹사이트에 오신것을 환영합니다.';

	} else {

		// 테이블 선택
		if($page_mode == 'admin') { 
			$menu_table = 'admin_menu';
		} else if(!ctype_digit($midx)) {
			$menu_table = 'default_menu';
		} else {
			$menu_table = 'menu';
		}

		// 현재 페이지 정보
		access($main = $db->fetch("idx='{$midx}'",$menu_table,false),'메인에러');
		access($sub = $db->fetch("idx='{$sidx}'",$menu_table,false),'서브에러');
		access($page = $db->fetch("parent='{$midx}' order by od asc limit 1",$menu_table,false),'페이지에러');
		
		// 변수 값 저장
		$main_title = $main['title'];
		$main_od = $main['od'];
		$sub_title = $sub['title'];
		$sub_od = $sub['od'];
		$site_title = "가구렌트 &gt; {$main_title} &gt; {$sub_title}";
		$meta_keywords = $meta_description = $site_title;

		// 인클루드 파일 설정
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
	
	<!-- 웹 사이트 Wrap Start -->
	<div id="wrap">
		<!-- 사이트 상단 Header Start -->
		<div id="header">
			<div id="header_inner">
				<!-- 로고 Logo -->
				<h1 id="logo"><a href="/" title="가구렌트"><img src="/img/logo.png" title="가구렌트" alt="가구렌트" /></a></h1>
				<!-- 유틸 메뉴 Util Menu Start -->
				<ul class="util">
					<li><span>
						가구 보유 건수 : <?php echo $db->cnt("lv='1'",'furniture') ?>개 /
						회원 수 : <?php echo $db->cnt(false,'member') ?>명 
						<?php if($_SESSION['login'] == 'login'){ ?>
						/ 대여 건수 : <?php echo $db->cnt("lv != '2' and id=binary('{$_SESSION['id']}')",'trade') ?>개 / 
						대여 예약 건수 : <?php echo $db->cnt("lv = '2' and id=binary('{$_SESSION['id']}')",'trade') ?>개 
						<?php } ?>
					</span></li>
					<li><a href="/"><img src="/img/util_1.png" title="메인화면" alt="메인화면" /></a></li>
					<?php if($_SESSION['login'] != 'login') { ?>
					<li><a href="/page/member/login/"><img src="/img/util_2.png" title="로그인" alt="로그인" /></a></li>
					<li><a href="/page/member/join/"><img src="/img/util_3.png" title="회원가입" alt="회원가입" /></a></li>
					<?php } else { ?>
					<li><a href="/page/member/mypage/"><img src="/img/util_4.png" title="내 정보 확인" alt="내 정보 확인" /></a></li>
					<li><a href="/page/logout.php"><img src="/img/util_5.png" title="로그아웃" alt="로그아웃" /></a></li>
					<?php } ?>
					<li><a href="/page/etc/sitemap/"><img src="/img/util_6.png" title="사이트맵" alt="사이트맵" /></a></li>
					<li><a href="/page/etc/search/"><img src="/img/util_7.png" title="검색" alt="검색" /></a></li>
					<li><a href="mailto:<?php echo hex('admin@furniture.co.kr') ?>"><img src="/img/util_8.png" title="메일문의" alt="메일문의" /></a></li>
				</ul>
				<!-- // 유틸 메뉴 Util Menu End -->
				<!-- 메인 메뉴 Main Menu Start -->
				<div class="gnb">
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
				<!-- // 메인 메뉴 Main Menu End -->
			</div>
		</div>
		<!-- // 사이트 상단 Header End -->

		<!-- 사이트 컨텐츠 Content Start -->
		<div id="content">
			<div id="content_inner">