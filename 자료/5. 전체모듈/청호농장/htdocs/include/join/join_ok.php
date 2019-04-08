<?php
$id = $db->change($_POST['id']);
$row = $db->num("select * from member where id='$id'");
if($row > 0){
	alert("이미 가입된 아이디입니다.");
	?>
	<form action="<?php echo PAGE."/join_login";?>" method="post" id="back_frm">
	<?php
	$input->value = $_POST;
	$input->input("hidden","name"); 
	$input->input("hidden","home"); 
	$input->input("hidden","phone");
	$input->input("hidden","address"); 
	$input->input("hidden","address2");
	?>
	</form>
	<script type="text/javascript">
	selectid("back_frm").submit();
	</script>
	<?php
}else{
	?>
	<div id="joinimg">
	<?php img("/img/jointhird.png","");?>
	</div>
	<?
	$db->query("insert","member",$db->colume($_POST,"pwd_ok").",lv='1'","");
	alert("가입되었습니다.");
	move("/");
}
?>