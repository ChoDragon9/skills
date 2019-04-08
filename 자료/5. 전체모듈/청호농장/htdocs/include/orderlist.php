<?php
if($_SESSION['uno']){
	$db->table = "buy";
	if($type){
		include("./include/orderlist/".$type.".php");
	}else{
?>
<form action="" method="post" id="frm">
	<div><?php $input->input("hidden","page_num",$_POST['page_num']);?></div>
</form>
<div class="content">
	<ul class="tc bg board">
		<li class="w10">번호</li>
		<li class="w15">상품이미지</li>
		<li class="w20">상품명</li>
		<li class="w10">주문수량</li>
		<li class="w15">총 금액</li>
		<li class="w20 fw">상태</li>
		<li class="w10">자세히</li>
	</ul>
	<?php
	$page = 10;
	$sql = "select * from buy where memnum='$_SESSION[uno]'";
	$pageing = pageing($page,$_POST['page_num'],$sql,"javascript:page");
	$j = $pageing['total'] - $pageing['start'];
	$res = $db->sql($sql." order by no desc limit $pageing[start],$page");
	while($row = $db->fetch($res)){
		$pronumarr = explode(",",$row['pronum']);
		$row2 = $db->fetarr("select * from product where no='$pronumarr[0]'");
		?>
		<ul>
			<li class="w10 tc"><?php echo $j;?></li>
			<li class="w15"><a href="<?php echo PAGE."/view/".$row['no'];?>"><img src="/file/thumb_<?php echo $row2['wfile'];?>" alt="<?php echo $row2['wfile'];?>" title="<?php echo $row2['wfile'];?>" class="w80" /></a></li>
			<li class="w20">
			<?php
				foreach($pronumarr as $key => $val){
					$row3 = $db->fetarr("select * from product where no='$val'");
					if($key > 0 ) echo "<br />";
					if($key < 4) echo $row3['name']." (".$row3['size'].")";
				}
				if(sizeof($pronumarr) > 3){
					nb(3);
					echo "<span class='c9'>이외 ".(sizeof($pronumarr) - 3)."개 상품</span>";
				}
			?>
			</li>
			<li class="w10 tc">
			<?php
				$numarr = explode(",",$row['num']);
				for($i = 0,$l = 1; $i < sizeof($numarr) and $l <= 3; $i++,$l++){
					$row3 = $db->fetarr("select * from product where no='$pronumarr[$i]'");
					echo $numarr["$i"].$row3['unit']."<br />";
				}
			?>
			</li>
			<li class="w15 tc fw cr ft12">
			<?php 
				$price = "";
				$numarr = explode(",",$row['num']);
				for($i = 0; $i < sizeof($numarr); $i++){
					$row3 = $db->fetarr("select * from product where no='$pronumarr[$i]'");
					$price += $row3['price'] * $numarr["$i"];
				}
				echo number_format($price)."원";
			?>
			</li>
			<li class="w20 tc ft14 fw"><?php echo $row['state'];?></li>
			<li class="w10 tc"><a href="<?php echo PAGE."/view/".$row['no'];?>">자세히</a></li>
		</ul>
		<?php
		$j--;
	}
	?>
	<ul class="bt">
		<li class="tc"><?php echo $pageing['button'];?></li>
	</ul>
</div>
<?php
	}
}else{
	alert("로그인을 해주세요.");
	move("/login/login");
}
?>