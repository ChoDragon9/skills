<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
</head>
<body>
<?php
  $db = new PDO("mysql:host=127.0.0.1;dbname=20190416;charset=utf8","root","xampp");
  if(isset($_POST['action'])){
    switch($_POST['action']){
      case 'insert' :
        $sql = "INSERT INTO comment (idx,content,reg_date) values(null,'{$_POST['content']}',now())";
      break;
      case 'update' :
        $sql = "UPDATE comment set content='{$_POST['content']}' where idx='{$_POST['idx']}'";
      break;
      case 'delete' : 
        $sql = "DELETE FROM comment where idx='{$_POST['idx']}'";
      break;
    }
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
<form action="" method="post">
  <fieldset><legend>수정폼</legend>
    <input type="hidden" name="action" value="update">
    <input type="text" name="idx" size="10" placeholder="글번호">
    <input type="text" name="content" size="60" placeholder="내용">
    <input type="submit" value="전송">
  </fieldset>
</form>
<form action="" method="post">
  <fieldset><legend>삭제폼</legend>
    <input type="hidden" name="action" value="delete">
    <input type="text" name="idx" size="10" placeholder="글번호">
    <input type="submit" value="전송">
  </fieldset>
</form>
</body>
</html>