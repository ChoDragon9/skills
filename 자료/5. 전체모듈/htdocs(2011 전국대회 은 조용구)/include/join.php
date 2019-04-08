<?
if($type == "join_ok"){
	$id = change($_POST[id]);
	$pwd = change($_POST[pwd]);
	$name1 = change($_POST[name]);
	$sex = change($_POST[sex]);
	sql("insert into member values('','$id',password('$pwd'),'$name1','$sex','1')");
	alert("가입되었습니다.");
	move($index."/login/login");
}else{
?>
<form action="<?=PAGE?>/join_ok" method="post">
<ul class="w100">
	<li class="w100 fw fm fl">&nbsp;<span class="cr">*</span>&nbsp;는 필수 기입사항입니다.</li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt2c"><span class="cr">*</span>&nbsp;<?=label("id","아이디");?></li>
	<li class="w80 fl bt2c"><?=input("text","id","","200");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("pwd","비밀번호");?></li>
	<li class="w80 fl bt1c"><?=input("password","pwd","","200");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><span class="cr">*</span>&nbsp;<?=label("name","이름");?></li>
	<li class="w80 fl bt1c"><?=input("text","name","","100");?></li>
</ul>
<ul class="w100">
	<li class="w20 fw fm fl ac bt1c"><?=label("sex","성별");?></li>
	<li class="w80 fl bt1c"><?=input("text","sex","","100");?></li>
</ul>
<ul class="W100">
	<li class="w100 bt1c"><?=input("submit","가입하기","","");?>&nbsp;<?=input("reset","다시쓰기","","");?></li>
</ul>
</form>
<?
}
?>