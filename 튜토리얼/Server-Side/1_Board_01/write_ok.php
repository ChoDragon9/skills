<?php
  // DB 연결
  $db = new PDO("mysql:host=127.0.0.1;dbname=20190428;charset=utf8","root","xampp");

  // 쿼리문 작성
  $sql = "
    INSERT INTO board SET
    subject = '{$_POST['subject']}',  # 제목
    writer = '{$_POST['writer']}',    # 작성자
    content = '{$_POST['content']}',  # 내용
    reg_date = now();                 # 작성일
  ";
  if ($db->query($sql)) { // 쿼리문 실행
    header('Location:./index.php'); // 쿼리문이 정상적으로 실행되면 list.php로 이동
  } else {
    print_r($db->errorInfo());    // 쿼리문에 문제가 있으면 에러 출력
  }