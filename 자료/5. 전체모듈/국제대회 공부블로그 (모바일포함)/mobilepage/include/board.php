<?php
if(isset($_GET['sub_id'])){
	include("./config.php");
	include("./lib.php");
	include("./header.php");
}
if(!empty($_SESSION['ulv'])){
	?>
	<div class="list"><a href="/mobilepage/include/board/write.php<?php if(!empty($sub_id)){ echo '?sub_id='.$sub_id; }?>" data-role="button" data-icon="plus">글쓰기</a></div>
	<?php
}
?>
<ul data-role="listview" class="list">
<?php
$page_num = isset($list) ? $list : 1;
$page = 15;
$sql = "select wdate,sub_id,no,subject from board";
if(!empty($sdt)){
	$sql .= " where sub_id='$sub_id'";
}
$pageing = pageing($page,$page_num,$sql);
if($pageing['total'] > 0){
	$res = sql($sql." order by no desc limit $pageing[start],$page");
	while($row = fetch($res)){
	?>
		<li><a href="<?php echo "/mobilepage/include/board/view.php?sub_id=".$row['sub_id']."&no=".$row['no'];?>"><?php echo $row['subject']."<span class='cc'> | ".$row['sub_id']."</span> <span class='c9'> - ".board($row['wdate'])."</span>";?></a></li>
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
if(isset($_GET['sub_id'])){
	include("./footer.php");
}
?>