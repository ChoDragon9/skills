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
  <title>게시물 작성</title>
</head>
<body>
  <form action="./update_ok.php?idx=<?php echo $_GET['idx']?>" method="post">
    <fieldset>
      <legend>글작성</legend>
      <ul>
        <li>
          <label>
            제목
            <input type="text" name="subject" value="<?php echo $row->subject?>">
          </label>
        </li>
        <li>
          <label>
            작성자
            <input type="text" name="writer" value="<?php echo $row->writer?>">
          </label>
        </li>
        <li>
          <label>
            내용
            <input type="text" name="content" value="<?php echo $row->content?>" size="80">
          </label>
        </li>
        <li>
          <button type="submit">완료</button>
          <button type="button" onclick="location.href = './view.php?idx=<?php echo $row->idx?>'">취소</button>
        </li>
      </ul>
    </fieldset>
  </form>
</body>
</html>