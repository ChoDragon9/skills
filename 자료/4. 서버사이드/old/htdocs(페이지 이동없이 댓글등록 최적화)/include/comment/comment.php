<?php
include("../lib.php");
?>
<div class="join">
<?php
$total = num("select * from comment where boardnum='$_GET[no]' order by no desc");
$res = sql("select * from comment where boardnum='$_GET[no]' order by no desc");
while($row = fetch($res)){
?>
<ul>
	<li><?php echo nb(3); echo $row['name']; ?></li>
	<li><?php echo nb(3); echo $row['content'];?></li>
</ul>
<?php
}
if($total == 0){
?>
<ul class="bt bg tc"><li>NO COMMENT</li></ul>
<?php
}
?>
<ul class="bt"><li> </li></ul>
</div>