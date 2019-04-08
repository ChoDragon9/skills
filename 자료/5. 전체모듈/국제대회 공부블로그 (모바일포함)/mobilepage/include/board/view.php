<?php
include("../config.php");
include("../lib.php");
include("../header.php");
$row = fetarr("select * from board where no='$no'");

function bt(){
	global $row;
	if(!empty($_SESSION['ulv'])){
	?>
	<div class="list tc" data-role="controlgroup" data-type="horizontal">
	<?php
	}else{
	?>
	<div class="list">
	<?php
	}
	?>
		<a data-role="button" data-icon="back" data-mini="true" href="/mobilepage/include/board.php?sub_id=<?php echo $row['sub_id'];?>">뒤로</a>
		<?php
		if(!empty($_SESSION['ulv'])){
		?>
		<a data-role="button" data-icon="gear" data-mini="true" data-theme="a" href="/mobilepage/include/board/modify.php?no=<?php echo $row['no'];?>">수정</a>
		<a data-role="button" data-icon="minus" data-mini="true" data-theme="b" href="javascript:if(confirm('삭제하시겠습니까?')){move('/mobilepage/include/board/delete.php?no=<?php echo $row['no'];?>');}">삭제</a>
		<?php
		}
		?>
	</div>
	<?php
}

bt();
?>
<ul data-role="listview" class="list">
	<li><?php echo $row['subject']."<span class='c9'> | ".board2($row['wdate'])."</span>";?></li>
	<li class="em07"><?php echo view($row['content']);?></li>
</ul>
<?php
bt();
include("../footer.php");
?>