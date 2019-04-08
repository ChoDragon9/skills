<?php

	// 사이트 상단
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/header.php");

	// 사이트 컨텐츠
	include_once("{$_SERVER['DOCUMENT_ROOT']}/page/{$current}.php");

	// 사이트 하단
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/footer.php");

?>