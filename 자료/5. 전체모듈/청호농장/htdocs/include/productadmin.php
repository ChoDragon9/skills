<?php
if($_SESSION['ulv'] == 10){
	$db->table = "product";
	if($type){
		include("./include/productadmin/".$type.".php");
	}else{
		$page = 10;
		if($_POST['main_id'] != ""){
			$pageing = pageing($page,$_POST['page_num'],"select * from product where main_id='$_POST[main_id]'","javascript:page");
			$i = $pageing['total'] - $pageing['start'];
			$res = $db->query("select","","","main_id='$_POST[main_id]' order by no desc limit $pageing[start],$page");
			$sel[$_POST['main_id']] = "selected='selected'";
		}else{
			$pageing = pageing($page,$_POST['page_num'],"select * from product","javascript:page");
			$i = $pageing['total'] - $pageing['start'];
			$res = $db->query("select","","","1=1 order by no desc limit $pageing[start],$page");
		}
	?>
	<form action="" method="post" id="frm">
	<ul class="w100 h35 fl">
		<li class="w40 fl">
		<?php 
		$input->input("button","��ǰ����ϱ�","move('".PAGE."/add');");
		nb(3);
		$arr = array("�����ѹ�"=>"main0","�����Ѳ�"=>"main1","�ż��Ѱ��"=>"main2","�䳢"=>"main3","������"=>"main4","�ɰ���"=>"main5","��ī�þƲ�"=>"main6","����������"=>"main7");
		echo '<select name="main_id" id="main_id" style="margin-bottom:5px;" onchange="selectid(\'frm\').submit();">';
			echo '<option value="">��ü��ǰ</option>';
		foreach($arr as $key=>$val){
			echo '<option value="'.$val.'" '.$sel["$val"].'>'.$key.'</option>';
		}
		echo '</select>';
		$input->input("hidden","page_num",$_POST['page_num']);
		?>
		</li>
		<li class="w60 tr fl"><?php echo $pageing['button'];?></li>
	</ul>
	</form>
	<div class="content">
		<ul class="tc bg board">
			<li class="w10 fw">No.</li>
			<li class="w15">�޴���</li>
			<li class="w20">��ǰ�̹���</li>
			<li class="w15">��ǰ�� / ��ǰ����</li>
			<li class="w10">�԰�</li>
			<li class="w10">�������</li>
			<li class="w10">����</li>
			<li class="w10">����</li>
		</ul>
		<?php
		while($row = $db->fetch($res)){
			$row2 = $db->fetarr("select * from menu where main_id='$row[main_id]' and type='main'");
		?>
		<ul class="board">
			<li class="w10 tc"><?php echo $i;?></li>
			<li class="w15 co fw tc ft12"><?php echo $row2['title'];?></li>
			<li class="w20 tc"><a href="<?php echo PAGE."/view/".$row['no'];?>"><img src="/file/thumb_<?php echo $row['wfile'];?>" class="h90" alt="<?php echo $row['name'];?>" title="<?php echo $row['name'];?>" /></a></li>
			<li class="w15 tc"><?php echo "<span class='ft12 fw'>".$row['name']."</span><br /><br />".number_format($row['price'])." ��"?></li>
			<li class="w10 tc"><?php echo $row['size'];?></li>
			<li class="w10 tc"><?php echo $row['nownum'].$row['unit'];?></li>
			<li class="w10 tc"><a href="<?php echo PAGE."/modify/".$row['no'];?>"><?php img("/img/modifybt.png","����");?></a></li>
			<li class="w10 tc"><a href="javascript:if(confirm('�����Ͻðڽ��ϱ�?')){move('<?php echo PAGE."/add_ok/".$row['no'];?>');}"><?php img("/img/deletebt.png","����");?></a></li>
		</ul>
		<?php
			$i--;
		}
		?>
		<ul class="w100 h35 fl">
			<li class="w40 fl"><?php $input->input("button","��ǰ����ϱ�","move('".PAGE."/add');");?></li>
			<li class="w60 tr fl"><?php echo $pageing['button'];?></li>
		</ul>
	</div>
	<?php
	}
}else{
	alert("������ �����ϴ�.");
	session_destroy();
	move("/");
}
?>