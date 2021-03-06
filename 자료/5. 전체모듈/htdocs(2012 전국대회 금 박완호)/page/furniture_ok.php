<?php

	// 테이블 선택
	$db->table = 'furniture';

	// 액션 값 유무 확인
	if(isset($_POST['action'])) {

		if($_POST['year'] && $_POST['month'] && $_POST['day']) {

			$date = "{$_POST['year']}-{$_POST['month']}-{$_POST['day']}";

			access(checkdate($_POST['month'],$_POST['day'],$_POST['year']),'유효하지 않는 날짜입니다.');

			$_POST['date'] = $date;

		}

		if($file_name = file_upload($_FILES['file'],'uploaded_file','img')) {

			$add_sql .= " , file='{$_FILES['file']['name']}' , file_name='{$file_name}'";

		}

		switch($_POST['action']) {

			case 'insert' :
				// 필수기입사항 검사
				access(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['title']) && isset($_POST['company']) && isset($_POST['cause']),'필수기입사항이 누락되었습니다.');
				$msg = $_SESSION['lv'] == '1' ? '가구를 등록하였습니다.' : '가구를 신청하였습니다.';
				$url = "{$get_page}";
			break;

			case 'update' :
				// 필수기입사항 검사
				access(isset($_POST['lv']) && isset($_POST['date']),'필수기입사항이 누락되었습니다.');
				$msg = '가구를 등록하였습니다.';
				$url = "{$get_page}";
				$add_sql = "where idx='{$_POST['idx']}'";
			break;

			case 'delete' :
			break;

			case 'login' :
				// 필수기입사항 검사
				access(isset($_POST['id']) && isset($_POST['pw']),'필수기입사항이 누락되었습니다.');
				access($member = $db->fetch("id=binary('{$_POST['id']}')"),'아이디를 확인해주세요.');
				access($member['pw'] == $_POST['pw'],'비밀번호를 확인해주세요.');
				foreach($member as $key=>$val) $_SESSION[$key] = $val;
				$_SESSION['login'] = 'login';
				$msg = '로그인 되었습니다.';
				$url = '/';
				alert($msg,$url);
			break;

		}

		$cancel .= "action/year/month/day/";
		$column = $db->get_column($_POST,$cancel);
		$db->$_POST['action']("{$column} {$add_sql}");
		alert($msg,$url);

	}

?>