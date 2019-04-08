<?php
$db->query("update","",$db->colume($_POST,"lv"),"no='$_SESSION[uno]'");
alert("수정되었습니다.");
move(PAGE);
?>