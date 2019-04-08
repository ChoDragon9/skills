<?
$row = fetch("select * from experlist where wyear = '$type' and wmonth ='$no' and wday = '$day' and name='$_SESSION[name]'");
if($row[no]){
	move(PAGE);
}else{
$name1 = change($_SESSION[name]);
$sex = change($_POST[sex]);
$address = change($_POST[address]);
$phone = change($_POST[phone]);
$file = $HTTP_POST_FILES[wfile][tmp_name];
$file_name = $HTTP_POST_FILES[wfile][name];
$arr = explode(".",$file_name);
$ext = $arr[sizeof($arr)-1];
$file_name = time().".".$ext;
move_uploaded_file($file,"../file/".$file_name);
sql("insert into experlist values('','$name1','$sex','$type','$no','$day','$address','$phone','$file_name','$file_name','´ë±â')");
move(PAGE);
}
?>