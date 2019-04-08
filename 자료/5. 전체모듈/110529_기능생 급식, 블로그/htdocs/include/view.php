<?$date = date("$Y-$type-$no");
$row=fetch("select * from today where wdate='$date'");?>
<ul class="w1">
	<li class="ft12 fw"><a href="<?=PAGE?>">[목록으로]</a>&nbsp;&nbsp;&nbsp;&nbsp;<?=$date?></li>
	<li class="ft30 w100">총인원수<?=num("select * from member where stay='1'");?>명입니다.</li>
</ul>
	<?
	if($row){
		/*if($row[first] == "1"){
			echo "<li><form action='".PAGE."/modify/".$type."/".$no."' method='post'><input type='hidden' value=' ' name='first' /><input type='submit' value='아침밥취소' style='background:#fff;cursor:pointer;color:#999;font-size:12px;' /></form></li>";
		}else{
			echo "<li><form action='".PAGE."/modify/".$type."/".$no."' method='post'><input type='hidden' value='1' name='first' /><input type='submit' value='아침밥추가' style='background:#fff;cursor:pointer;color:#999;font-size:12px;' /></form></li>";
		}*/
		if($row[second] == "1"){
			?>
			<form action="http://semicon.jinzza.net/page/index.php/list/modify/<?=$type?>/<?=$no?>" method="post">
			<ul class="w2"><li><input type="hidden" value=" " name="second" /><input type="submit" value="점심밥취소" style="background:#fff;cursor:pointer;color:#999;font-size:12px;" /></li></ul>
			</form>
			<?
		}else{
			?>
			<form action="http://semicon.jinzza.net/page/index.php/list/modify/<?=$type?>/<?=$no?>" method="post">
			<ul class="w2"><li><input type='hidden' value='1' name='second' /><input type='submit' value='점심밥추가' style='background:#fff;cursor:pointer;color:#999;font-size:12px;' /></li></ul>
			</form>
			<?
		}
		if($row[third] == "1"){
			?>
			<form action="<?=PAGE?>/modify/<?=$type?>/<?=$no?>" method="post">
			<ul class="w2"><li><input type='hidden' value=' ' name='third' /><input type='submit' value='저녁밥취소' style='background:#fff;cursor:pointer;color:#999;font-size:12px;' /></li></ul>
			</form>
			<?
		}else{
			?>
			<form action="<?=PAGE?>/modify/<?=$type?>/<?=$no?>" method="post">
			<ul class="w2"><li><input type='hidden' value='1' name='third' /><input type='submit' value='저녁밥추가' style='background:#fff;cursor:pointer;color:#999;font-size:12px;' /></li></ul>
			</form>
			<?
		}
		if($row[fourth] == "1"){
			?>
			<form action="<?=PAGE?>/modify/<?=$type?>/<?=$no?>" method="post">
			<ul class="w2"><li><input type='hidden' value=' ' name='fourth' /><input type='submit' value='내일아침밥취소' style='background:#fff;cursor:pointer;color:#999;font-size:12px;' /></li></ul>
			</form>
			<?
		}else{
			?>
			<form action="<?=PAGE?>/modify/<?=$type?>/<?=$no?>" method="post">
			<ul class="w2"><li><input type='hidden' value='1' name='fourth' /><input type='submit' value='내일아침밥추가' style='background:#fff;cursor:pointer;color:#999;font-size:12px;' /></li></ul>
			</form>
			<?
		}
	}else{
		echo "<form action='".PAGE."/add/".$type."/".$no."' method='post'><ul class='w2'>";
		//echo "<li>아침밥&nbsp;<input type='checkbox' name='first' value='1' /></li>";
		echo "<li>점심밥&nbsp;<input type='checkbox' name='second' value='1' /></li>";
		echo "<li>저녁밥&nbsp;<input type='checkbox' name='third' value='1' /></li>";
		echo "<li>내일아침밥&nbsp;<input type='checkbox' name='fourth' value='1' /></li>";
		echo "<li style='height:18px;width:27px;'><input type='submit' value='추가' style='background:#fff;cursor:pointer;height:12px;width:27px;' /></li>";
		echo "</ul></form>";
	}/*
if($row[first] == "1"){
		echo '<ul class="w3">';
		echo '<li class="w100 ft14 fw" style="color:#0099ff;">[아침밥]</li>';
		$firstres = sql("select * from menu where (main_id='센토락' || main_id='먹벙감자탕') && sub_id=''");
		while($firstrow=mysql_fetch_array($firstres)){
			echo '<li class="ft12 w100 fw">'.$firstrow[main_id].'</li>';
			$firstres2 = sql("select * from menu where main_id='$firstrow[main_id]' && sub_id!=''");
			while($firstrow2=mysql_fetch_array($firstres2)){
				$num = num("select no from today_menu where wdate='$date' && first='$firstrow2[sub_id]'");
				echo '<li class="ft11 w30">&nbsp;'.$firstrow2[sub_id].'</li>';
				echo '<li class="ft12 w20">&nbsp;총['.$num.']명신청</li>';
			}
		}
		echo '</ul>';
	}*/
