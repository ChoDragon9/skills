<?
if($type){
	include("../include/login/".$type.".php");
}else{
	if($_SESSION[name]){
	?>
	<div id="logout">
	<ul class="w100">
		<li class="w50 ar fl">아이디&nbsp;&nbsp;</li>
		<li class="w50 fl"><?=hex($_SESSION[id])?></li>
	</ul>
	<ul class="w100">
		<li class="w50 ar fl">이름&nbsp;&nbsp;</li>
		<li class="w50 fl"><?=$_SESSION[name]?></li>
	</ul>
	<ul class="w100">
		<li class="w100 fl ac"><?=input("button","로그아웃","location.replace('".PAGE."/logout');","");echo"&nbsp;";if($_SESSION[lv] == 10){echo input("button","관리자페이지","location.replace('".$index."/admin/menu');","");}?></li>
	</ul>
	</div>
	<?
	}else{
?>
<div id="login">
<form action="<?=PAGE?>/login_ok" method="post">
	<ul class="w100">
		<li class="w40 ar fl"><?=label("id","아이디");?>&nbsp;&nbsp;</li>
		<li class="w60 fl"><?=input("text","id","","150");?></li>
	</ul>
	<ul class="w100">
		<li class="w40 ar fl"><?=label("pwd","비밀번호");?>&nbsp;&nbsp;</li>
		<li class="w60 fl"><?=input("password","pwd","","150");?></li>
	</ul>
	<ul class="w100">
		<li class="w100 fl ac"><?=input("submit","로그인","","");?>&nbsp;<?=input("reset","다시쓰기","","");?></li>
	</ul>
</form>
</div>
<?
	}
}
?>