<?php
$row = $db->fetarr("select * from product where no='$no'");
$input->value = $row;
$sel[$row['main_id']] = "selected='selected'";
?>
<form action="<?php echo PAGE."/add_ok";?>" method="post" enctype="multipart/form-data">
<div class="content">
	<ul>
		<li class="w20 bg"><?php nb(3); label("상품명","name");?></li>
		<li class="w30"><?php nb(3); $input->input("text","name","","20"); $input->input("hidden","state","modify"); $input->input("hidden","num",$row['no']);?></li>
		<li class="w20 bg"><?php nb(3); label("메뉴명","main_id");?></li>
		<li class="w30">
		<?php
		nb(3);
		$arr = array("달콤한밤"=>"main0","달콤한꿀"=>"main1","신선한계란"=>"main2","토끼"=>"main3","꼬꼬닭"=>"main4","꽃가루"=>"main5","아카시아꿀"=>"main6","프로폴리스"=>"main7");
		echo '<select name="main_id" id="main_id">';
		foreach($arr as $key=>$val){
			echo '<option value="'.$val.'" '.$sel["$val"].'>'.$key.'</option>';
		}
		echo '</select>';
		?>
		</li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("상품가격","price");?></li>
		<li class="w30"><?php nb(3); $input->input("text","price","","10");?> 숫자만 입력하세요.</li>
		<li class="w20 bg"><?php nb(3); label("규격","size");?></li>
		<li class="w30"><?php nb(3); $input->input("text","size","","10");?> 예) 100g, 100개</li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("현제수량","nownum");?></li>
		<li class="w30"><?php nb(3); $input->input("text","nownum","","6");?> 숫자만 입력하세요.</li>
		<li class="w20 bg"><?php nb(3); label("단위","unit");?></li>
		<li class="w30"><?php nb(3); $input->input("text","unit","","6");?> 예) 개 , 마리, kg</li>
	</ul>
	<ul class="con">
		<li class="w20 bg"><?php nb(3); label("상품설명","intro");?></li>
		<li class="w80"><?php nb(3); $input->input("textarea","intro");?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("상품이미지1","wfile");?></li>
		<li class="w80"><?php nb(3); $input->input("file","wfile","","30");?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("상품이미지2","wfile2");?></li>
		<li class="w80"><?php nb(3); $input->input("file","wfile2","","30");?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php nb(3); label("상품이미지3","wfile3");?></li>
		<li class="w80"><?php nb(3); $input->input("file","wfile3","","30");?></li>
	</ul>
	<ul class="bt">
		<li><?php $input->input("submit","수정하기"); nb(); $input->input("button","뒤로가기","move('".PAGE."');");?></li>
	</ul>
</div>
</form>