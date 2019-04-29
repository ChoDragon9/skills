<?php
  // DB 연결
  $db = new PDO("mysql:host=127.0.0.1;dbname=20190428;charset=utf8","root","xampp");
  $sql = "SELECT * FROM board WHERE idx = '{$_GET['idx']}'";
  $row = $db->query($sql)->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>게시물 조회</title>
</head>
<body>
  <ul>
    <li><?php echo $row->idx ?></li>
    <li><?php echo $row->writer ?></li>
    <li><?php echo $row->subject ?></li>
    <li><?php echo $row->reg_date ?></li>
    <li><?php echo $row->content ?></li>
  </ul>
  <p>
    <a href="./update.php?idx=<?php echo $row->idx?>">수정</a>
    <a href="./delete.php?idx=<?php echo $row->idx?>">삭제</a>
    <a href="./index.php">목록</a>
  </p>
</body>
</html>