<form action="<?php echo $code;?>?type=modify" method="post">
<div id="find">
<?php
$url = "../".$_POST['url'];
if(file_exists($url)){
	$fopen = fopen($url,"r");
	$filesize = filesize($url);
	$data = fread($fopen,$filesize);
	?>
	<input type="hidden" name="url" id="url" value="<?php echo $url;?>" />
	<textarea name="source" id="source"><?php echo view($data); ?></textarea><br />
	<input type="submit" value="수정" />
	<?php
}else{
	echo "{$url}는 존재하지 않습니다.";
}
?>
</div>
</form>