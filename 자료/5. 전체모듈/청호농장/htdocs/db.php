<?php
/*
$arr = array("달콤한 밤","달콤한 꿀","신선한 계란","토끼","꼬꼬닭","꽃가루","아카시아 꿀","프로폴리스","공지사항");
$arr2 = array(
				array("상품설명 및 소개","요리방법","쓰이는 용도","상품신청"),
				array("상품설명 및 소개","요리방법","쓰이는 용도","상품신청"),
				array("상품설명 및 소개","요리방법","쓰이는 용도","상품신청"),
				array("상품설명 및 소개","요리방법","쓰이는 용도","상품신청"),
				array("상품설명 및 소개","요리방법","쓰이는 용도","상품신청"),
				array("상품설명 및 소개","요리방법","쓰이는 용도","상품신청"),
				array("상품설명 및 소개","요리방법","쓰이는 용도","상품신청"),
				array("상품설명 및 소개","요리방법","쓰이는 용도","상품신청"),
				array("공지사항","고객소리함")
			);
foreach($arr as $key=>$val){
	$db->query("insert","menu","main_id='main".$key."',title='".$val."',type='main',hd='1'");
	foreach($arr2[$key] as $key2=>$val2){
		$db->query("insert","menu","main_id='main".$key."',sub_id='sub".$key2."',title='".$val2."',type='html'");
	}
}
*/
?>