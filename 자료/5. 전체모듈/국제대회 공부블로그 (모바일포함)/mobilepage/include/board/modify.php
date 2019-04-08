<?php
include("../config.php");
include("../lib.php");
if(empty($_SESSION['ulv'])){
	move("/");
	exit;
}
include("../header.php");

$row2 = fetarr("select * from board where no='$no'");
?>
<form action="/mobilepage/include/board/modify_ok.php?no=<?php echo $row2['no'];?>" method="post" id="writefrm">
<ul data-role="listview" class="list">
	<li>
		<select name="name" id="name">
		<?php
		$sub_id = !empty($sub_id) ? $sub_id : "";
		$res = sql("select * from menu where type='board' order by no asc");
		while($row = fetch($res)){
			if($row2['sub_id'] == $row['sub_id']){
				echo '<option value="'.$row['title'].'" selected="selected">'.$row['title'].'</option>';
			}else{
				echo '<option value="'.$row['title'].'">'.$row['title'].'</option>';
			}
		}
		?>
		</select>
	</li>
	<li><input type="text" name="subject" id="subject" value="<?php echo $row2['subject'];?>" /></li>
</ul>
<ul class="list">
	<li><textarea name="content" id="content"><?php echo $row2['content'];?></textarea></li>
	<li class="tc">
		<span data-role="controlgroup" data-type="horizontal">
			<input type="submit" value="수정" data-role="button" data-icon="plus" />
			<a href="/mobilepage/include/board/view.php?no=<?php echo $row2['no'];?>" data-role="button" data-icon="back">뒤로가기</a>
		</span>
	</li>
</ul>
</form>
<?php
include("../footer.php");
?>