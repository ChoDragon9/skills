<!-- 메인 비주얼 Main Visual Start -->
<div class="main_visual">

	<script type="text/javascript">
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '850',
			'height', '340',
			'src', '/common/swf/main',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'window',
			'devicefont', 'false',
			'id', 'main',
			'bgcolor', '#ffffff',
			'name', 'main',
			'menu', 'true',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', '/common/swf/main',
			'salign', '',
			'wmode','transparent'
			); //end AC code
	</script>

</div>
<!-- // 메인 비주얼 Main Visual End -->

<!-- 메인 컨텐츠 Main Content Start -->
<div class="main_cont">

	<div class="main_top_cont">

		<!-- 로그인 Login Start -->
		<div class="login">

			<div class="main_title">

				<h2><img src="/img/title_login.png" title="회원 로그인" alt="회원 로그인" /></h2>
				
			</div>

			<?php

				if($_SESSION['login'] != 'login') {

					include_once("{$_SERVER['DOCUMENT_ROOT']}/page/member_ok.php");

			?>

			<form id="login_frm" class="f_left" action="" method="post" onsubmit="return frmChk(this,'id','pw')">

				<fieldset>

					<legend>Login Form</legend>

					<div class="blind">
						<input type="hidden" name="action" value="login" />
					</div>

					<div class="input_area">
						<input type="text" name="id" id="id" title="아이디" value="아이디" onfocus="this.value=''" />
						<input type="password" name="pw" id="pw" title="비밀번호" value="비밀번호" onfocus="this.value=''" />
					</div>
					
					<input type="image" src="/img/button_login.png" title="로그인" alt="로그인" />

					<p>

						<a href="/page/member/join/" title="회원가입" class="bold">회원가입</a>

					</p>

				</fieldset>

			</form>

			<?php

				} else { 

			?>

					<div class="input_area2">

						<span class="bold"><?php echo $_SESSION['name'] ?></span> 님 환영합니다.<br />
						아이디 : <?php echo $_SESSION['id'] ?>

					</div>

					<input type="image" src="/img/button_logout.png" title="로그아웃" alt="로그아웃" onclick="link('/page/logout.php'); return false;" />
					<input type="image" src="/img/button_mypage.png" title="내 정보 확인" alt="내 정보 확인" onclick="link('/page/member/mypage/'); return false;" />

			<?php 

				}

			?>

		</div>
		<!-- // 로그인 Login End -->

		<!-- 자유 게시판 Board Start -->
		<div class="board">
			<div class="main_title">
				<h2><img src="/img/title_board.png" title="자유 게시판" alt="자유 게시판" /></h2>
			</div>
			<?php 

				// 테이블 선택
				$db->table = 'board';

				$list_r = $db->select("idx order by date desc limit 4");

				while($list = mysql_fetch_assoc($list_r)) {

					$subject = cut_str($list['subject'],30);

					echo "<ul>";

						echo "<li><a href=\"/page/5/16/view/{$list['idx']}/\" title=\"{$list['subject']}\">{$subject}</a></li>";

						echo "<li class=\"f_right border_date\"><span>{$list['date']}</span></li>";

					echo "</ul>";

				}

			?>
			<p>
				<a href="/page/5/16/"><img src="/img/button_more.png" title="더보기" alt="더보기" /></a>
			</p>
		</div>
		<!-- // 자유 게시판 Board End -->

		<!-- 가구 정보 Furniture Information Start -->
		<div class="furniture_list">
			<div class="main_title">
				<h2><img src="/img/title_furniture_list.png" title="가구 정보" alt="가구 정보" /></h2>
			</div>
			<?php 

				// 테이블 선택
				$db->table = 'furniture';

				$list_r = $db->select("idx order by title desc limit 4");

				while($list = mysql_fetch_assoc($list_r)) {

					echo "<ul>";

						echo "<li><a href=\"/page/3/11/gallery_view/{$list['idx']}/\" title=\"가구명 : {$list['title']}\">가구명 : {$list['title']}</a></li>";

						echo "<li><span>제작사 : {$list['company']}</span></li>";

					echo "</ul>";

				}

			?>
			<p>
				<a href="/page/3/11/"><img src="/img/button_more.png" title="더보기" alt="더보기" /></a>				
			</p>
		</div>
		<!-- // 가구 정보 Furniture Information End -->

	</div>

	<div class="main_bottom_cont">

		<!-- 희망 가구 신청 Furniture Write Start -->
		<div class="furniture_write">
			<div class="main_title">
				<h2><img src="/img/title_furniture_write.png" title="희망가구 신청" alt="희망가구 신청" /></h2>
			</div>
			<img src="/img/bg_furniture.png" usemap="#Write" title="희망가구 신청" alt="희망가구 신청" />
			<map name="Write" id="Write">
				<area shape="rect" coords="0,38,66,65" href="/page/3/10/" title="신청하기" alt="신청하기" />
			</map>

		</div>
		<!-- // 희망 가구 신청 Furniture Write End -->

		<!-- 웹사이트 배너 Banner Start -->
		<div class="banner">
			<div class="main_title">
				<h2><img src="/img/title_banner.png" title="웹사이트 배너" alt="웹사이트 배너" /></h2>
			</div>
			<script type="text/javascript">				
				AC_FL_RunContent(
					'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
					'width', '597',
					'height', '66',
					'src', '/common/swf/banner',
					'quality', 'high',
					'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
					'align', 'middle',
					'play', 'true',
					'loop', 'true',
					'scale', 'showall',
					'wmode', 'window',
					'devicefont', 'false',
					'id', 'banner',
					'bgcolor', '#ffffff',
					'name', 'banner',
					'menu', 'true',
					'allowFullScreen', 'false',
					'allowScriptAccess','sameDomain',
					'movie', '/common/swf/banner',
					'salign', '',
					'wmode','transparent'
					);
			</script>
		</div>
		<!-- // 웹사이트 배너 Banner End -->

	</div>

</div>
<!-- // 메인 컨텐츠 Main Content End -->