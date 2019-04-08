<?php
if($type){
	include("./include/search/".$type.".php");
}else{
	$schText = trim($_POST['schText']);
	?>
	<form action="" method="post" onsubmit="return frmchk('search');" id="frm">
	<div id="search">
		<div class="title"><?php img("/img/search_txt.png","검색어를 입력해주세요."); $input->input("hidden","page_num",$_POST['page_num']);?></div>
		<div class="input"><?php $input->input("text","schText",$schText);?></div>
		<div class="submit"><?php $input->input("submit","검색");?></div>
	</div>
	</form>
	<?php
	if($schText){
		?>
		<div class="content">
			<ul class="tc board bg">
				<li class="w10">번호</li>
				<li class="w60">상품명</li>
				<li class="w10">규격</li>
				<li class="w10">가격</li>
				<li class="w10">자세히</li>
			</ul>
		<?
		$page = 15;
		$sql = "select * from product where name like binary('%$schText%') or size like binary('%$schText%') or intro like binary('%$schText%') or price like binary('%$schText%')";
		$pageing = pageing($page,$_POST['page_num'],$sql,"javascript:page");
		$i = $pageing['total'] - $pageing['start'];
		$res = $db->sql($sql." order by no desc limit $pageing[start],$page");
		while($row = $db->fetch($res)){
		?>
			<ul class="board">
				<li class="w10 tc"><?php echo $i;?></li>
				<li class="w60">
					<ul class="w100 fl">
						<li class="w30 fl"><img src="/file/thumb_<?php echo $row['wfile'];?>" alt="<?php echo $row['name'];?>" title="<?php echo $row['name'];?>" style="width:90px;" /></li>
						<li class="w70 fl"><?php echo hlt($row['name'],$schText);?><br /><br /><?php echo hlt(strcut($row['intro'],strpos($row['intro'],$schText),100),$schText);?></li>
					</ul>
				</li>
				<li class="w10 tc"><?php echo hlt($row['size'],$schText);?></li>
				<li class="w10 tc fw ft12 cr"><?php echo hlt(number_format($row['price']),$schText)."원";?></li>
				<li class="w10 tc"><a href="<?php echo "/".$row['main_id']."/sub3/view/".$row['no'];?>">자세히</a></li>
			</ul>
		<?php
			$i--;
		}
		?>
		<ul class="bt tc">
			<li><?php echo $pageing['button'];?></li>
		</ul>
		</div>
		<?php
	}
}
?>