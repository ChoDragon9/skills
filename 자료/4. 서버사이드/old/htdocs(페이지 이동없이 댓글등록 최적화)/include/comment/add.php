<?php
include("../lib.php");
sql("insert into comment set boardnum='$_GET[boardnum]', name='$_GET[name]', content='$_GET[content]'");
?>