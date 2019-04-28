<?php

  // 경고메세지 
  function alert ($str) {
    echo "<script>alert('{$str}')</script>";
  }

  // 페이지이동
  function move ($str = false) {
    echo "<script>";
    echo $str ? "location.replace('{$str}')" : "history.back();";
    echo "</script>";
    exit;
  }

  // 조건 검사 + 경고창 + 페이지이동
  function access ($bool, $msg, $url = false) {
    if (!$bool) { // 조건을 만족하지 못하면
      alert($msg); // 경고창을 띄운 후
      move($url); // 페이지 이동
    }
  }

  // 한 줄로 출력
  function println ($ele) {
    echo "<p>{$ele}</p>";
  }

  // 디버그를 위한 print
  function print_pre ($ele) {
    echo "<pre>";
    print_r($ele);
    echo "</pre>";
  }

  // 쿼리문 실행
  function query ($sql, $arr = []) {
    $db = new PDO("mysql:host=127.0.0.1;dbname=20190428;charset=utf8","root","xampp");
    $res = $db->query($sql);
    // 에러 감지
    if ($res) {
      $db = null; // 연결 종료
      return $res;
    } else {
      // 에러가 있을 시 쿼리문과 에러 출력 후 프로그램 중지
      println($sql);
      print_pre($db->errorInfo());
      exit;
    }
  }

  // 단일 데이터 가져오기
  function fetch ($sql) {
    return query($sql)->fetch(PDO::FETCH_OBJ);
  }

  // 다중 데이터 가져오기
  function fetchAll ($sql) {
    return query($sql)->fetchAll(PDO::FETCH_OBJ);
  }

  // 데이터의 갯수 가져오기
  function rowCount ($sql) {
    return query($sql)->rowCount();
  }