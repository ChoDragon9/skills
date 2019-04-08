<?
$subid = change($_POST[subid]);
$title = change($_POST[title]);
$content = change($_POST[content]);
sql("update menu set sub_id='$subid', title='$title',content='$content' where no='$no'");
move(PAGE);
?>