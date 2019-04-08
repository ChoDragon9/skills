<?php
$state = $_POST['state'] == "" ? "delete" : $_POST['state'];
if($state == "modify") $row = $db->fetarr("select * from product where no='$_POST[num]'");
$wfile = $HTTP_POST_FILES["wfile"]["tmp_name"];
$wfile_name = $HTTP_POST_FILES["wfile"]["name"];
if($wfile){
	if($state == "modify") unlink("./file/".$row['wfile']);
	$info = pathinfo($wfile_name);
	$arr = array("jpeg","png","gif","jpg");
	if(!in_array($info['extension'],$arr)){
		$filename = uniqid(time()).".".strtolower($info['extension']);
		move_uploaded_file($wfile,"./file/".$filename);
		thumbnail($filename,390,290);
		$_POST['wfile'] = $filename;
		if($state == "modify") $db->query("update","","wfile='$filename'","no='$_POST[num]'");
	}
}
$wfile2 = $HTTP_POST_FILES["wfile2"]["tmp_name"];
$wfile_name2 = $HTTP_POST_FILES["wfile2"]["name"];
if($wfile2){
	if($state == "modify") unlink("./file/".$row['wfile2']);
	$info = pathinfo($wfile_name2);
	$arr = array("jpeg","png","gif","jpg");
	if(!in_array($info['extension'],$arr)){
		$filename2 = uniqid(time()).".".strtolower($info['extension']);
		move_uploaded_file($wfile2,"./file/".$filename2);
		thumbnail($filename2,390,290);
		$_POST['wfile2'] = $filename2;
		if($state == "modify") $db->query("update","","wfile2='$filename2'","no='$_POST[num]'");
	}
}
$wfile3 = $HTTP_POST_FILES["wfile3"]["tmp_name"];
$wfile_name3 = $HTTP_POST_FILES["wfile3"]["name"];
if($wfile3){
	if($state == "modify") unlink("./file/".$row['wfile3']);
	$info = pathinfo($wfile_name3);
	$arr = array("jpeg","png","gif","jpg");
	if(!in_array($info['extension'],$arr)){
		$filename3 = uniqid(time()).".".strtolower($info['extension']);
		move_uploaded_file($wfile3,"./file/".$filename3);
		thumbnail($filename3,390,290);
		$_POST['wfile3'] = $filename3;
		if($state == "modify") $db->query("update","","wfile3='$filename3'","no='$_POST[num]'");
	}
}
switch($state){
	case "insert":
		$db->query("insert","",$db->colume($_POST,"state"));
		alert("등록 되었습니다.");
	break;
	case "modify":
		$db->query("update","",$db->colume($_POST,"state/wfile/wfile2/wfile3/num"),"no='$row[no]'");
		alert("수정 되었습니다.");
	break;
	case "delete":
		$db->query("delete","","","no='$no'");
		alert("삭제 되었습니다.");
	break;
}
move(PAGE);
?>