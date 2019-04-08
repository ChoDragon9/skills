<?php
//Thumbnail
function thumbnail($wfile,$wfile_name){
	list($img_width,$img_height,$img_type) = @getimagesize($wfile);
	if($img_type >= 1 and $img_type <= 3){
		if(move_uploaded_file($wfile,"./file/".$wfile_name)){
			$new_width = 100;
			$new_height = 100;
			$new_img = imagecreatetruecolor($new_width,$new_height);
			if($img_type == 1) $tmp_img = imagecreatefromgif("./file/".$wfile_name);
			else if($img_type == 2) $tmp_img = imagecreatefromjpeg("./file/".$wfile_name);
			else if($img_type == 3) $tmp_img = imagecreatefrompng("./file/".$wfile_name);
			imagecopyresized($new_img,$tmp_img,0,0,0,0,$new_width,$new_height,$img_width,$img_height);
			if($img_type == 1) imagegif($new_img,"./file/thumb_".$wfile_name);
			else if($img_type == 2) imagejpeg($new_img,"./file/thumb_".$wfile_name);
			else if($img_type == 3) imagepng($new_img,"./file/thumb_".$wfile_name);
			imagedestroy($tmp_img);
		}
	}
}

if(isset($_FILES['wfile'])){
	if($HTTP_POST_FILES['wfile']['tmp_name']){
		$wfile = $HTTP_POST_FILES['wfile']['tmp_name'];
		$wfile_name = $HTTP_POST_FILES['wfile']['name'];
		thumbnail($wfile,$wfile_name);
	}
}

?>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="wfile" /><input type="submit" value="Submit" />
</form>