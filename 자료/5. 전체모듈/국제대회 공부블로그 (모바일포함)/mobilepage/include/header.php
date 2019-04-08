<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="/mobilepage/common/default.js?dum=<?php echo uniqid(time());?>" type="text/javascript"></script>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" style="text/css" />
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js" type="text/javascript"></script>
	<link rel="stylesheet" style="text/css" href="/mobilepage/common/common.css" />
</head>
<body>
<div data-role="page" id="wrap">
	<div data-role="header" data-theme="b" id="header">
		<h1 class="09em"><?php echo $title;?></h1>
		<div id="log">
		<?php
		if($_SESSION['ulv']){
		?>
		<a href="/mobilepage/include/login/logout.php" data-theme="b" data-role="button">로그아웃</a>
		<?php
		}else{
		?>
		<a href="/mobilepage/include/login.php" data-theme="b" data-role="button">로그인</a>
		<?php
		}
		?>
		</div>
		<div id="sch" <?php if($_SERVER['REQUEST_URI'] != "/"){echo ' data-role="controlgroup" data-type="horizontal"';} ?>>
			<a href="/mobilepage/include/search.php" data-theme="b" data-role="button">검색</a>
			<?php
			if($_SERVER['REQUEST_URI'] != "/"){
			?>
			<a href="/" data-theme="a" data-role="button">홈</a>
			<?php
			}
			?>
		</div>
	</div>
	<div data-role="content" id="content">
		<div data-role="controlgroup" class="list">
			<?php
			if(isset($_SESSION['ulv'])){
				?>
				<a data-theme="a" data-icon="gear" data-role="button" href="/mobilepage/include/cateadmin.php" class="ch">카테고리</a>
				<?php
			}else{
				?>
				<a data-theme="a" data-role="button" class="ch">카테고리</a>
				<?php
			}
			$sql = "select main_id,title from menu where type='main' and hd='1' order by no asc";
			$res = sql($sql);
			while($row = fetch($res)){
				$sql2 = "select sub_id,title,main_id from menu where main_id='$row[main_id]' and type!='main' order by no asc";
				$row2 = fetarr($sql2);
				?>
				<a href="/mobilepage/include/board.php?sub_id=<?php echo $row2['sub_id'];?>" data-role="button" data-icon="forward" data-iconpos="right"><?php echo $row['title'];?></a>
				<?php
				if($sdt['main_id'] == $row2['main_id']){
					$res3 = sql($sql2);
					while($row3 = fetch($res3)){
						if($row3['sub_id'] == $sub_id){
							?>
							<a href="/mobilepage/include/board.php?sub_id=<?php echo $row3['sub_id'];?>" data-role="button" data-theme="e" data-icon="arrow-d" data-iconpos="bottom"><?php echo $row3['title'];?></a>
							<?php
						}else{
							?>
							<a href="/mobilepage/include/board.php?sub_id=<?php echo $row3['sub_id'];?>" data-role="button" data-theme="e" data-icon="arrow-u"><?php echo $row3['title'];?></a>
							<?php
						}
					}
				}
			}
		?>
		</div>