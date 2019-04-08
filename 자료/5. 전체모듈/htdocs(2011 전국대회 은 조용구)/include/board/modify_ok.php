<?
$name12 = change($_POST[name]);
$subject = change($_POST[subject]);
$content = change($_POST[content]);
sql("update board set name='$name12', subject = '$subject', content='$content' where no='$no'");
move(PAGE);
?>