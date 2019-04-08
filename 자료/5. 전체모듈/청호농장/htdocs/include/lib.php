<?php
/* Link start
------------------------------------------------*/

$arr = explode("/",$_GET['param']);
$main_id = $arr['0'];
$sub_id = $arr['1'];
$type = $arr['2'];
$no = $arr['3'];
$no2 = $arr['4'];

define("PAGE","/".$main_id."/".$sub_id);

/* Link end
------------------------------------------------*/

/* Title start
---------------------------------------------*/

$mdt = $db->fetarr("select * from menu where main_id='$main_id' and type='main'");
$sdt = $db->fetarr("select * from menu where main_id='$main_id' and sub_id='$sub_id' and type!='main'");
if($mdt){
	$title = "HOME &gt; ".$mdt['title']." &gt; ".$sdt['title'];
}else{
	$title = "청호농장 홈페이지에 방문해주셔서 감사합니다.";
}

/* Title end
---------------------------------------------*/

/* Input start
------------------------------------------------*/

$input = new input();

class input{
	function input($type=false,$name=false,$value=false,$size=false){
		$value = $value == "" ? $this->value["$name"] : $value;
		switch($type){
			case "text":
			case "hidden":
			case "file":
			case "password":
				echo '<input type="'.$type.'" name="'.$name.'" id="'.$name.'" value="'.$value.'" size="'.$size.'" />';
			break;
			case "textarea":
				echo '<textarea cols="0" rows="0" name="'.$name.'" id="'.$name.'">'.$value.'</textarea>';
			break;
			case "button":
			case "submit":
			case "reset":
				echo '<input type="'.$type.'" value="'.$name.'" title="'.$name.'" onclick="'.$value.'" class="bt1" />';
			break;
			case "button2":
			case "submit2":
			case "reset2":
				$type = str_replace("2","",$type);
				echo '<input type="'.$type.'" value="'.$name.'" title="'.$name.'" onclick="'.$value.'" class="bt2" />';
			break;
			case "image":
				echo '<input type="image" title="'.$size.'" alt="'.$size.'" src="'.$name.'" onclick="'.$value.'" />';
			break;
		}
	}
}

/* Input end
------------------------------------------------*/

/* label,img tags etc start
------------------------------------------------*/

function img($src,$alt=false){
	echo '<img src="'.$src.'" alt="'.$alt.'" title="'.$alt.'" />';
}

function label($name,$id){
	echo '<label for="'.$id.'">'.$name.'</label>';
}

function nb($num=1){
	for($i = 1; $i <= $num; $i++){
		$nb .= "&nbsp;";
	}
	echo $nb;
}

function a($src){
	echo '<a href="'.$src.'">';
}

/* label,img tags etc end
------------------------------------------------*/

/* wdate start
------------------------------------------------*/

function wdate($wdate){
	$arr = explode("-",$wdate);
	return $arr['1'].".".$arr['2'];
}

function wdate2($wdate){
	$arr = explode("-",$wdate);
	return $arr['0'].".".$arr['1'].".".$arr['2'];
}

/* wdate start
------------------------------------------------*/

/* script start
------------------------------------------------*/

function alert($str){
	echo '<script type="text/javascript">alert("'.$str.'");</script>';
}

function back(){
	echo '<script type="text/javascript">back();</script>';
}

function move($str){
	echo '<script type="text/javascript">move("'.$str.'");</script>';
}

/* script end
------------------------------------------------*/

/* pageing start
------------------------------------------------*/

function pageing($page=10,$page_num,$sql,$link){

	if(!$page_num) $page_num = 1;
	$pageing['total'] = mysql_num_rows(mysql_query($sql));
	$pageing['start'] = $page * ($page_num-1);
	$pageing['page_arr'] = ceil($pageing['total']/$page);
	
	if($page_num > 1){
		$pageing['button'] = "<a href='".$link."(".($page_num-1).")'><img src='/img/prev.png' alt='이전' title='이전' /></a>&nbsp;&nbsp;";
	}else{
		$pageing['button'] = "<img src='/img/prev.png' alt='이전' title='이전' />&nbsp;&nbsp;";
	}
	$pageing['button'] .= '<span class="c9">|</span>';
	if($page_num < $pageing['page_arr']){
		$pageing['button'] .= "&nbsp;&nbsp;<a href='".$link."(".($page_num+1).")'><img src='/img/next.png' alt='다음' title='다음' /></a>";
	}else{
		$pageing['button'] .= "&nbsp;&nbsp;<img src='/img/next.png' alt='다음' title='다음' />";
	}
	return $pageing;
}

/* pageing end
------------------------------------------------*/

/* string limit start
------------------------------------------------*/

function strcut($str,$start,$max){
	$count = strlen($str);
	if($count >= $max){
		for($pos = $max; $pos >= $start && ord($str[$pos-1])>= 127; $pos--);
		if( ($max - $pos)%2 == $start){
			$str = substr($str,$start,$max)."..";
		}else{
			$str = substr($str,$start,$max+1)."..";
		}
	}
	return $str;
}

/* string limit end
------------------------------------------------*/

/* image start
------------------------------------------------*/

function imgcenter($h,$src){
	$size = @getimagesize($src);
	$mt = intval($h-intval($size['1']/2));
	return $mt;
}

function imgresize($wfile,$wantW,$wantH){
	list($width,$height) = @getimagesize("./file/".$wfile);

	$w = $width/$wantW;
	$h = $height/$wantH;
	if($width <= $wantW and $height <= $wantH){
		$size['width'] = $width;
		$size['height'] = $height;
	}else{
		if($w > $h){
			$size['width'] = $wantW;
			$size['height'] = intval($height/$w);
		}else if($w < $h){
			$size['width'] = intval($width/$h);
			$size['height'] = $wantH;
		}else{
			$size['width'] = $wantW;
			$size['height'] = $wantH;
		}
	}
	return $size;
}

function thumbnail($wfile,$wantW,$wantH){
	$size = imgresize($wfile,$wantW,$wantH);
	list($width,$height,$type) = @getimagesize("./file/".$wfile);
	$img = imagecreatetruecolor($size['width'],$size['height']);
	imagefilledrectangle($img,0,0,$size['width'],$size['height'],0xffffff);
	if($type == 1) $tmp_img = imagecreatefromgif("./file/".$wfile);
	else if($type == 2) $tmp_img = imagecreatefromjpeg("./file/".$wfile);
	else if($type == 3) $tmp_img = imagecreatefrompng("./file/".$wfile);
	imagecopyresampled($img,$tmp_img,0,0,0,0,$size['width'],$size['height'],$width,$height);
	if($type == 1) imagegif($img,"./file/thumb_".$wfile);
	else if($type == 2) imagejpeg($img,"./file/thumb_".$wfile);
	else if($type == 3) imagepng($img,"./file/thumb_".$wfile);
	imagedestroy($tmp_img);
	imagedestroy($img);
}

/* image end
------------------------------------------------*/

/* hlt start
------------------------------------------------*/

function hlt($str,$schText){
	return str_replace($schText,"<span class='hlt'>".$schText."</span>",$str);
}

/* hlt end
------------------------------------------------*/

/* login start
------------------------------------------------*/
function login(){
	global $type,$no;
	$url = empty($type) ? PAGE : PAGE."/{$type}/{$no}";
	?>
	<form action="/login/login" method="post" id="login_frm">
	<input type="hidden" name="move" id="move" value="<?php echo $url;?>" />
	</form>
	<?php
}
/* login end
------------------------------------------------*/
?>