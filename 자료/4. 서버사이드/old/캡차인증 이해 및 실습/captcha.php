<?php
session_start();
header("Content-Type:image/png");

$alpha = range('a','z'); //range(start,end); 연속되는 알파벳이나 숫자를 배열로 저장해준다.
$number = range(0,9);
$arr = array_merge($alpha,$number); //여러개의 배열을 하나로 만들어준다.
shuffle($arr); //배열의 순서를 섞어 준다.
$_SESSION['capt'] = substr(implode('',$arr),0,5);
//배열은 구분자 없이 붙여준 뒤 앞에서 부터 5개의 글자를 가져온다. 
//substr(string,start,length); implode(구분자,배열);

$img = imagecreatetruecolor(60,20);
imagefilledrectangle($img,0,0,60,20,0x000000);
imagestring($img,5,7,2,$_SESSION['capt'],0xffff00);
imageline($img,0,10,60,10,0xff0000);
imagepng($img);
imagedestory($img);
?>