<h3>게시판 글 입력시 악성코드의 가능성이 있는 script와 iframe을 제거한 후 DB에 저장한다. <br />일반 HTML 태그와 script, iframe을 함께 써서 등록한 경우 일반 태그는 그대로 두고 script, iframe 부분만 제거되어야 함. 
</h3>
<form action="" method="post">
<textarea cols="40" rows="10" name="content"></textarea>
<input type="submit" value="실행" />
</form>
<?php
function security($str){
	$str = preg_replace("!<script(.*?)<\/script>!is","",$str);
	$str = preg_replace("!<iframe(.*?)<\/iframe>!is","",$str);
	$str = preg_replace("!<iframe(.*?)>!is","",$str);
	$str = preg_replace("!<script(.*?)>!is","",$str);
	$str = str_replace("</script>","",$str);
	$str = str_replace("</iframe>","",$str);
	return $str;
}
if($_POST['content']){
	$content = security($_POST['content']);
	echo $content;
}
?>