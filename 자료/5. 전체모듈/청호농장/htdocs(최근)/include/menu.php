<?php
if($_SESSION['ulv'] == 10){
	$db->table = "menu";
	if($type){
		include("./include/menu/".$type.".php");
	}else{
		echo '<div class="w100 h30 fl">';
		img("/img/adminmenu.png","콘텐츠 수정을 원하는 페이지의 ‘자세히’버튼을 클릭해주세요.");
		echo '</div>';
		echo '<div class="content2">';
		for($i = 0 ; $i <= 7; $i++){
			$row2 = $db->fetarr("select * from menu where type='main' and main_id='main".$i."'");
			echo '<ul><li class="w80 ft14 fw bg2">';
			nb(3);
			echo $row2['title'].'</li>';
			echo '<li class="w20 tr bg2">';
			$input->input("button","자세히","move('".PAGE."/view/".$row2['main_id']."');");
			nb(3);
			echo '</li>';
			echo '</ul>';
		}
		echo '<ul class="bt"><li></li></ul>';
		echo '</div>';
	}
}else{
	alert("권한이 없습니다.");
	session_destroy();
	move("/");
}
?>