<?php include("./include/lib.php");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta name="generator" content="editplus" />
<meta name="author" content="" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<script type="text/javascript" src="/js/common.js"></script>
<link rel="stylesheet" type="text/css" href="/css/style.css" />
</head>
<body>
<div id="wrapper">
		<div id="wrap">
		<?php
		if($_GET['type']){
			include("./include/board/".$_GET['type'].".php");
		}else{
		?>
		<div class="content">
		<ul class="tc bg">
				<li class="w10">锅龋</li>
				<li class="w60">力格</li>
				<li class="w15">累己磊</li>
				<li class="w15">累己老</li>
			</ul>
			<?php
			$total = num("select * from board");
			$res = sql("select * from board");
			while($row = fetch($res)){
				?>
			<ul>
				<li class="w10 tc"><?php echo $total;?></li>
				<li class="w60"><a href="<?php echo $url."?type=view&no=".$row['no'];?>"><?php echo $row['subject'];?></a></li>
				<li class="w15 tc"><?php echo $row['name'];?></li>
				<li class="w15 tc"><?php echo $row['wdate'];?></li>
			</ul>
			<?php
				$total--;
			}
			?>
			<ul class="bt"><li> </li></ul>
		</div>
		<?php
		}
		?>
	</div>
</div>
</body>
</html>