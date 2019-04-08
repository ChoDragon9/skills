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
<form action="<?php echo $cate;?>/madd_ok.php?no=<?php echo $row['no'];?>" method="post">
<ul data-role="listview" class="list">
	<li><input type="text" name="mainid" id="mainid" value="<?php echo $row['main_id'];?>" /></li>
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