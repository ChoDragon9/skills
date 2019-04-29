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
        content = '{$content}'   # 내용
        WHERE idx = '{$idx}'              # 수정 될 게시물
      ";
      $url = './?page=view&idx='.$idx;
    break;
    case 'delete' :
      $sql = "DELETE FROM board WHERE idx = '{$idx}';";
    break;
  }

  // 쿼리문 실행. 쿼리문에 에러 처리가 있으므로, 호스트 코드에서는 굳이 에러를 처리하지 않아 도됨
  $res = query($sql);

  // 메세지 출력 후 페이지 이동
  alert("완료되었습니다.");
  move($url);

  // action.php를 불러올 경우, action.php 뒤에 출력될 내용이 없도록 한다.
  exit;