<?php
include("./config.php");
include("./lib.php");
include("./header.php");
$cate = "/mobilepage/include/cateadmin";
?>
<div class="list" data-role="controlgroup">
	<a href="<?php echo $cate;?>/madd.php" data-role="button" data-icon="plus" data-mini="true">메인추가</a>
	<a href="<?php echo $cate;?>/sadd.php" data-role="button" data-icon="plus" data-mini="true">서브추가</a>
</div>
<?php
$sql = "select main_id,title,no from menu where type='main' and hd='1' order by no desc";
$res = sql($sql);
while($row = fetch($res)){
	?>
	<div class="content">
	<ul>
		<li><?php echo nb(2).$row['title'].nb(2);?></li>
		<li class="bt">
			<span data-role="controlgroup" data-type="horizontal">
				<a href="<?php echo $cate;?>/mmo.php?no=<?php echo $row['no'];?>" data-role="button" data-icon="grear" data-mini="true" data-theme="a">수정</a>
				<a href="javascript:if(confirm('삭제하시겠습니까??')){move('<?php echo $cate;?>/mdel.php?no=<?php echo $row['no'];?>');}" data-role="button" data-icon="minus" data-mini="true" data-theme="b">삭제</a>
			</span>
			<?php echo nb(2);?>
		</li>
	</ul>
	<?php
	$sql2 = "select sub_id,title,main_id,no from menu where main_id='$row[main_id]' and type!='main' order by no desc";
	$res2 = sql($sql2);
	while($row2 = fetch($res2)){
		echo '<ul>';
		?>
		<li><?php echo nb(2).$row2['title'];?></li>
		<li class="bt">
			<span data-role="controlgroup" data-type="horizontal">
				<a href="<?php echo $cate;?>/smo.php?no=<?php echo $row2['no'];?>" data-role="button" data-icon="grear" data-mini="true" data-theme="a">수정</a>
				<a href="javascript:if(confirm('삭제하시겠습니까??')){move('<?php echo $cate;?>/sdel.php?no=<?php echo $row2['no'];?>');}" data-role="button" data-icon="minus" data-mini="true" data-theme="b">삭제</a>
			</span>
			<?php echo nb(2);?>
		</li>
		<?php
		echo '</ul>';
	}
	?>
	<ul class="bt">
		<li></li>
	</ul>
	</div>
	<?php
}
include("./footer.php");
?>