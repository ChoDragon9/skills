<? header("content-type:text/html; charset=utf-8"); session_start(); include("../include/lib.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title><?=$title[title]?></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="generator" content="editplus" />
  <meta name="author" content="" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <link rel="stylesheet" type="text/css" href="<?=$common?>/style.css" />
  <script type="text/javascript" src="<?=$common?>/common.js"></script>
 </head>
 <body>
 <?
 if(!$_SESSION[name]){
	 move("http://blog.jinzza.net/page/password.php");
}else{
 ?>
<div id="wrap">
	<div id="top">
		<ul class="w100">
			<li class="tr ft12"><a href="http://blog.jinzza.net/page/logout.php">식단홈페이지</a>&nbsp;<span class="cc">|</span>&nbsp;<a href="http://blog.jinzza.net/include/logout.php">로그아웃</a></li>
		</ul>
	</div>
	<div id="bottom">
		<div id="big_t">&nbsp;</div>
		<div id="big_m">
			<div id="top_area">
				<?
				$row=fetch("select title from job where main_id='$main_id'");
				echo "<b>".$row[title]."</b>&nbsp;블로그 입니다.<br />";
				$session = iconv("euc-kr","utf-8",$_SESSION[name]);
				if($_SESSION[name]){
					echo "<span style='font-size:12px;color:#999;'>".$session."님 로그인하셨습니다.</span>";
				}
				?>
			</div>
			<div id="<?=$main_id?>">
				<ul>
				<?
					$res1 = sql("select main_id,title from job");
					while($row1=mysql_fetch_array($res1)){
						echo "<li><a href='".$index."/".$row1[main_id]."'>".$row1[title]."</a></li>";
					}
				?>
				</ul>
			</div>
			<div id="con_area">
			<?
				include("../include/conl.php");
				include("../include/conr.php");
			?>
			</div>
		</div>
		<div id="big_b">&nbsp;</div>
	</div>
	<div id="copy">
		<ul>
			<li class="c9 ft11">Copyright (c) 2011 by 충북반도체고등학교 기능영재반 All right reserved.</li>
		</ul>
	</div>
</div>
<?
}
?>
 </body>
</html>