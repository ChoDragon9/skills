<?
session_start();
mysql_connect("localhost","semicon","whdydrn");
mysql_select_db("semicon");
mysql_query("set names utf8");
function sql($sql){
	return mysql_query($sql);
}
function move($sql){
	echo '<script type="text/javascript">location.href("'.$sql.'");</script>';
}
function change($sql){
	return mysql_real_escape_string(strip_tags(htmlspecialchars($sql)));
}
$subid = change($_POST[sub_id]);
$sub = change($_POST[subject]);
$con = change($_POST[content]);
$tags = change($_POST[tags]);
sql("update content set sub_id='$subid',subject='$sub', content='$con', tags='$tags' where no='$_POST[no]'");
move("http://blog.jinzza.net/page/index.php/".$_POST[mainid]);
?>