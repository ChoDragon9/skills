<?php

	// DB ���� & ���̺귯��
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/dbcon.php");
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

	// ���� ����
	session_destroy();

	$msg = '�α׾ƿ� �Ǿ����ϴ�.';
	$url = '/';

	alert($msg,$url);

?>