<?php
mysql_connect("localhost","root","germany");
mysql_select_db("test");
mysql_query("set names utf8");

$sql = "select * from member where id='$_GET[id]'";
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
if($row){
	echo "이미 있는 아이디입니다.";
}else{
	echo "가입할 수 있습니다.";
}
?>