<?
//mysql set
mysql_connect("localhost","semicon","whdydrn");
mysql_select_db("semicon");
mysql_query("set names utf8");

function sql($sql){
	return mysql_query($sql);
}
function fetch($sql){
	$res = mysql_query($sql);
	return mysql_fetch_array($res);
}
function num($sql){
	$res = mysql_query($sql);
	return mysql_num_rows($res);
}

//url set
$url = "http://blog.jinzza.net";
$common = $url."/common";
$file = $url."/file";
$img = $url."/img";
$fla = $url."/fla";
$index = $url . "/page/index.php";

$arr = explode("/",$_SERVER['REQUEST_URI']);
$main_id = $arr[3];
$sub_id = $arr[4];
$type = $arr[5];
$no = $arr[6];

define(PAGE,$index."/".$main_id);

$title = fetch("select title from job where main_id='$main_id'");
//date set
function wdate($date){
	$time = explode("-",$date);
	return $time[0]."/".$time[1]."/".$time[2];
}

//hex set
function hex($sql){
	for($i=0;$i<strlen($sql);$i++){
		$r .= "&#X".bin2hex(substr($sql,$i,1)).";";
	}
	return $r;	 
}

//text limit set
function text($str,$num){	
	if(mb_strlen($str) > $num){
		return mb_substr($str, 0, $num, "utf-8")."..";
	}else{
		return $str;
	}
}

//page
function page($page_num,$page_arr,$link){
	if($page_num > 1){ $page.='&nbsp;<a href="'.$link.'('.($page_num-1).')">이전</a>&nbsp;'; }
	for($i=1;$i<=$page_arr;$i++){
		if($page_num == $i){
			$page .= '&nbsp;['.$i.']&nbsp;';
		}else{
			$page .= '&nbsp;<a href="'.$link.'('.$i.')">'.$i.'</a>&nbsp;';
		}
	}
	if($page_num < $page_arr){ $page.='&nbsp;<a href="'.$link.'('.($page_num+1).')">다음</a>&nbsp;'; }
	return $page;
}

function page1($page_num,$page_arr,$link){
	if($page_num > 1){ $page.='&nbsp;<a href="'.$link.'('.($page_num-1).')">이전</a>&nbsp;'; }
	for($i=1;$i<=$page_arr;$i++){
		if($page_num == $i){
			$page .= '&nbsp;'.$i.'&nbsp;';
		}else{
			$page .= '&nbsp;<a href="'.$link.'('.$i.')">'.$i.'</a>&nbsp;';
		}
	}
	if($page_num < $page_arr){ $page.='&nbsp;<a href="'.$link.'('.($page_num+1).')">다음</a>&nbsp;'; }
	return $page;
}
//alert set
function alert($sql){
	echo '<script type="text/javascript">alert("'.$sql.'");</script>';
}
function move($sql){
	echo '<script type="text/javascript">location.href("'.$sql.'");</script>';
}
function back(){
	echo '<script type="text/javascript">history.back();</script>';
}

//change
function change($sql){
	return mysql_real_escape_string(strip_tags(htmlspecialchars($sql)));
}

//search
function hlt($sql){
	if($_POST[schText]){
		echo str_replace($_POST[schText],"<span class='hlt'>".$_POST[schText]."</span>",$sql);
	}else{
		echo $sql;
	}
}
?>