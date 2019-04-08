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

$title = "2013 독일 국제기능경기대회 웹디자인 금메달!!";
$page = "/";
if(isset($_GET['param'])){
	$arr = explode("/",$_GET['param']);
	$menuarr = array("sub_id","type","no");
	foreach($arr as $key=>$val){
		$$menuarr["$key"] = $val;
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

define("PAGE",$page);

/* Clean Url End
---------------------------------------------------------*/

/* Tags Start
---------------------------------------------------------*/

function img($src,$alt){
	return '<img src="'.$src.'" alt="'.$alt.'" title="'.$alt.'" />';
}

$input = new input();
class input{

	function input($type=false,$name=false,$value=false,$size=false){
		switch($type){
			case "text":
			case "file":
			case "hidden":
			case "password":
				if($value == '' and isset($this->value)) $value = $this->value["$name"];
				return '<input type="'.$type.'" name="'.$name.'" title="'.$name.'" id="'.$name.'" size="'.$size.'" value="'.$value.'" />';
			break;
			case "button":
			case "submit":
			case "reset":
				return '<input type="'.$type.'" value="'.$name.'" class="common" onclick="'.$value.'" title="'.$name.'" />';
			break;
			case "button2":
			case "submit2":
			case "reset2":
				return '<input type="'.str_replace(2,"",$type).'" value="'.$name.'" onclick="'.$value.'" title="'.$name.'" />';
			break;
			case "textarea":
				if($value == '' and isset($this->value)) $value = $this->value["$name"];
				return '<textarea cols="0" rows="0" name="'.$name.'" id="'.$name.'">'.$value.'</textarea>';
			break;
		}
	}

}

function nb($num=1){
	return str_repeat("&nbsp;",$num);
}

function label($name,$id){
	return '<label for="'.$id.'">'.$name.'</label>';
}

/* Tags End
---------------------------------------------------------*/

/* Scripts Start
---------------------------------------------------------*/

function move($str){
	echo '<script type="text/javascript">move("'.$str.'");</script>';
}

function back(){
	echo '<script type="text/javascript">back();</script>';
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
	return $datearr['0'].". ".$datearr['1'].". ".substr($datearr['2'],0,8);
}

/* Date Format End
---------------------------------------------------------*/

/* Pageing Start
---------------------------------------------------------*/

function pageing($page,$page_num,$sql){
	global $sdt;
	$pageing = array();
	$pageing['page'] = (int)$page;
	$pageing['page_num'] = (int)$page_num;
	$pageing['total'] = num($sql);
	$pageing['page_arr'] = ceil($pageing['total']/$pageing['page']);
	$pageing['start'] = $pageing['page'] * ( $pageing['page_num'] - 1 );
	$pageing['button'] = '◀이전';
	if($pageing['page_num'] > 1){
		if(empty($sdt)){
			$pageing['button'] = '<a href="/list/list/'.($pageing['page_num'] - 1).'">'.$pageing['button'].'</a>';
		}else{
			$pageing['button'] = '<a href="'.PAGE.'/list/'.($pageing['page_num'] - 1).'">'.$pageing['button'].'</a>';
		}
	}
	$pageing['button'] .= nb(2);
	$pageing['first_num'] = ($page_num - 1) * 10 + 1;
	for($i = 1,$j = $pageing['first_num']; $i <= $pageing['page_arr'] and $j <= $pageing['first_num']+10; $i++,$j++){
		if($page_num == $i){
			$pageing['button'] .= "<span class='now'>".$i."</span>";
		}else{
			if(empty($sdt)){
				$pageing['button'] .= "<a href='/list/list/".$i."'>[{$i}]</a>";
			}else{
				$pageing['button'] .= "<a href='".PAGE."/list/".$i."'>[{$i}]</a>";
			}
		}
		$pageing['button'] .= nb(2);
	}
	if($pageing['page_num'] < $pageing['page_arr']){
		if(empty($sdt)){
			$pageing['button'] .= '<a href="/list/list/'.($pageing['page_num']+1).'">다음▶</a>';
		}else{
			$pageing['button'] .= '<a href="'.PAGE.'/list/'.($pageing['page_num']+1).'">다음▶</a>';
		}
	}else{
		$pageing['button'] .= '다음▶';
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

/* Hight Light Start
---------------------------------------------------------*/

function hlt($str){

	$schText = !empty($_POST['schText']) ? escape($_POST['schText']) : "";

	if($schText != ""){
		$str = str_replace($schText,'<span class="hlt">'.$schText.'</span>',$str);
	}

	return $str;

}

/* Hight Light End
---------------------------------------------------------*/

?>