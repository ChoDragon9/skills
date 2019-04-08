<?
mysql_connect("localhost","semicon","whdydrn");
mysql_select_db("semicon");
mysql_query("set names utf8");

$url = "";
$index = "";
$common = "";
$img = "";
$arr = "";
$main_id = "";
$sub_id = "";
$type = "";
$no = "";

$url = "http://semicon.jinzza.net";
$index = $url."/page/index.php";
$common = $url."/common";
$img = $url."/img";
$arr = explode("/",$_SERVER['REQUEST_URI']);
$main_id = $arr[3];
$sub_id = $arr[4];
$type = $arr[5];
$no = $arr[6];

define(PAGE,$index."/".$main_id);

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

function alert($sql){
	echo '<script type="text/javascript">alert("'.$sql.'");</script>';
}
function move($sql){
	echo '<script type="text/javascript">location.replace("'.$sql.'");</script>';
}
function back(){
	echo '<script type="text/javascript">history.back();</script>';
}

function month($n,$month){
	if($n > 1){$num .= '<a href="'.$month.'('.($n-1).')">&lt;이전달</a>&nbsp;';}
	if($n < 12){$num .= '&nbsp;<a href="'.$month.'('.($n+1).')">다음달&gt;</a>';}
	return $num;
}
?>