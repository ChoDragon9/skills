<?php
$db->query("update","",$db->colume($_POST,"lv"),"no='$_SESSION[uno]'");
alert("�����Ǿ����ϴ�.");
move(PAGE);
?>