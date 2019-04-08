<?
$mainid = change($_POST[mainid]);
$title = change($_POST[title]);
sql("insert into menu(no,main_id,title,type) values('','$mainid','$title','main')");
move(PAGE);
?>