<?
$file = $HTTP_POST_FILES[wfile][tmp_name];
$file_name = $HTTP_POST_FILES[wfile][name];
$arr = explode(".",$file_name);
$ext = $arr[sizeof($arr)-1];
$file_name = time().".".$ext;
move_uploaded_file($file,"../file/".$file_name);
$name12 = change($_POST[name]);
$subject = change($_POST[subject]);
$content = change($_POST[content]);
sql("insert into board(no,main_id,sub_id,name,subject,content,wfile,file_name,wdate) values('','$main_id','$sub_id','$name12','$subject','$content','$file_name','$file_name',now())");
move(PAGE);
?>