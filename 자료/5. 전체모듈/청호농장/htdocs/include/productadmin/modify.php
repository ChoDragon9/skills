<?php
$row = $db->fetarr("select * from product where no='$no'");
$input->value = $row;
$sel[$row['main_id']] = "selected='selected'";
?>
<form action="<?php echo PAGE."/add_ok";?>" method="post" enctype="multipart/form-data">
<div class="content">
	<ul>
		<li class="w20 bg"><?php nb(3); label("��ǰ��","name");?></li>
		<li class="w30"><?php nb(3); $input->input("text","name","","20"); $input->input("hidden","state","modify"); $input->input("hidden","num",$row['no']);?></li>
		<li class="w20 bg"><?php nb(3); label("�޴���","main_id");?></li>
		<li class="w30">
		<?php
		nb(3);
		$arr = array("�����ѹ�"=>"main0","�����Ѳ�"=>"main1","�ż��Ѱ��"=>"main2","�䳢"=>"main3","������"=>"main4","�ɰ���"=>"main5","��ī�þƲ�"=>"main6","����������"=>"main7");
		echo '<select name="main_id" id="main_id">';
		foreach($arr as $key=>$val){
			echo '<option value="'.$val.'" '.$sel["$val"].'>'.$key.'</option>';
		}
		echo '</select>';
		?>
		</li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("��ǰ����","price");?></li>
		<li class="w30"><?php nb(3); $input->input("text","price","","10");?> ���ڸ� �Է��ϼ���.</li>
		<li class="w20 bg"><?php nb(3); label("�԰�","size");?></li>
		<li class="w30"><?php nb(3); $input->input("text","size","","10");?> ��) 100g, 100��</li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("��������","nownum");?></li>
		<li class="w30"><?php nb(3); $input->input("text","nownum","","6");?> ���ڸ� �Է��ϼ���.</li>
		<li class="w20 bg"><?php nb(3); label("����","unit");?></li>
		<li class="w30"><?php nb(3); $input->input("text","unit","","6");?> ��) �� , ����, kg</li>
	</ul>
	<ul class="con">
		<li class="w20 bg"><?php nb(3); label("��ǰ����","intro");?></li>
		<li class="w80"><?php nb(3); $input->input("textarea","intro");?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("��ǰ�̹���1","wfile");?></li>
		<li class="w80"><?php nb(3); $input->input("file","wfile","","30");?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("��ǰ�̹���2","wfile2");?></li>
		<li class="w80"><?php nb(3); $input->input("file","wfile2","","30");?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("��ǰ�̹���3","wfile3");?></li>
		<li class="w80"><?php nb(3); $input->input("file","wfile3","","30");?></li>
	</ul>
	<ul class="bt">
		<li><?php $input->input("submit","�����ϱ�"); nb(); $input->input("button","�ڷΰ���","move('".PAGE."');");?></li>
	</ul>
</div>
</form>