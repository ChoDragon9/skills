<?php
include("../config.php");
include("../lib.php");

if(empty($_SESSION['ulv'])){
	move("/");
	exit;
}

include("../header.php");

$cate = "/mobilepage/include/cateadmin";
?>
<form action="<?php echo $cate;?>/madd_ok.php" method="post">
<ul data-role="listview" class="list">
	<li><input type="text" name="mainid" id="mainid" placeholder="Main_id" /></li>
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