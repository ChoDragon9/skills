<?php
session_destroy();
unset($_SERVER['PHP_AUTH_USER']);
unset($_SERVER['PHP_AUTH_PW']);
alert("�α׾ƿ� �Ǿ����ϴ�.");
move("/");
?>