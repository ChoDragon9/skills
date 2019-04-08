<?php
if($_SESSION['token'] != $_POST['token']){
	alert("권한이 없습니다.");
	move("/");
	exit;
}
if($_SESSION['uno'] and $_POST['basketnum'] and $_POST['basketno'] and $_POST['prono'] and $_POST['baskettotalprice']){
	$basketnum = substr($_POST['basketnum'],2);
	$basketno = substr($_POST['basketno'],2);
	$prono = substr($_POST['prono'],2);
	$basketnumarr = explode(",",$basketnum);
	$basketnoarr = explode(",",$basketno);
	$pronoarr = explode(",",$prono);
	$token = uniqid(time());
	$_SESSION['token'] = $token;
	?>
	<ul class="w100 fl h30">
		<li class="w60 fl"><?php img("/img/proinfo.png","1 상품정보");?></li>
		<li class="w40 tr fl"><a href="<?php echo PAGE;?>"><img src="/img/backbt.png" /></a></li>
	</ul>
	<div class="content">
		<ul class="tc bg board ft12">
			<li class="w60">상품명</li>
			<li class="w20">수량</li>
			<li class="w20">합계</li>
		</ul>
	<?php
	for($i = 0; $i < sizeof($basketnoarr); $i++){
		$row = $db->fetarr("select * from product where no='$pronoarr[$i]'");
		?>
		<ul class="ft12">
			<li class="w20"><img src="/file/thumb_<?php echo $row['wfile'];?>" alt="<?php echo $row['wfile'];?>" title="<?php echo $row['wfile'];?>" class="w80" /></li>
			<li class="w20"><?php echo $row['name'];?></li>
			<li class="w20 tc fw cr"><?php echo number_format($row['price'])." 원 (".$row['size'].")";?></li>
			<li class="w20 tc"><?php echo number_format($basketnumarr["$i"]).$row['unit'];?></li>
			<li class="w20 tc ft14 fw"><?php echo number_format($basketnumarr["$i"]*$row['price'])." 원";?></li>
		</ul>
		<?php
	}
	?>
		<ul class="bt">
			<li class="tr ft18 mg fw cr">총 주문 금액 : <?php echo number_format($_POST['baskettotalprice']);?> 원</li>
		</ul>
	</div>
	<?
	$row2 = $db->fetarr("select * from member where no='$_SESSION[uno]'");
	$input->value = $row2;
	?>
	<div class="w100 h30 fl"><?php img("/img/meminfo.png","2 배송정보 및 회원정보");?></div>
	<form action="<?php echo PAGE."/buy_ok";?>" method="post" onsubmit="if(confirm('이대로 주문하시겠습니까?')){return frmchk('buy_ok');}else{return false;}">
		<div class="content">
			<ul>
				<li class="w20 bg"><?php nb(3); label("수령인","name"); $input->input("hidden","pronum",$prono); $input->input("hidden","num",$basketnum); $input->input("hidden","basketno",$basketno); ?></li>
				<li class="w80"><?php nb(3); $input->input("text","name","","10");?></li>
			</ul>
			<ul>
				<li class="w20 bg"><?php nb(3); label("전화번호","home");?></li>
				<li class="w30"><?php nb(3); $input->input("text","home","","20");?></li>
				<li class="w20 bg"><?php nb(3); label("휴대폰번호","phone");?></li>
				<li class="w30"><?php nb(3); $input->input("text","phone","","20");?></li>
			</ul>
			<ul>
				<li class="w20 bg"><?php nb(3); label("거주시","address");?></li>
				<li class="w80"><?php nb(3); $input->input("text","address","","20");?> 예) 전남 여수시, 경기도 안양</li>
			</ul>
			<ul>
				<li class="w20 bg"><?php nb(3); label("상세주소","address2");?></li>
				<li class="w80"><?php nb(3); $input->input("text","address2","","60"); $input->input("hidden","token",$_SESSION['token']);?></li>
			</ul>
			<ul class="bt">
				<li><?php  $input->input("submit2","주문하기"); nb(); $input->input("button","뒤로가기","move('".PAGE."')");?></li>
			</ul>
		</div>
	</form>
<?php
}else{
	alert("잘못된 접근입니다.");
	move("/");
}
?>