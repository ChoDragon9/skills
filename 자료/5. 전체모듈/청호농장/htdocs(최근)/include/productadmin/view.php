<script type="text/javascript">
function prochg(src,mt){
	$("#pro_top_img > img").animate({opacity:0},500,function(){
		$("#pro_top_img > img").attr("src","/file/thumb_"+src);
		$("#pro_top_img > img").attr("style","margin-top:"+mt+"px;");
	});
}
</script>
<?php
$row = $db->fetarr("select * from product where no='$no'");
?>
<div class="w100 fl h30"><a href="<?php echo PAGE;?>"><?php img("/img/backbt.png","뒤로가기");?></a> <a href="<?php echo PAGE."/modify/".$row['no'];?>"><?php img("/img/modifybt.png","수정");?></a> <a href="javascript:if(confirm('삭제하시겠습니까?')){move('<?php echo PAGE."/add_ok/".$row['no'];?>');}"><?php img("/img/deletebt.png","삭제");?></a></div>
<form action="<?php echo PAGE."/buy";?>" method="post" onsubmit="">
<div id="product2">
	<div id="pro_left">
		<div id="pro_top_img">
			<img src="/file/thumb_<?php echo $row['wfile'];?>" alt="<?php echo $row['name'];?>" title="<?php echo $row['name'];?>" style="margin-top:<?php echo imgcenter(147,"./file/thumb_".$row['wfile']);?>px" />
		</div>
		<ul id="pro_bottom_img">
			<?php
			$arr = array("","첫번째 이미지","두번째 이미지","세번째 이미지");
			for($i = 1; $i <= 3; $i++){
				echo '<li>';
				if($row["wfile$i"] and $i != 1){
					echo '<img src="/file/thumb_'.$row["wfile$i"].'" alt="'.$arr["$i"].'" title="'.$arr["$i"].'" onclick="prochg(\''.$row["wfile$i"].'\',\''.imgcenter(147,'./file/thumb_'.$row["wfile$i"]).'\');" />';
				}else if($row['wfile'] and $i == 1){
					echo '<img src="/file/thumb_'.$row["wfile"].'" alt="'.$arr["$i"].'" title="'.$arr["$i"].'" onclick="prochg(\''.$row["wfile"].'\',\''.imgcenter(147,'./file/thumb_'.$row["wfile"]).'\');" />';
				}
				echo '</li>';
			}
			?>
		</ul>
	</div>
	<div id="pro_right">
		<div class="title"><?php echo $row['name'];?></div>
		<ul class="title">
			<li><?php echo $row['size'];?></li>
			<li>충북 음성군 감곡면</li>
			<li class="co fw"><?php echo number_format($row['price']);?> 원</li>
			<li><?php echo number_format($row['nownum']).$row['unit'];?></li>
			<li><?php $input->input("text","num","1");?></li>
		</ul>
		<div id="pro_bn"><?php img("/img/pro_bn.png","클릭하시면 확대해서 볼 수 있습니다.");?></div>
		<ul id="pro_right_bottom">
			<li><?php img("/img/pro_submit.png","구매하기");?></li>
			<li><?php img("/img/pro_button.png","장바구니");?></li>
		</ul>
	</div>
</div>
</form>
<div id="product_intro">
<?php
echo nl2br($row['intro']);
?>
</div>