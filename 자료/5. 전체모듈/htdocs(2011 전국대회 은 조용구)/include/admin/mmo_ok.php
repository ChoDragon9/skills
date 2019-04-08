<?
$mainid = change($_POST[mainid]);
$title = change($_POST[title]);
sql("update menu set main_id='$mainid',title='$title' where no='$no'");
move(PAGE);
?>