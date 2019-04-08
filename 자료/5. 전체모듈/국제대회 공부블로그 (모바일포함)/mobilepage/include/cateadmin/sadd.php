<?php
include("../config.php");
include("../lib.php");

if(empty($_SESSION['ulv'])){
	move("/");
	exit;
}

include("../header.php");

$cate = "/mobilepage/include/cateadmin";

$row = fetarr("select main_id from menu where no='$no'");
?>
<form action="<?php echo $cate;?>/sadd_ok.php" method="post">
<ul data-role="listview" class="list">
	<li>
		<select name="mainid" id="mainid">
		<?php
		$res = sql("select * from menu where type='main' and hd='1' order by no asc");
		while($row = fetch($res)){
			echo '<option value="'.$row['main_id'].'">'.$row['title'].'</option>';
		}
		?>
		</select>
	</li>
	<li><input type="text" name="subid" id="subid" placeholder="Sub_id" /></li>
	<li><input type="text" name="title" id="title" placeholder="Title" /></li>
</ul>
<ul class="list tc">
	<li data-role="controlgroup" data-type="horizontal">
		<input type="submit" value="등록" data-icon="plus" data-theme="e" data-inline="true" />
		<a href="<?php echo $cate.".php";?>" data-role="button" >뒤로가기</a>
	</li>
</ul>
</form>
<?php
include("../footer.php");
?>