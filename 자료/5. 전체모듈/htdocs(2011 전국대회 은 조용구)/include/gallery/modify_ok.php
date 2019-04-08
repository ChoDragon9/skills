<?
$file = $HTTP_POST_FILES[wfile][tmp_name];
$file_name = $HTTP_POST_FILES[wfile][name];
$name12 = change($_POST[name]);
$subject = change($_POST[subject]);
$content = change($_POST[content]);
if($file_name){
	$arr = explode(".",$file_name);
	$ext = $arr[sizeof($arr)-1];
	$file_name = time().".".$ext;
	move_uploaded_file($file,"../file/".$file_name);
	sql("update board set name='$name12', subject='$subject', content='$content', wfile='$file_name',file_name='$file_name' where no='$no'");
}else{
	sql("update board set name='$name12', subject='$subject', content='$content' where no='$no'");
}
move(PAGE);
?>