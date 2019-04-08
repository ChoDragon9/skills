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
sql("insert into content(no,subject,content,wdate,date,tags,main_id,sub_id,name) values('','$sub','$con',now(),now(),'$tags','$_POST[mainid]','$subid','$_POST[name1]')");
move("http://blog.jinzza.net/page/index.php/".$_POST[mainid]);
?>