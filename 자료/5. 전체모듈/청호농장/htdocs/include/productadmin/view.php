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
<div class="w100 fl h30"><a href="<?php echo PAGE;?>"><?php img("/img/backbt.png","�ڷΰ���");?></a> <a href="<?php echo PAGE."/modify/".$row['no'];?>"><?php img("/img/modifybt.png","����");?></a> <a href="javascript:if(confirm('�����Ͻðڽ��ϱ�?')){move('<?php echo PAGE."/add_ok/".$row['no'];?>');}"><?php img("/img/deletebt.png","����");?></a></div>
<form action="<?php echo PAGE."/buy";?>" method="post" onsubmit="">
<div id="product2">
	<div id="pro_left">
		<div id="pro_top_img">
			<img src="/file/thumb_<?php echo $row['wfile'];?>" alt="<?php echo $row['name'];?>" title="<?php echo $row['name'];?>" style="margin-top:<?php echo imgcenter(147,"./file/thumb_".$row['wfile']);?>px" />
		</div>
		<ul id="pro_bottom_img">
			<?php
			$arr = array("","ù��° �̹���","�ι�° �̹���","����° �̹���");
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
			<li>��� ������ �����</li>
			<li class="co fw"><?php echo number_format($row['price']);?> ��</li>
			<li><?php echo number_format($row['nownum']).$row['unit'];?></li>
			<li><?php $input->input("text","num","1");?></li>
		</ul>
		<div id="pro_bn"><?php img("/img/pro_bn.png","Ŭ���Ͻø� Ȯ���ؼ� �� �� �ֽ��ϴ�.");?></div>
		<ul id="pro_right_bottom">
			<li><?php img("/img/pro_submit.png","�����ϱ�");?></li>
			<li><?php img("/img/pro_button.png","��ٱ���");?></li>
		</ul>
	</div>
</div>
</form>
<div id="product_intro">
<?php
echo nl2br($row['intro']);
?>
</div>