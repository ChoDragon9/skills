<?
$name12 = change($_POST[name]);
$subject = change($_POST[subject]);
$content = change($_POST[content]);
sql("insert into board(no,main_id,sub_id,name,subject,content,wdate) values('','$main_id','$sub_id','$name12','$subject','$content',now())");
move(PAGE);
?>