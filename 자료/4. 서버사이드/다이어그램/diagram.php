<?php
header("Content-Type:image/png");
$width = 550;
$height = 500;
// 1. 이미지 만들기
$img = imagecreatetruecolor($width,$height);
// 2. 배경 만들기
imagefilledrectangle($img,0,0,$width,$height,0xf8f8f8);

// 3. 막대 만들기
imagefilledrectangle($img,100,450, 50,50,0xdddddd);
imagefilledrectangle($img,200,450, 150,150,0xdddddd);
imagefilledrectangle($img,300,450, 250,250,0xdddddd);
imagefilledrectangle($img,400,450, 350,350,0xdddddd);
imagefilledrectangle($img,500,450, 450,400,0xdddddd);

// 4. 텍스트 만들기
$font = 5;
imagestring($img, $font, 75, 460, '1',  0x222222);
imagestring($img, $font, 175, 460, '2',  0x222222);
imagestring($img, $font, 275, 460, '3',  0x222222);
imagestring($img, $font, 375, 460, '4',  0x222222);
imagestring($img, $font, 475, 460, '5',  0x222222);

// 4. 라인 만들기
imageline($img, 50, 450, 500, 450, 0x222222);

// 5. 이미지로 보여주기
imagepng($img);
imagedestory($img);
?>