<div class="w100 fl h30"><a href="<?php echo PAGE;?>"><?php img("/img/backbt.png","back");?></a></div>
<div class="content">
<?php
$res = $db->query("select","","","main_id='$no' and type='html' order by no asc");
while($row = $db->fetch($res)){
?>
	<ul>
		<li class="w20 ft12 fw"><?php echo $row['title'];?><br /><br /><a href="<?php echo PAGE."/modify/".$row['no'];?>"><?php img("/img/modifybt.png","¼öÁ¤");?></a></li>
		<li class="w80"><?php echo strcut($row['content'],0,400);?></li>
	</ul>
<?php
}
?>
	<ul class="bt"><li></li></ul>
</div>