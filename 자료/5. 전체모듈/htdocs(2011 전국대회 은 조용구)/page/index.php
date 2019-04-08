<?session_start(); include("../include/lib.php");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$title?></title>
<meta name="generator" content="editplus" />
<meta name="author" content="" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="<?=$common?>/style.css" />
<link rel="stylesheet" type="text/css" href="<?=$common?>/print.css" media="print" />
<script type="text/javascript" src="<?=$common?>/common.js"></script>
</head>
<body>
<div id="wrapper">
	<div id="wrap">
	<!--header_start-->
		<div id="top">
			<div id="logo">
				<a href="<?=$index?>"><img src="<?=$img?>/logo.png" alt="성곡친환경마을" title="성곡친환경마을" /></a>
			</div>
			<div id="navi">
				<ul class="ft11">
					<?
					if($_SESSION[lv] == 10){
					?>
					<li><a href="<?=$index?>/admin/menu">[ADMIN PAGE]</a></li>
					<li class="c9">&nbsp;&nbsp;:&nbsp;&nbsp;</li>
					<?
					}
					?>
					<li><a name="top">&nbsp;</a><a href="<?=$index?>">Home</a></li>
					<li class="c9">&nbsp;&nbsp;:&nbsp;&nbsp;</li>
					<?
					if(!$_SESSION[name]){
					?>
					<li><a href="<?=$index?>/join/join">Join</a></li>
					<li class="c9">&nbsp;&nbsp;:&nbsp;&nbsp;</li>
					<li><a href="<?=$index?>/login/login">Login</a></li>
					<?
					}else{
					?>
					<li><a href="<?=$index?>/login/login/logout">Logout</a></li>
					<?
					}
					?>
					<li class="c9">&nbsp;&nbsp;:&nbsp;&nbsp;</li>
					<li><a href="<?=$index?>/sitemap/sitemap">Sitemap</a></li>
					<li class="c9">&nbsp;&nbsp;:&nbsp;&nbsp;</li>
					<li><a href="<?=$index?>/search/search">Search</a></li>
					<li class="c9">&nbsp;&nbsp;:&nbsp;&nbsp;</li>
					<li><a href="mailto:<?=hex('webmaster@ecovil.co.kr ')?>">Contact</a></li>
				</ul>
			</div>
			<div id="menu">
			<?
			$i = 1;
			$num = num("select * from menu where type='main' and (main_id!='admin' and main_id!='join' and main_id!='login' and main_id!='sitemap' and main_id!='search')");
			$res = sql("select * from menu where type='main' and (main_id!='admin' and main_id!='join' and main_id!='login' and main_id!='sitemap' and main_id!='search')");
			while($row = mysql_fetch_array($res)){
				$row2 = fetch("select * from menu where type!='main' and main_id='$row[main_id]'");
				if($row[main_id] == $main_id){$dis = "di";}else{$dis = "dn";}
				?>
				<ul>
				<!--Main menu_start-->
					<li class="ft12 fw main"><a href="<?=$index?>/<?=$row[main_id]?>/<?=$row2[sub_id]?>" onmouseover="dis('<?=$i?>','<?=$num?>')"><?=$row[title]?></a></li>
				<!--Main menu_end-->
					<li class="ft11 <?=$dis?> pa sub" id="dis<?=$i?>">
						<div id="submenuleft"></div>
						<div id="submenucenter">
					<?
					$num2 = num("select * from menu where type!='main' and main_id='$row[main_id]'");
					$j = 1;
					$res3 = sql("select * from menu where type!='main' and main_id='$row[main_id]'");
					while($row3 = mysql_fetch_array($res3)){
						?>
						<a href="<?=$index?>/<?=$row3[main_id]?>/<?=$row3[sub_id]?>"><?=$row3[title]?></a>
						<?
							if($num2 != $j){echo"&nbsp;<span class='cc'>|</span>&nbsp;";}
							$j++;
					}
					?>
						</div>
						<div id="submenuright"></div>
					</li>
				</ul>
				<?
				$i++;
			}
			?>
			</div>
		</div>
	<!--header_end-->
		<?
		if($sdt){
			include("../page/sub.php");
		}else{
			include("../page/main.php");
		}
		?>
		<div id="footer">
			<div class="number">
				<ul class="w100">
					<li class="ac ft11 c9"><span class="fw">전체회원가입자수</span>&nbsp;:&nbsp;<?=num("select * from member");?>명&nbsp;&nbsp;&nbsp;&nbsp;<span class="fw">전체체험신청회원수</span>&nbsp;:&nbsp;<?=num("select * from experlist");?>명&nbsp;&nbsp;&nbsp;&nbsp;<span class="fw">전체주문자수</span>&nbsp;:&nbsp;<?=num("select * from orderlist");?>명</li>
				</ul>
			</div>
			<div class="copy">
				<div class="f">
					<img src="<?=$img?>/footerlogo.png" alt="성곡친환경마을" title="성곡친환경마을" />
				</div>
				<div class="s ft11 c9">
				경남 창년 성곡리 성곡마을 103번지  Tel : 055. 123. 4567  Fex : 055-123-4556<br />
				Copyright (c) 성곡마을 All Right reserved.
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>