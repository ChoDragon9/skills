<?php
  // DB 연결
  $db = new PDO("mysql:host=127.0.0.1;dbname=20190428;charset=utf8","root","xampp");
  $page = $_GET['page'] ?? 'list';
  $idx = $_GET['idx'] ?? NULL;
  $titles = [
    'list'=>'게시물 목록',
    'write'=>'게시물 작성',
    'update'=>'게시물 수정'
  ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $titles[$page]?></title>
</head>
<body>
  <?php include_once("./{$page}.php"); ?>
</body>
</html>