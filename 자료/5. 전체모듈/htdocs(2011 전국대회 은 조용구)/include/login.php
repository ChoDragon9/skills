<?
if($type){
	include("../include/login/".$type.".php");
}else{
	if($_SESSION[name]){
	?>
	<div id="logout">
	<ul class="w100">
		<li class="w50 ar fl">���̵�&nbsp;&nbsp;</li>
		<li class="w50 fl"><?=hex($_SESSION[id])?></li>
	</ul>
	<ul class="w100">
		<li class="w50 ar fl">�̸�&nbsp;&nbsp;</li>
		<li class="w50 fl"><?=$_SESSION[name]?></li>
	</ul>
	<ul class="w100">
		<li class="w100 fl ac"><?=input("button","�α׾ƿ�","location.replace('".PAGE."/logout');","");echo"&nbsp;";if($_SESSION[lv] == 10){echo input("button","������������","location.replace('".$index."/admin/menu');","");}?></li>
	</ul>
	</div>
	<?
	}else{
?>
<div id="login">
<form action="<?=PAGE?>/login_ok" method="post">
	<ul class="w100">
		<li class="w40 ar fl"><?=label("id","���̵�");?>&nbsp;&nbsp;</li>
		<li class="w60 fl"><?=input("text","id","","150");?></li>
	</ul>
	<ul class="w100">
		<li class="w40 ar fl"><?=label("pwd","��й�ȣ");?>&nbsp;&nbsp;</li>
		<li class="w60 fl"><?=input("password","pwd","","150");?></li>
	</ul>
	<ul class="w100">
		<li class="w100 fl ac"><?=input("submit","�α���","","");?>&nbsp;<?=input("reset","�ٽþ���","","");?></li>
	</ul>
</form>
</div>
<?
	}
}
?>