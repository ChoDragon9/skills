<?
//mysql_set_start
mysql_connect("localhost","root","apmsetup");
mysql_select_db("db");
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
//mysql_set_end
//link_set_start
$url = "http://127.0.0.1";
$index = $url."/page/index.php";
$common = $url."/common";
$fla = $url."/fla";
$img = $url."/img";
$file = $url."/file";

$arr = explode("/",$_SERVER['REQUEST_URI']);
$main_id = $arr[3];
$sub_id = $arr[4];
$type = $arr[5];
$no = $arr[6];
$day = $arr[7];
$day2 = $arr[8];
$day3 = $arr[9];

define(PAGE,$index."/".$main_id."/".$sub_id);
//link_set_end
//hex_set_start
function hex($str){
	for($i = 0; $i < strlen($str); $i++){
		$r .= "&#x".bin2hex(substr($str,$i,1)).";";
	}
	return $r;
}
function hex2($str){
	preg_match_all("/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{1,})/",$str,$a,PREG_SET_ORDER);
	for($i = 0; $i < count($a); $i++){
		$str = str_replace($a[$i][0],hex($a[$i][0]),$str);
	}
	return $str;
}
//hex_set_end
//hlthex_set_start

function hlthex($str){
	return str_replace(hex($_POST[schText]),"<span class='hlt'>".hex($_POST[schText])."</span>",hex2($str));
}
//hlthex_set_end
//title_set_start
$mdt = fetch("select * from menu where type='main' and main_id='$main_id'");
$sdt = fetch("select * from menu where sub_id='$sub_id' and main_id='$main_id'");
if($sdt){
	$title = "Home&nbsp;/&nbsp;".$mdt[title]."&nbsp;/&nbsp;".$sdt[title];
}else{
	$title = "친환경마을 성곡마을홈페이지를 방문해주셔서 감사합니다.";
}
//title_set_end
//input_set_start
function input($type,$name,$val,$w){
	switch($type){
		case "text" : echo '<input type="text" name="'.$name.'" id="'.$name.'" title="'.$name.'" class="input" style="width:'.$w.'px;" value="'.$val.'" />';break;
		case "file" : echo '<input type="file" name="'.$name.'" id="'.$name.'" title="'.$name.'" class="input" style="width:'.$w.'px;" value="'.$val.'" />';break;
		case "password" : echo '<input type="password" name="'.$name.'" id="'.$name.'" class="input" title="'.$name.'" style="width:'.$w.'px;" value="'.$val.'" />';break;
		case "hidden" : echo '<input type="hidden" name="'.$name.'" id="'.$name.'" title="'.$name.'" style="width:'.$w.'px;" value="'.$val.'" />';break;
		case "button" : echo '<input type="button" title="'.$name.'" value="'.$name.'" onclick="'.$val.'" class="button" />';break;
		case "reset" : echo '<input type="reset" title="'.$name.'" value="'.$name.'" class="button" />';break;
		case "submit" : echo '<input type="submit" title="'.$name.'" value="'.$name.'" class="button" />';break;
		case "textarea" : echo '<textarea id="'.$name.'" name="'.$name.'" title="'.$name.'" class="input" cols="60" rows="8">'.$val.'</textarea>';break;
	}
}
//input_set_end
//label_set_start
function label($id,$name){
	echo '<label id="hlt_'.$id.'" for="'.$id.'" title="'.$name.'">'.$name.'</label>';
}
//label_set_end
//change_set_start
function change($str){
	return mysql_real_escape_string(strip_tags($str));
}
//change_set_end
//script_set_start
function move($str){
	echo '<script type="text/javascript">location.replace("'.$str.'");</script>';
}
function alert($str){
	echo '<script type="text/javascript">alert("'.$str.'");</script>';
}
function back(){
	echo '<script type="text/javascript">history.back();</script>';
}
//script_set_end
//pageing_set_start
function page($page_num,$page_arr,$link){
	if($page_num > 1) $page.="&nbsp;<a href='".$link."(".($page_num-1).")'>이전페이지</a>&nbsp;";
	for($i = 1; $i <= $page_arr ; $i++){
		if($page_num == $i){
			$page .= "&nbsp;[".$i."]&nbsp;";
		}else{
			$page .= "&nbsp;<a href='".$link."(".$i.")'>".$i."</a>&nbsp;";
		}
	}
	if($page_num < $page_arr) $page.="&nbsp;<a href='".$link."(".($page_num+1).")'>다음페이지</a>&nbsp;";
	return $page;
}
//pageing_set_end
//hlt_set_start
function hlt($str){
	return str_replace($_POST[schText],"<span class='hlt'>".$_POST[schText]."</span>",strip_tags($str));
}
//hlt_set_end
//down_set_start
function down(){
	header("content-type:application/vnd.ms-excel;charset=KSC5601");
	header("content-Disposition:attachment;filename=member.csv");
	$content = "예약자,성별,예약날,주소,연락처\r\n";
	$res = sql("select * from experlist");
	while($row = mysql_fetch_array($res)){
		$content .= $row[name].",".$row[sex].",".date("Y-m-d",strtotime(date("$row[wyear]-$row[wmonth]-$row[wday]"))).",".$row[address].",".$row[phone]."\r\n";
	}
	echo $content;
}
//down_set_end
?>