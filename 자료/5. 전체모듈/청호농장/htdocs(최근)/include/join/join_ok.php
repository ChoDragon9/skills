<?php
foreach($_POST as $key => $val){
	$$key = $val;
}
if($_SESSION['token'] != $_POST['token']){
	alert("�߸��� �����Դϴ�.");
	move("/");
	exit;
}else if(empty($id) or empty($pwd) or empty($pwd_ok) or empty($name) or empty($phone) or empty($address1) or empty($address2) or empty($u1) or empty($u2)){
	alert("��Ȯ�� �Է����ּ���.");
	back();
	exit;
}
$id = $db->change($_POST['id']);
$row = $db->num("select * from member where id='$id'");
if($row > 0){
	alert("�̹� ���Ե� ���̵��Դϴ�.");
	back();
}else{
	$db->query("insert","member",$db->colume($_POST,"pwd_ok").",lv='1'","");
	alert("���ԵǾ����ϴ�.");
	move("/");
}
?>