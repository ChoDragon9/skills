<?php
include("../config.php");
include("../lib.php");
if(empty($_SESSION['ulv'])){
	move("/");
	exit;
}
include("../header.php");
?>
<form action="/mobilepage/include/board/write_ok.php<?php if(!empty($sub_id)){echo "?sub_id=".$sub_id;} ?>" method="post" id="writefrm">
<ul data-role="listview" class="list">
	<li>
		<select name="name" id="name">
		<?php
		$sub_id = !empty($sub_id) ? $sub_id : "";
		$res = sql("select * from menu where type='board' order by no asc");
		while($row = fetch($res)){
			if($sub_id == $row['sub_id']){
				echo '<option value="'.$row['title'].'" selected="selected">'.$row['title'].'</option>';
			}else{
				echo '<option value="'.$row['title'].'">'.$row['title'].'</option>';
			}
		}
		?>
		</select>
	</li>
	<li><input type="text" name="subject" id="subject" placeholder="Subject" /></li>
</ul>
<ul class="list">
	<li><textarea name="content" id="content" placeholder="Content"></textarea></li>
	<li class="tc">
		<span data-role="controlgroup" data-type="horizontal">
			<input type="submit" value="등록" data-role="button" data-icon="plus" />
			<a href="<?php if(!empty($sub_id)){echo '/mobilepage/include/board.php?sub_id='.$sub_id;}else{echo "/";} ?>" data-role="button" data-icon="back">뒤로가기</a>
		</span>
	</li>
</ul>
</form>
<?php
include("../footer.php");
?>