<?php
include("./config.php");
include("./lib.php");
include("./header.php");

if(!empty($_POST['schText'])){
	$schText = escape($_POST['schText']);
}else if(!empty($_GET['schText'])){
	$schText = escape($_GET['schText']);
}else{
	$schText = "";
}
?>
<form action="/mobilepage/include/search.php" method="post" class="list">
	<ul>
		<li><input type="text" name="schText" id="schText" value="<?php echo $schText;?>" <?php  if($schText == ""){echo 'placeholder="검색어를 입력해주세요."';}?> /></li>
	</ul>
	<ul>
		<li><input type="submit" value="검색" /></li>
	</ul>
</form>
<ul data-role="listview" class="list">
<?php
$page_num = isset($list) ? $list : 1;
$page = 15;
$schsql = " ( subject like binary('%$schText%') or content like binary('%$schText%') or wdate like binary('%$schText%') or wdate2 like binary('%$schText%') or tags like binary('%$schText%') )";
$sql = "select wdate,sub_id,no,subject from board";
if(!empty($sdt)){
	$sql .= " where sub_id='$sub_id'";
}
if($schText != ""){
	$sql .= " where ".$schsql;
}
$pageing = pageing($page,$page_num,$sql);
if($pageing['total'] > 0){
	$res = sql($sql." order by no desc limit $pageing[start],$page");
	while($row = fetch($res)){
	?>
		<li><a href="<?php echo "/mobilepage/include/board/view.php?sub_id=".$row['sub_id']."&no=".$row['no'];?>"><?php echo hlt($row['subject'])."<span class='cc'> | ".$row['sub_id']."</span> <span class='c9'> - ".board($row['wdate'])."</span>";?></a></li>
	<?php
	}
}else{
	echo '<li class="tc">등록된 글이 없습니다.</li>';
}
?>
</ul>
<div data-type="horizontal" data-role="controlgroup" id="pageing">
<?php
if($pageing['total'] > 0){
	echo $pageing['button'];
}
echo '</div>';
include("./footer.php");
?>