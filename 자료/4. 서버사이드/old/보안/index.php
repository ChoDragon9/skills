<h3>�Խ��� �� �Է½� �Ǽ��ڵ��� ���ɼ��� �ִ� script�� iframe�� ������ �� DB�� �����Ѵ�. <br />�Ϲ� HTML �±׿� script, iframe�� �Բ� �Ἥ ����� ��� �Ϲ� �±״� �״�� �ΰ� script, iframe �κи� ���ŵǾ�� ��. 
</h3>
<form action="" method="post">
<textarea cols="40" rows="10" name="content"></textarea>
<input type="submit" value="����" />
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