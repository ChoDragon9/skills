<?php
function sizelimit($wfile){
	list($width,$height) = getimagesize("./file/".$wfile);
	$w = $width/400;
	$h = $height/400;
	if($width <= 400 && $height <= 400){
		$size['width'] = $width;
		$size['height'] = $height;
	}else{
		if($w > $h){
			$size['width'] = 400;
			$size['height'] = ceil($height/$w);
		}else{
			$size['width'] = ceil($width/$h);
			$size['height'] = 400;
		}
	}
	return $size;
}
?>