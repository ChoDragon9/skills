<?php
define("IN_SITE",true);

/* Mysql Lib Start
---------------------------------------------------------*/

function sql($sql){
	return mysql_query($sql);
}

function fetch($res){
	return mysql_fetch_array($res);
}

function fetarr($sql){
	$res = sql($sql);
	return fetch($res);
}

function num($sql){
	$res = sql($sql);
	return mysql_num_rows($res);
}

function CreateTable($name,$str){
	sql("create table {$name}(
		$str
	);");
}

function escape($str){
	$str = htmlspecialchars($str);
	return mysql_real_escape_string($str);
}

/* Mysql Lib End
---------------------------------------------------------*/

/* Clean Url Start
---------------------------------------------------------*/

$title = "YG Blog";
$page = "/";
if(isset($_GET)){
	foreach($_GET as $key=>$val){
		$$key = $val;
	}

	if(isset($sub_id)){
		$sdt = fetarr("select title,sub_id,main_id,type from menu where type!='main' and sub_id='$sub_id' limit 1");
		$mdt = fetarr("select title,main_id from menu where type='main' and main_id='$sdt[main_id]' limit 1");

		if(!empty($sdt)){
			$title = $mdt['title']." :: ".$sdt['title'];
		}

		$page .= "{$sub_id}";
		if(!empty($type)){
			$page2 = $page."/{$type}";
			define("PAGE2",$page2);
		}

	}
}

/* Clean Url End
---------------------------------------------------------*/

/* Scripts Start
---------------------------------------------------------*/

function move($str){
	echo '<script type="text/javascript">location.replace("'.$str.'");</script>';
}

function back(){
	echo '<script type="text/javascript">history.back();</script>';
}

function alert($str){
	echo '<script type="text/javascript">alert("'.$str.'");</script>';
}

/* Scripts End
---------------------------------------------------------*/

/* Date Format Start
---------------------------------------------------------*/

function board($wdate){
	$datearr = explode("-",$wdate);
	return substr($datearr['0'],2,2).".".$datearr['1'].".".substr($datearr['2'],0,2);
}

function board2($wdate){
	$datearr = explode("-",$wdate);
	return $datearr['0'].". ".$datearr['1'].". ".substr($datearr['2'],0,8);
}

/* Date Format End
---------------------------------------------------------*/

/* Pageing Start
---------------------------------------------------------*/

function pageing($page,$page_num,$sql){
	global $sdt,$sub_id,$schText;
	$pageing = array();
	$pageing['page'] = (int)$page;
	$pageing['page_num'] = (int)$page_num;
	$pageing['total'] = num($sql);
	$pageing['page_arr'] = ceil($pageing['total']/$pageing['page']);
	$pageing['start'] = $pageing['page'] * ( $pageing['page_num'] - 1 );

	$pageing['first_num'] = ($page_num - 1) * 10 + 1;
	for($i = 1,$j = $pageing['first_num']; $i <= $pageing['page_arr'] and $j <= $pageing['first_num']+10; $i++,$j++){
		if($page_num == $i){
			$pageing['button'] .= "<a href='#' data-role='button' data-mini='true'>".$i."</a>";
		}else{
			$sch = preg_replace("/([?])+([a-z0-9A-Z=&]{1,})/","",$_SERVER['REQUEST_URI']);
			if($sch == "/mobilepage/include/search.php"){
				$pageing['button'] .= "<a href='/mobilepage/include/search.php?list=".$i."&schText=".$schText."' data-role='button' data-mini='true'>[{$i}]</a>";
			}else if(empty($sdt)){
				$pageing['button'] .= "<a href='/index.php?list=".$i."' data-role='button' data-mini='true' >[{$i}]</a>";
			}else{
				$pageing['button'] .= "<a href='/mobilepage/include/board.php?sub_id=".$sub_id."&list=".$i."' data-role='button' data-mini='true'>[{$i}]</a>";
			}
		}
	}
	return $pageing;
}

/* Pageing End
---------------------------------------------------------*/

/* Content View Start
---------------------------------------------------------*/

function view($content){
	$content = nl2br($content);
	return $content;
}

/* Content View End
---------------------------------------------------------*/

/* Tags Start
---------------------------------------------------------*/

function nb($num=1){
	return str_repeat("&nbsp;",$num);
}

/* Tags End
---------------------------------------------------------*/

/* Hight Light Start
---------------------------------------------------------*/

function hlt($str){

	if(!empty($_POST['schText'])){
		$schText = escape($_POST['schText']);
	}else if(!empty($_GET['schText'])){
		$schText = escape($_GET['schText']);
	}else{
		$schText = "";
	}

	if($schText != ""){
		$str = str_replace($schText,'<span class="hlt">'.$schText.'</span>',$str);
	}

	return $str;

}

/* Hight Light End
---------------------------------------------------------*/

?>