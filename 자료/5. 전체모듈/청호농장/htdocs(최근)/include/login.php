<?php
if($type){
	include("./include/login/".$type.".php");
}else{
	if($_SESSION['uno']){
		alert("�̹� �α��� �ϼ̽��ϴ�.");
		move("/");
	}
?>
<div id="login">
	<div id="logintxt"><?php img("/img/logintxt.png","LOGIN");?></div>
	<div id="loginfrm">
		<div class="title"><?php img("/img/loginsimbol.png","O"); nb(); img("/img/sublogintitle.png","�α���");?></div>
		<form action="<?php echo PAGE."/login_ok";?>" method="post" onsubmit="return valchk('id,pwd');">
			<ul class="login_label">
				<li><?php label("���̵�","id");?></li>
				<li><?php label("�н�����","pwd");?></li>
			</ul>
			<ul class="login_input">
				<li><?php $input->input("text","id");?></li>
				<li><?php $input->input("password","pwd"); $input->input("hidden","move",$_POST['move']);?></li>
			</ul>
			<div class="login_bt"><?php $input->input("submit");?></div>
		</form>
		<ul class="login_join">
			<li>ȸ�������� ���Ͻô� ���� ȸ�������� Ŭ�����ּ���.</li>
			<li><a href="/join/join"><?php img("/img/joinbt.png","ȸ������");?></a></li>
		</ul>
	</div>
</div>
<?php
}
?>