<?php
if($_SESSION['ulv'] == 10){
	$db->table = "menu";
	if($type){
		include("./include/menu/".$type.".php");
	}else{
		echo '<div class="w100 h30 fl">';
		img("/img/adminmenu.png","������ ������ ���ϴ� �������� ���ڼ�������ư�� Ŭ�����ּ���.");
		echo '</div>';
		echo '<div class="content2">';
		for($i = 0 ; $i <= 7; $i++){
			$row2 = $db->fetarr("select * from menu where type='main' and main_id='main".$i."'");
			echo '<ul><li class="w80 ft14 fw bg2">';
			nb(3);
			echo $row2['title'].'</li>';
			echo '<li class="w20 tr bg2">';
			$input->input("button","�ڼ���","move('".PAGE."/view/".$row2['main_id']."');");
			nb(3);
			echo '</li>';
			echo '</ul>';
		}
		echo '<ul class="bt"><li></li></ul>';
		echo '</div>';
	}
}else{
	alert("������ �����ϴ�.");
	session_destroy();
	move("/");
}
?>