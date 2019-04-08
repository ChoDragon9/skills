<?php
function downlink($wfile,$wfile_name){ //downlink(���ϸ�,�ٿ�������̸�);
	return "wfile=".urlencode($wfile)."&wfile_name=".urlencode($wfile_name);
}
?>
이미지 다운로드<br />
<a href="down.php?<?php echo downlink("><img src="1.jpg" /></a>