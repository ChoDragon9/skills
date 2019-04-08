<?php

	// DB ���� & ���̺귯��
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/dbcon.php");
	include_once("{$_SERVER['DOCUMENT_ROOT']}/include/lib.php");

	$current = 'sub';

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
<style type="text/css">
	
	body { background:none }

</style>
</head>
<!-- // Head End -->
<!-- Body Start -->
<body>

	<?php

		// ���̺� ����
		$db->table = 'trade';

		$var_array = explode('/',$_SERVER['PATH_INFO']);

		access($view = $db->fetch("idx='{$var_array[1]}'"),'������ �ҷ����� ���Ͽ����ϴ�.');

	?>

	<div class="caption">

		<?php echo $view['id'] ?>���� ȸ������ �Դϴ�.

	</div>

	<div class="table mb30">

		<div>
			<div>���̵�</div>
			<div><?php echo $view['id'] ?></div>
		</div>
		
		<div>
			<div>�̸�</div>
			<div><?php echo $view['name'] ?></div>
		</div>

		<div>
			<div>�̸����ּ�</div>
			<div><?php echo hex($view['email']) ?></div>
		</div>

	</div>
	
	<div class="bottom_btn">
		<button title="â �ݱ�" class="btn" onclick="window.close(); return false;">â �ݱ�</button>
	</div>

</body>
<!-- // Body End -->
</html>
<!-- // Html End -->