<?php
if(!ctype_digit($no)){
	alert("�߸��� �����Դϴ�.");
	move("/");
	exit;
}
?>
<script type="text/javascript">
function prochg(src,mt){
	$("#pro_top_img > img").animate({opacity:0},500,function(){
		$("#pro_top_img > img").attr("src","/file/thumb_"+src);
		$("#pro_top_img > img").attr("style","margin-top:"+mt+"px;");
	});
}
</script>
<div class="w100 fl h30"><a href="<?php echo PAGE;?>"><?php img("/img/backbt.png","�ڷΰ���");?></a></div>
<?php
login();
$token = uniqid(time());
$_SESSION['token'] = $token;
$row = $db->fetarr("select * from product where no='$no'");
if($_SESSION['uno']){
	?>
	<form action="<?php echo PAGE."/basket";?>" method="post" id="basket">
	<div><?php $input->input("hidden","number",""); $input->input("hidden","baskettoken",$token); $input->input("hidden","pronum",$row['no']);?></div>
	</form>
	<form action="<?php echo PAGE."/buy";?>" method="post" onsubmit="if(confirm('�̴�� �����Ͻðڽ��ϱ�?')){return frmchk('buy');}else{return false;}">
	<?php
}else{
	?>
	<form action="" method="post" onsubmit="return false;">
	<?php
}
?>
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
			<li><?php echo number_format($row['nownum']).$row['unit']; $input->input("hidden","nownum",$row['nownum']);?></li>
			<li>
			<?php
			if($row['nownum'] == 0){
				echo '<span class="cr fw">ǰ��</span>';
			}else{
				$input->input("text","num","1");
				$input->input("hidden","pronum",$row['no']);
				$input->input("hidden","token",$_SESSION['token']);
			}
			?>
			</li>
		</ul>
		<div id="pro_bn"><?php img("/img/pro_bn.png","Ŭ���Ͻø� Ȯ���ؼ� �� �� �ֽ��ϴ�.");?></div>
		<ul id="pro_right_bottom">
			<li>
			<?php 
			if($_SESSION['uno']){
				if($row['nownum'] == 0){
				echo '<img src="/img/pro_submit" alt="�����ϱ�" title="�����ϱ�" class="cp" onclick="alert(\'������ �����ϴ�.\');" />';
				}else{
					$input->input("submit","");
				}
			}else{
				echo '<img src="/img/pro_submit" alt="�����ϱ�" title="�����ϱ�" class="cp" onclick="alert(\'�α����� ���ּ���.\'); login_move();" />';
			}
			?>
			</li>
			<li>
			<?php
			if($_SESSION['uno']){
				if($row['nownum'] == 0){
					echo '<img src="/img/pro_button" alt="�����ϱ�" title="�����ϱ�" class="cp" onclick="alert(\'������ �����ϴ�.\');" />';
				}else{
					$input->input("button","","if(confirm('��ٱ��Ͽ� �����ðڽ��ϱ�?')){return basketsubmit();}");
				}
			}else{
					echo '<img src="/img/pro_button" alt="�����ϱ�" title="�����ϱ�" class="cp" onclick="alert(\'�α����� ���ּ���.\'); login_move();" />';
			}
			?>
			</li>
		</ul>
	</div>
</div>
</form>
<div id="product_intro">
<?php
echo nl2br($row['intro']);
?>
</div>