<?php
header("Content-Type:image/png");
$width = 200;
$height = 200;
// 1. 이미지 만들기
$img = imagecreatetruecolor($width,$height);
// 2. 배경 넣기
imagefilledrectangle($img,0,0,$width,$height,0xf8f8f8);

$center_x = $width / 2;
$center_y = $height / 2;
imagefilledarc($img, $center_x, $center_y, $width, $height,0, 180, 0xff0000, IMG_ARC_PIE);
imagefilledarc($img, $center_x, $center_y, $width, $height,180, 270, 0x00ff00, IMG_ARC_PIE);
imagefilledarc($img, $center_x, $center_y, $width, $height,270, 360, 0x0000ff, IMG_ARC_PIE);

// 5. 이미지로 보여주기
imagepng($img);
imagedestory($img);
?>