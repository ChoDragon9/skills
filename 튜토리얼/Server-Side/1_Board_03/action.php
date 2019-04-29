<?php
  /*
  $_POST의 key값을 변수로 할당한다.
  $_POST['action'] => $action
  $_POST['subject'] => $subject
  $_POST['writer'] => $writer
  $_POST['content'] => $content
   */
  extract($_POST);
  $sql = "";    // sql 초기화
  $url = './';  // 쿼리문 처리 후 이동할 주소

  // 쿼리문 작성
  switch ($action) {
    case 'insert' :
      $sql = "
        INSERT INTO board SET
        subject = '{$subject}',  # 제목
        writer = '{$writer}',    # 작성자
        content = '{$content}',  # 내용
        reg_date = now();                 # 작성일
      ";
    break;
    case 'update' :
      $sql = "
        UPDATE board SET
        subject = '{$subject}',  # 제목
        writer = '{$writer}',    # 작성자
        content = '{$content}'  # 내용
        WHERE idx = '{$idx}'
      ";
      $url = './?page=view&idx='.$idx;
    break;
    case 'delete' :
      $sql = "DELETE FROM board WHERE idx = '{$idx}';";
    break;
  }

  if ($db->query($sql)) {       // 쿼리문 실행
    header('Location:'.$url);   // 쿼리문이 정상적으로 실행되면 페이지 이동
  } else {
    print_r($db->errorInfo());  // 쿼리문에 문제가 있으면 에러 출력
  }

  // action.php를 불러올 경우, action.php 뒤에 출력될 내용이 없도록 한다.
  exit;