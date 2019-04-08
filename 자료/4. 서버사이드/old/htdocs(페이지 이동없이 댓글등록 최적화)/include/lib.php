<?php

/* session start
------------------------------------------------*/
session_start();
/* session end
------------------------------------------------*/

/* mysql start
------------------------------------------------*/
mysql_connect("localhost","root","apmsetup");
mysql_select_db("db");

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
/* mysql end
------------------------------------------------*/

/* url start
------------------------------------------------*/
$url = "http://127.0.0.1/index.php";
/* url end
------------------------------------------------*/

/* js script start
------------------------------------------------*/
function alert($str){
	echo '<script type="text/javascript">alert("'.$str.'");</script>';
}

function move($str){
	echo '<script type="text/javascript">move("'.$str.'");</script>';
}

function back($str){
	echo '<script type="text/javascript">back();</script>';
}
/* js script end
------------------------------------------------*/

/* label start
------------------------------------------------*/
function label($id,$name){
	return '<label for="'.$id.'">'.$name.'</label>';
}
/* label end
------------------------------------------------*/

/* &nbsp; start
------------------------------------------------*/
function nb($num=1){
	for($i = 1; $i <= $num; $i++){
		$nb .= "&nbsp;";
	}
	return $nb;
}
/* &nbsp; end
------------------------------------------------*/
?>