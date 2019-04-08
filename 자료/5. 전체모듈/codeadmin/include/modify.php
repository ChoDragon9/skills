<?php
if($_SESSION['ulogin'] == ""){
	exit;
}
$source = $_POST['source'];
$url = $_POST['url'];
if(file_exists($url)){
	$fopen = fopen($url,"r+");
	fseek($fopen,0);
	$filesize = filesize($url);
	$data = fread($fopen,$filesize);
	$arr = explode("/",$url);
	$filename = array_pop($arr);
	foreach($arr as $val){
		$tmpfilename .= $val."/";
	}
	$tmpfilename = "./tmp/".date("Y:m:d")."_tmp_".$filename;
	$fopen2 = fopen($tmpfilename,"w");
	fputs($fopen2,$data);
	fclose($fopen);
	if(file_exists($tmpfilename)){
		$fopen = fopen($url,"w");
		fputs($fopen,$source);
		fclose($fopen);
		$code .="?state=Success";
	}else{
		$code .= "?state=".urlencode("tmp파일을 생성하지 못했습니다.");
	}
}else{
	$code .= "?state=".urlencode("url이 정확하지 않습니다.");
}
move($code);
?>