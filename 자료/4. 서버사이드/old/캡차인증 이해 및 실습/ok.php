<?php
session_start();
if($_POST['capt'] == $_SESSION['capt']){
	$_SESSION['msg'] = true;
}else{
	$_SESSION['msg'] = false;
}
?>
<script type="text/javascript">
window.location='/';
</script>