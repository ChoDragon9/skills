<?php
include("../config.php");
include("../lib.php");

if(empty($_SESSION['ulv'])){
	move("/");
	exit;
}

include("../header.php");

$cate = "/mobilepage/include/cateadmin";

$row = fetarr("select * from menu where no='$no'");
?>
<form action="<?php echo $cate;?>/sadd_ok.php?no=<?php echo $row['no'];?>" method="post">
<ul data-role="listview" class="list">
	<li>
		<select name="mainid" id="mainid">
		<?php
		$res2 = sql("select * from menu where type='main' and hd='1' order by no asc");
		while($row2 = fetch($res2)){
			if($row2['main_id'] == $row['main_id']){
				echo '<option value="'.$row2['main_id'].'" selected="selected">'.$row2['title'].'</option>';
			}else{
				echo '<option value="'.$row2['main_id'].'">'.$row2['title'].'</option>';
			}
		}
		?>
		</select>
	</li>
	<li><input type="text" name="subid" id="subid" value="<?php echo $row['sub_id'];?>" /></li>
	<li><input type="text" name="title" id="title" value="<?php echo $row['title'];?>" /></li>
</ul>
<ul class="list tc">
	<li data-role="controlgroup" data-type="horizontal">
		<input type="submit" value="수정" data-icon="plus" data-theme="e" data-inline="true" />
		<a href="<?php echo $cate.".php";?>" data-role="button" >뒤로가기</a>
	</li>
</ul>
</form>
<?php
include("../footer.php");
?>