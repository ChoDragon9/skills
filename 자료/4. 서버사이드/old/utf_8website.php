<!DOCTYPE html>
<html>
<head>
<!--
파일 문자셋을 UTF-8로 바꿔준뒤 meta 태그로 설정 
설정하는 이유는 브라우저가 웹사이트의 문자셋을 체크하여 뿌려 주기 때문에 그렇지 않으면
문자가 깨져서 나오는 경우가 있다.
-->
<meta charset="utf-8">
<title>UTF-8 Web Site</title>
</head>
<body>
<?php
//DB연동시 데이터가 오고 갈때 문자셋을 정해줌
mysql_connect("localhost","root","xampp");
mysql_select_db("db");
mysql_query("set names utf8");
?>
</body>
</html>