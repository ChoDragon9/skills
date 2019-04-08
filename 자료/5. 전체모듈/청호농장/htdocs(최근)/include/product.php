<?php
if($type and file_exists("./include/product/{$type}.php")){
	include("./include/product/".$type.".php");
}else{
	?>
	<form action="" method="post" id="frm">
	<div><?php $input->input("hidden","page_num",$_POST['page_num']);?></div>
	</form>
	<div id="product">
	<?php
	$page = 8;
	$pageing = pageing($page,$_POST['page_num'],"select * from product where main_id='$main_id'","javascript:page");
	$i = $pageing['total'] - $pageing['start'];
	$res = $db->query("select","product","","main_id='$main_id' order by no desc limit $pageing[start],$page");
	while($row = $db->fetch($res)){
	?>
		<ul class="product">
			<li><a href="<?php echo PAGE."/view/".$row['no'];?>"><?php img("/file/thumb_".$row['wfile'],$row['name']);?></a></li>
			<li class="ft13"><a href="<?php echo PAGE."/view/".$row['no'];?>"><?php echo $row['name'];?></a></li>
			<li class="cr fw ft12"><?php echo number_format($row['price'])." 원";?>
			<li class="co fw ft12">수량 : <?php if($row['nownum'] == 0){echo '<span class="cr fw">품절</span>';}else{echo number_format($row['nownum']).$row['unit'];}?>
		</ul>
	<?php
	}
	?>
	</div>
	<?php
	if($pageing['total'] >= 1){
		?>
		<div class="w100 fl h30 tc bt1c"><?php echo $pageing['button'];?></div>
		<?php
	}else{
	?>
		<div class="w100 fl tc"><?php img("/img/productready.png","상품준비중입니다.");?></div>
	<?php
	}
}
?>