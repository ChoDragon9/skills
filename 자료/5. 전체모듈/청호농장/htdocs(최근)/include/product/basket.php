<?php
if($_SESSION['token'] != $_POST['baskettoken']){
	alert("�߸��� �����Դϴ�.");
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
		if(confirm('��ϵǾ����ϴ�.\r\n��ٱ��Ϸ� �̵��Ͻðڽ��ϱ�?')){
			move("/mypage/basket");
		}else{
			move("<?php echo PAGE;?>");
		}
	</script>
	<?php
}else{
	alert("������ �����ϴ�.");
	move("/");
}
?>