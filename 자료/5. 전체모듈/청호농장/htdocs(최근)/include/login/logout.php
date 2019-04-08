<?php
session_destroy();
unset($_SERVER['PHP_AUTH_USER']);
unset($_SERVER['PHP_AUTH_PW']);
alert("로그아웃 되었습니다.");
move("/");
?>