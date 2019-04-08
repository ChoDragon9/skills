<?
$mainid = change($_POST[mainid]);
$subid = change($_POST[subid]);
$title = change($_POST[title]);
$content = change($_POST[content]);
sql("insert into menu(no,main_id,sub_id,title,type,content) values('','$mainid','$subid','$title','html','$content')");
move(PAGE);
?>