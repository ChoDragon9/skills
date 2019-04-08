<?php

	// DB 접속 & 라이브러리
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/dbcon.php");
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

	// 세션 삭제
	session_destroy();

	$msg = '로그아웃 되었습니다.';
	$url = '/';

	alert($msg,$url);

?>