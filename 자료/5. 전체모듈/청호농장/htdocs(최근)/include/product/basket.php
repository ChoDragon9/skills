<?php
if($_SESSION['token'] != $_POST['baskettoken']){
	alert("잘못된 접근입니다.");
	move("/");
	exit;
}
if($_SESSION['uno']){
	$db->query("update","product","nownum=nownum-$_POST[number]","no='$_POST[pronum]'");
	$row = $db->num("select * from basket where memnum='$_SESSION[uno]' and pronum='$_POST[pronum]'");
	if($row == 1){
		$row2 = $db->fetarr("select * from basket where memnum='$_SESSION[uno]' and pronum='$_POST[pronum]'");
		$_POST['memnum'] = $_SESSION['uno'];
		$_POST['number'] = $row2['number'] + $_POST['number'];
		$db->query("update","basket",$db->colume($_POST,"baskettoken"),"no='$row2[no]'");
	}else{
		$_POST['memnum'] = $_SESSION['uno'];
		$db->query("insert","basket",$db->colume($_POST,"baskettoken"));
	}
	?>
	<script type="text/javascript">
		if(confirm('등록되었습니다.\r\n장바구니로 이동하시겠습니까?')){
			move("/mypage/basket");
		}else{
			move("<?php echo PAGE;?>");
		}
	</script>
	<?php
}else{
	alert("권한이 없습니다.");
	move("/");
}
?>