<?php
if($type){
	if( ($type != "view") and ($_SESSION['ulv'] != 10) and $sub_id == "sub0"){
		alert("권한이 없습니다.");
		move(PAGE);
	}else{
		include("./include/board/".$type.".php");
	}
}else{
	login();
?>
<form action="" method="post" id="frm">
<div><?php $input->input("hidden","page_num",$_POST['page_num']);?></div>
</form>
<div class="content">
	<ul class="tc bg board">
		<li class="w10">번호</li>
		<li class="w60">제목</li>
		<li class="w15">작성자</li>
		<li class="w15">작성일</li>
	</ul>
	<?php
	$page = 10;
	$pageing = pageing($page,$_POST['page_num'],"select * from board where main_id='$main_id' and sub_id='$sub_id'","javascript:page");
	$i = $pageing['total'] - $pageing['start'];
	$res = $db->query("select","board","","main_id='$main_id' and sub_id='$sub_id' order by no desc limit $pageing[start],$page");
	while($row = $db->fetch($res)){
		$row2 = $db->fetarr("select * from member where no='$row[name]'");
	?>
	<ul class="board">
		<li class="tc w10"><?php echo $i;?></li>
		<li class="w60"><a href="<?php echo PAGE."/view/".$row['no'];?>"><?php echo strcut($row['subject'],0,70);?></a></li>
		<li class="w15 tc"><?php echo $row2['name'];?></li>
		<li class="w15 tc"><?php echo wdate2($row['wdate']);?></li>
	</ul>
	<?php
		$i--;
	}
	?>
	<ul>
		<li class="w60">
		<?php
		if( ($_SESSION['ulv'] == 10 and $sub_id == "sub0") || ( $_SESSION['ulv'] and $sub_id == "sub1")){ 
			$input->input("button","글쓰기","move('".PAGE."/add');");
		}else if(!$_SESSION['ulv'] and $sub_id == 'sub1'){
			$input->input("button","글쓰기","alert('로그인을 해주세요.'); login_move();");
		}
		?>
		</li>
		<li class="w40 tr ft12"><?php if($pageing['total'] >= 1){ echo $pageing['button'];}?></li>
	</ul>
</div>
<?php
}
?>