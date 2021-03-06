<?php

	// 세션 시작
	session_start();

	// 팝업 오늘 하루 열지 않기
	if($_POST['popup']) {

		setcookie('popup',$_POST['popup'],time()+86400);

		alert(false);

	}

	// 인코딩
	function encode($str) {
		$str = base64_encode($str);
		$str = str_replace('/','^2',$str);
		$str = str_replace('+','$4',$str);
		return $str;
	}

	// 디코딩
	function decode($str) {
		$str = str_replace('$4','+',$str);
		$str = str_replace('^2','/',$str);
		$str = base64_decode($str);
		return $str;
	}

	// 주소 값 저장
	$var_array = explode('/',$_GET['param']);
	$page_mode = $var_array[0];
	$midx = $var_array[1];
	$sidx = $var_array[2];
	$action = $var_array[3];
	$idx = $var_array[4];
	$page_num = $var_array[4] ? $var_array[4] : '1';
	$parent = $var_array[5];

	$current = $page_mode && $midx && $sidx ? 'sub' : 'main';
	$get_page = "/{$page_mode}/{$midx}/{$sidx}/";

	// 사용 용도
	$cause = array('식탁','장롱','책상','의자','소파');

	// 메시지 출력 & 페이지 이동
	function alert($msg = false, $url = false) {
		echo '<script type="text/javascript">';
			echo $msg ? "alert('{$msg}');" : "";
			echo $url ? "document.location.replace('{$url}');" : "history.back();";
		echo '</script>';
		exit();
	}

	// 페이지 엑서스
	function access($bool, $msg = '해당 페이지를 엑서스할 수 없습니다.',$url = false) {
		if(!$bool) alert($msg,$url);
	}

	// 회원 접근 권한
	function lv_chk($lv) {
		$now_lv = $_SESSION['lv'] ? $_SESSION['lv'] : '3';
		if($lv == '1') { 
			$msg = '관리자만 접근할 수 있습니다.';
			$url = '/';
		} else {
			$msg = '로그인 후 이용해주세요.';
			$url = '/page/member/login/';
		}
		alert($msg,$url);
	}

	// 파일 다운로드
	function down($file,$file_name,$dir) {
		$file = encode($file);
		$file_name = encode($file_name);
		$dir = "/page/down.php?file={$file}&amp;file_name={$file_name}&amp;dir={$dir}";
		return $dir;
	}

	// 문자열 엔티티
	function safe_html($array) {
		if(is_array($array)) {
			foreach($array as $key=>$val) $array[$key] = htmlspecialchars($val);
			return $array;
		}
	}

	// 이메일 암호화
	function hex($str) {
		$strlen = strlen($str);
		for($i = 0; $i < $strlen; $i++) $hex .= '&#x'.bin2hex(substr($str,$i,1)).';';
		return $hex;
	}

	// 문자열 자르기
	function cut_str($str,$len) {
		$str = html_entity_decode($str);
		$strlen = strlen($str);
		if($strlen > $len) $str = substr($str,0,$len).'..';
		$str = htmlspecialchars($str);
		return $str;
	}

	// 문자열 하이라이트
	function hit($str,$keyword) {
		$hit = str_replace($keyword,"<span class=\"search_txt\">{$keyword}</span>",$str);
		return $hit;
	}

	// 파일 업로드
	function file_upload($file,$dir,$type = 'img') {
		if(is_uploaded_file($file['tmp_name'])) {
			$file_name = array_pop(explode('.',strtolower($file['name'])));
			if($type == 'img') {
				$extenstion = array('jpeg','jpg','gif','png');
				access(in_array($file_name,$extenstion),'이미지 파일(jpg,jpeg,png,gif) 만 업로드할 수 있습니다.');
			} else {
				$extenstion = array('html','html','js','jsp','asp','css','php');
				accesss(!in_array($file_name,$extenstion),'업로드가 제한된 파일입니다.');
			}
		}
		$date = date('Ymdhis');
		$rand = rand();
		$file_upload = "{$date}_{$_SESSION['id']}_{$rand}_{$dir}.{$file_name}";
		move_uploaded_file($file['tmp_name'],"{$_SERVER['DOCUMENT_ROOT']}/data/{$dir}/{$file_upload}");
		return $file_upload;
	}

	// 페이지 나누기
	function paginate($cur_page,$line,$total,$url,$type) {

		if($total) {

			$first_page = '1';
			$last_page = ceil($total/$line);
			$prev_page = $cur_page - 1;
			$next_page = $cur_page + 1;
			$url = explode('&&',$url);

			$paginate = "<p class=\"paginate\">";

			$paginate .= $cur_page == $first_page ? "<button title=\"처음페이지\" disabled=\"disabled\" class=\"btn\">처음페이지</button>" : "<button title=\"처음페이지\" class=\"btn\" onclick=\"link('{$url[0]}{$first_page}{$url[1]}')\">처음페이지</button>";

			$paginate .= $cur_page == $first_page ? "<button title=\"이전페이지\" disabled=\"disabled\" class=\"btn\">이전페이지</button>" : "<button title=\"이전페이지\" class=\"btn\" onclick=\"link('{$url[0]}{$prev_page}{$url[1]}')\">이전페이지</button>";

			for($i = 1; $i <= $last_page; $i++) {

				$paginate .= $i == $cur_page ? "<strong title=\"{$i}\">{$i}</strong>" : "<a href=\"{$url[0]}{$i}{$url[1]}\" title=\"{$i}\">{$i}</a>";

			}

			$paginate .= $cur_page == $last_page ? "<button title=\"다음페이지\" disabled=\"disabled\" class=\"btn\">다음페이지</button>" : "<button title=\"다음페이지\" class=\"btn\" onclick=\"link('{$url[0]}{$next_page}{$url[1]}')\">다음페이지</button>";

			$paginate .= $cur_page == $last_page ? "<button title=\"맨뒤페이지\" disabled=\"disabled\" class=\"btn\">맨뒤페이지</button>" : "<button title=\"맨뒤페이지\" class=\"btn\" onclick=\"link('{$url[0]}{$last_page}{$url[1]}')\">맨뒤페이지</button>";

			$paginate .= "</p>";

			return $paginate;

		}

	}

?>