if($row[second] == "1"){
	echo '<ul class="w3">';
	echo '<li class="w100 ft14 fw" style="color:#ff6600;">[점심밥]</li>';
	$secondres = sql("select * from menu where sub_id=''");
	while($secondrow=mysql_fetch_array($secondres)){
		echo '<li class="ft12 w100 fw">'.$secondrow[main_id].'</li>';
		$secondres2 = sql("select * from menu where main_id='$secondrow[main_id]' && sub_id!=''");
		while($secondrow2=mysql_fetch_array($secondres2)){
			$num1 = num("select no from today_menu where wdate='$date' && second='$secondrow2[sub_id]'");
			echo '<li class="ft12 w100">&nbsp;['.$secondrow2[sub_id].']</li>';
			echo '<li class="ft12 w100 c9">';
			$secondres3=sql("select * from today_menu where wdate='$date' && second='$secondrow2[sub_id]'");
			while($secondrow3 = mysql_fetch_array($secondres3)){
				echo "&nbsp;".$secondrow3[name]."&nbsp;";
			}
			echo '</li>';
		}
	}
	echo '</ul>';
}
if($row[third] == "1"){
	echo '<ul class="w3">';
	echo '<li class="w100 ft14 fw" style="color:#0000cc;">[저녁밥]</li>';
	$thirdres = sql("select * from menu where sub_id=''");
	while($thirdrow=mysql_fetch_array($thirdres)){
		echo '<li class="ft12 w100 fw">'.$thirdrow[main_id].'</li>';
		$thirdres2 = sql("select * from menu where main_id='$thirdrow[main_id]' && sub_id!=''");
		while($thirdrow2=mysql_fetch_array($thirdres2)){
			$num2 = num("select no from today_menu where wdate='$date' && third='$thirdrow2[sub_id]'");
			echo '<li class="ft11 w100">&nbsp;['.$thirdrow2[sub_id].']</li>';
			echo '<li class="ft12 w100 c9">';
			$thirdres3=sql("select * from today_menu where wdate='$date' && third='$thirdrow2[sub_id]'");
			while($thirdrow3 = mysql_fetch_array($thirdres3)){
				echo "&nbsp;".$thirdrow3[name]."&nbsp;";
			}
			echo '</li>';
		}
	}
	echo '</ul>';
}
if($row[fourth] == "1"){
	echo '<ul class="w3">';
	echo '<li class="w100 ft14 fw" style="color:#0099ff;">[내일아침밥]</li>';
	$fourthres = sql("select * from menu where (main_id='센토락' || main_id='먹벙감자탕') && sub_id=''");
	while($fourthrow=mysql_fetch_array($fourthres)){
		echo '<li class="ft12 w100 fw c6">'.$fourthrow[main_id].'</li>';
		$fourthres2 = sql("select * from menu where main_id='$fourthrow[main_id]' && sub_id!=''");
		while($fourthrow2=mysql_fetch_array($fourthres2)){
			$num3 = num("select no from today_menu where wdate='$date' && fourth='$fourthrow2[sub_id]'");
			echo '<li class="ft11 w100">&nbsp;['.$fourthrow2[sub_id].']</li>';
			echo '<li class="ft12 w100 c9">';
			$fourthres3=sql("select * from today_menu where wdate='$date' && fourth='$fourthrow2[sub_id]'");
			while($fourthrow3 = mysql_fetch_array($fourthres3)){
				echo "&nbsp;".$fourthrow3[name]."&nbsp;";
			}
			echo '</li>';
		}
	}
	echo '</ul>';
}
?>