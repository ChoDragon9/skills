<?
if($type){
	include("../include/board/".$type.".php");
}else{
?>
<ul class="w100 fw fm ac">
	<li class="w10 bt2c fl">��ȣ</li>
	<li class="w60 bt2c fl">����</li>
	<li class="w20 bt2c fl">�ۼ���</li>
	<li class="w10 bt2c fl">�ۼ���</li>
</ul>
<?
$res = sql("select * from board where main_id='$main_id' and sub_id='$sub_id' order by no desc");
while($row= mysql_fetch_array($res)){
?>
<ul class="w100 ac">
	<li class="w10 bt1c fl"><?=$row[no]?></li>
	<li class="w60 bt1c fl"><a href="<?=PAGE?>/view/<?=$row[no]?>"><?=$row[subject]?></a></li>
	<li class="w20 bt1c fl"><?=$row[name]?></li>
	<li class="w10 bt1c fl"><?=$row[wdate]?></li>
</ul>
<?
}
?>
<ul class="W100">
	<li class="w100 bt1c"><?=input("button","�۾���","location.replace('".PAGE."/add');","");?></li>
</ul>
<?
}
?>