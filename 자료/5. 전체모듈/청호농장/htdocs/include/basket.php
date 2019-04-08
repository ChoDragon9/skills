<?php
if($_SESSION['ulv']){
	if($type){
		include("./include/basket/".$type.".php");
	}else{
		$res = $db->sql("select b.no,p.name,p.wfile,p.size,p.main_id,b.number,p.price,p.nownum,p.unit from basket as b, member as m, product as p where b.memnum=m.no and b.pronum=p.no and b.memnum='$_SESSION[uno]'");
		$total = mysql_num_rows($res);
		$totalnum = $total;
		$token = uniqid(time());
		$_SESSION['token'] = $token;
	?>
	<form action="<?php echo PAGE."/buy";?>" method="post" id="basket">
	<div><?php $input->input("hidden","baskettotalprice"); $input->input("hidden","basketno"); $input->input("hidden","prono"); $input->input("hidden","basketnum"); $input->input("hidden","token",$_SESSION['token']);?></div>
	</form>
	<div class="content">
		<ul class="tc bg board">
			<li class="w10"><input type="checkbox" id="totalchk" onclick="bastotalchk(<?php echo $totalnum;?>)" /></li>
			<li class="w20">상품이미지</li>
			<li class="w20">상품명</li>
			<li class="w10">규격</li>
			<li class="w10">가격</li>
			<li class="w10">현재수량</li>
			<li class="w10 fw">주문수량</li>
			<li class="w10">삭제</li>
		</ul>
		<?php
		while($row = $db->fetch($res)){
			$row2 = $db->fetarr("select no from product where name='$row[name]' and price='$row[price]' and unit='$row[unit]' and nownum='$row[nownum]' and main_id='$row[main_id]'");
		?>
		<ul class="board">
			<li class="tc w10"><input type="checkbox" name="chk<?php echo $total;?>" id="chk<?php echo $total?>" value="<?php echo $total;?>" onclick="bastotal(<?php echo $totalnum;?>);" /></li>
			<li class="w20"><a href="<?php echo "/".$row['main_id']."/sub3/view/".$row['no'];?>"><img src="/file/thumb_<?php echo $row['wfile'];?>" alt="<?php echo $row['name'];?>" class="w80" /></a></li>
			<li class="w20 ft13 fw"><?php echo $row['name'];?><br /><br /><a href="<?php echo "/".$row['main_id']."/sub3/";?>" class="ft12 fw tu cr lc" >추가하기</a></li>
			<li class="tc w10"><?php echo $row['size'];?></li>
			<li class="tc w10 co ft12 fw"><?php echo $row['price']." 원";?><?php $input->input("hidden","price".$total,$row['price']);?></li>
			<li class="tc w10"><?php echo $row['nownum'].$row['unit'];?><?php $input->input("hidden","max".$total,$row['number']+$row['nownum']);?></li>
			<li class="tc w10"><?php echo $row['number'].$row['unit'];?><?php $input->input("hidden","num".$total,$row['number']); $input->input("hidden","no".$total,$row2['no']); $input->input("hidden","basketno".$total,$row['no']); ?></li>
			<li class="tc w10"><a href="<?php echo PAGE."/delete/".$row['no'];?>"><?php img("/img/deletebt.png","삭제"); ?></a></li>
		</ul>
		<?php
			$total--;
		}
		?>
		<ul>
			<li class="w50 fl"><?php $input->input("button2","주문하기","bassubmit(".$totalnum.");"); ?></li>
			<li class="w50 fl tr ft18 mg fw cr" id="totalprice">총 주문 금액 : 0 원</li>
		</ul>
	</div>
<?php
	}
}else{
	alert("로그인을 해주세요.");
	move("/login/login");
}
?>