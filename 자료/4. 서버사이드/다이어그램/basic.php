<?php
header("Content-Type:image/png");
$width = 100;
$height = 100;
// 1. 이미지 만들기
$img = imagecreatetruecolor($width,$height);
// 2. 배경 만들기
imagefilledrectangle($img,0,0,$width,$height,0xf8f8f8);

// 3. 막대 만들기
imagefilledrectangle($img,10,10, 90,20,0x000000);

// 4. 텍스트 만들기
imagestring($img, 5, 50, 50, 'Hello World',  0x000000);

// 4. 라인 만들기
imageline($img, 10, 80, 90, 80, 0x000000);

// 5. 이미지로 보여주기
imagepng($img);
imagedestory($img);
?>