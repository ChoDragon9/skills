<?php
  // 앱 설정 가져오기
  include_once('./core/config.php');

  // 전송을 감지한 후 처리
  if (isset($_POST['action'])) {
    include_once('./actions/board.php');
  }
  include_once('./views/template/header.php');
  include_once("./views/board/{$page}.php");
  include_once('./views/template/footer.php');