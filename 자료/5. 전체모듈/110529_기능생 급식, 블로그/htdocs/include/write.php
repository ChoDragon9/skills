<?$date = date("$Y-$type-$no");
if($date != date("Y-n-j")){
	alert("오늘날짜로 들어가주에요");
	move(PAGE);
}
$mem = fetch("select * from member where name='$_SESSION[name]'");
if($mem[stay] == "1"){
?><form action="<?=PAGE?>/stay/<?=$_SESSION[name]?>" method="post">
<ul class="w1">
	<li class="ft12 fw"><a href="<?=PAGE?>">&lt;&lt;목록으로</a>&nbsp;&nbsp;&nbsp;&nbsp;<?=$date?></li>
	<li class="ft14 fw" style="margin-top:8px;"><input type="hidden" name="stay" value=" " /><input type="submit" value="귀가로바꾸기" style="width:100px;height:30px;border:solid 1px #ccc;" /></li>
</ul></form>
<?
$row=fetch("select * from today where wdate='$date'");
$today_menu = fetch("select * from today_menu where name='$_SESSION[name]' && wdate = '$date'");
if($totay_menu[first] || $totay_menu[second] || $today_menu[third] || $today_menu[fourth]){
	echo '<ul class="w2 ft12 c9">';
	//if($today_menu[first]){ echo "<li class='w100'>아침밥&nbsp:&nbsp;".$today_menu[first]."</li>"; }
	if($today_menu[second]){ echo "<li class='w100'>점심밥&nbsp:&nbsp;".$today_menu[second]."</li>"; }
	if($today_menu[third]){ echo "<li class='w100'>저녁밥&nbsp:&nbsp;".$today_menu[third]."</li>"; }
	if($today_menu[fourth]){ echo "<li class='w100'>내일아침밥&nbsp:&nbsp;".$today_menu[fourth]."</li>"; }
	if($totay_menu[first] || $totay_menu[second] || $today_menu[third] || $today_menu[fourth]){
?>
	<li onclick="if(confirm('다시신청을 하시겠습니까?')){location.href='<?=PAGE?>/delete/<?=$type?>/<?=$no?>'}" class="cs w100">다시신청하기</li>
<?
	echo '</ul>';
	}
}else if($row[first] == " " && $row[second] == " " && $row[third] == " " && $row[fourth] == " "){?>
	<ul class="w2 cc ft12">
		<li>아직등록이 되지 않았습니다.</li>
	</ul>
<?}else if($row){?>
	<ul class="w2">
	<!--<?if($row[first] == "1"){?><li class="ft11">아침밥</li><?}?>-->
	<?if($row[second] == "1"){?><li class="ft11">점심밥</li><?}?>
	<?if($row[third] == "1"){?><li class="ft11">저녁밥</li><?}?>
	<?if($row[fourth] == "1"){?><li class="ft11">내일아침밥</li><?}?>
	</ul>
	<?
	if($row){echo '<form action="'.PAGE.'/write_ok/'.$type.'/'.$no.'" method="post">';}
	/*if($row[first] == "1"){
		echo '<ul class="w3" id="first1">';
		echo '<li class="w100 ft14 fw" style="color:#0099ff;">[아침밥]</li>';
		$firstres = sql("select * from menu where (main_id='센토락' || main_id='먹벙감자탕') && sub_id=''");
		while($firstrow=mysql_fetch_array($firstres)){
			echo '<li class="ft12 w100 fw c9">'.$firstrow[main_id].'</li>';
			$firstres2 = sql("select * from menu where main_id='$firstrow[main_id]' && sub_id!=''");
			while($firstrow2=mysql_fetch_array($firstres2)){
				$num = num("select no from today_menu where wdate='$date' && first='$firstrow2[sub_id]'");
				echo '<li class="ft11 w30">|&nbsp;'.$firstrow2[sub_id].'</li>';
				echo '<li class="w20 ft12"><input type="radio" name="first" value="'.$firstrow2[sub_id].'" title="'.$firstrow2[sub_id].'" /><span class="cc">&nbsp;총['.$num.']명신청</span></li>';
			}
		}
		echo '</ul>';
	}*/
	if($row[second] == "1"){
		echo '<ul class="w3" id="second1">';
		echo '<li class="w100 ft14 fw" style="color:#ff6600;">[점심밥]</li>';
		$secondres = sql("select * from menu where sub_id=''");
		while($secondrow=mysql_fetch_array($secondres)){
			echo '<li class="ft12 w100 fw c9">'.$secondrow[main_id].'</li>';
			$secondres2 = sql("select * from menu where main_id='$secondrow[main_id]' && sub_id!=''");
			while($secondrow2=mysql_fetch_array($secondres2)){
				$num1 = num("select no from today_menu where wdate='$date' && second='$secondrow2[sub_id]'");
				echo '<li class="ft11 w30">|&nbsp;'.$secondrow2[sub_id].'</li>';
				echo '<li class="w20 ft12"><input type="radio" name="second" value="'.$secondrow2[sub_id].'" title="'.$secondrow2[sub_id].'" /><span class="c6">&nbsp;총['.$num1.']명신청</span></li>';
			}
		}
		echo '</ul>';
	}
	if($row[third] == "1"){
		echo '<ul class="w3" id="third1">';
		echo '<li class="w100 ft14 fw" style="color:#0000cc;">[저녁밥]</li>';
		$thirdres = sql("select * from menu where sub_id=''");
		while($thirdrow=mysql_fetch_array($thirdres)){
			echo '<li class="ft12 w100 fw c9">'.$thirdrow[main_id].'</li>';
			$thirdres2 = sql("select * from menu where main_id='$thirdrow[main_id]' && sub_id!=''");
			while($thirdrow2=mysql_fetch_array($thirdres2)){
				$num2= num("select no from today_menu where wdate='$date' && third='$thirdrow2[sub_id]'");
				echo '<li class="ft11 w30">|&nbsp;'.$thirdrow2[sub_id].'</li>';
				echo '<li class="w20 ft12"><input type="radio" name="third" value="'.$thirdrow2[sub_id].'" title="'.$thirdrow2[sub_id].'" /><span class="c6">&nbsp;총['.$num2.']명신청</span></li>';
			}
		}
		echo '</ul>';
	}
	if($row[fourth] == "1"){
		echo '<ul class="w3" id="fourth1">';
		echo '<li class="w100 ft14 fw" style="color:#0099ff;">[내일아침밥]</li>';
		$fourthres = sql("select * from menu where (main_id='센토락' || main_id='먹벙감자탕') && sub_id=''");
		while($fourthrow=mysql_fetch_array($fourthres)){
			echo '<li class="ft12 w100 fw c9">'.$fourthrow[main_id].'</li>';
			$fourthres2 = sql("select * from menu where main_id='$fourthrow[main_id]' && sub_id!=''");
			while($fourthrow2=mysql_fetch_array($fourthres2)){
				$num3= num("select no from today_menu where wdate='$date' && fourth='$fourthrow2[sub_id]'");
				echo '<li class="ft11 w30">|&nbsp;'.$fourthrow2[sub_id].'</li>';
				echo '<li class="w20 ft12"><input type="radio" name="fourth" value="'.$fourthrow2[sub_id].'" title="'.$fourthrow2[sub_id].'" /><span class="c6">&nbsp;총['.$num3.']명신청</span></li>';
			}
		}
		echo '</ul>';
	}
	if($row){
		echo '<ul class="w4"><li><input type="submit" value="신청하기" style="cursor:pointer;width:70px;height:30px;border:solid 1px #ccc;" /></li></ul>';
		echo '</form>'; 
	}
}
}else{
	?><form action="<?=PAGE?>/stay/<?=$_SESSION[name]?>" method="post">
<ul class="w1">
	<li class="ft12 fw"><a href="<?=PAGE?>">&lt;&lt;목록으로</a>&nbsp;&nbsp;&nbsp;&nbsp;<?=$date?></li>
	<li class="ft14 fw"><input type="hidden" name="stay" value="1" /><input type="submit" value="기숙사로바꾸기" style="width:100px;height:45px;border:solid 1px #ccc;" /></li>
</ul></form>
	<?
}
?>