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

    // 미리 변수를 선언한다.
    $res = null;
    if (count($arr)) {
      $res = $db->prepare($sql);  // 쿼리문을 준비하고
      $res->execute($arr);        // $arr를 쿼리문에 바인딩한다.
    } else {
      $res = $db->query($sql);
    }

    // 쿼리문 실행 후 DB와의 연결을 종료한다.
    $db = null;

    if ($res) {
      // 정상적으로 실행 시, 결과를 반환한다.
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