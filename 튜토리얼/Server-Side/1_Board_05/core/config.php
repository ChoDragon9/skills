<?php

// 주소에서 변수 가져오기
$page = $_GET['page'] ?? 'list';
$idx = $_GET['idx'] ?? NULL;

// 타이틀 설정
$titles = [
  'list'=>'게시물 목록',
  'write'=>'게시물 작성',
  'update'=>'게시물 수정'
];