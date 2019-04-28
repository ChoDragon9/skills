<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<?php
  $db = new PDO("mysql:host=127.0.0.1;dbname=20190416;charset=utf8","root","xampp");
  if (isset($_POST['action'])) {
    $sql = "INSERT INTO comment (idx,content,reg_date) values(null, '{$_POST['content']}', now())";
    $db->query($sql);
  }
  $data = $db->query("SELECT * FROM comment")->fetchAll();
  foreach($data as $list){
    echo "<p>{$list['idx']} / {$list['content']} / {$list['reg_date']}</p>";
  }
?>
<form action="" method="post">
  <fieldset><legend>입력폼</legend>
    <input type="hidden" name="action" value="insert">
    <input type="text" name="content" size="60" placeholder="내용입력">
    <input type="submit" value="전송">
  </fieldset>
</form>
</body>
</html>