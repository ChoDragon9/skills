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
		<li class="w10">��ȣ</li>
		<li class="w15">��ǰ�̹���</li>
		<li class="w20">��ǰ��</li>
		<li class="w10">�ֹ�����</li>
		<li class="w15">�� �ݾ�</li>
		<li class="w20 fw">����</li>
		<li class="w10">�ڼ���</li>
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
					echo "<span class='c9'>�̿� ".(sizeof($pronumarr) - 3)."�� ��ǰ</span>";
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
				echo number_format($price)."��";
			?>
			</li>
			<li class="w20 tc ft14 fw"><?php echo $row['state'];?></li>
			<li class="w10 tc"><a href="<?php echo PAGE."/view/".$row['no'];?>">�ڼ���</a></li>
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
	alert("�α����� ���ּ���.");
	move("/login/login");
}
?>