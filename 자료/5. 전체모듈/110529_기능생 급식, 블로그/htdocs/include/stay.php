<?
sql("update member set stay='$_POST[stay]' where name='$_SESSION[name]'");
move(PAGE);
?>