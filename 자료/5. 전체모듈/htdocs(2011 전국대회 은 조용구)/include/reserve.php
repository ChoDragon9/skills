<?
if($day2){
	if($_SESSION[name]){
		include("../include/reserve/".$day2.".php");
	}else{
		alert("로그인을 해주세요.");
		move($index."/login/login");
	}
}else{
	if(!$type){$y = date("Y");}else{$y = $type;}
	if(!$no){$n = date("n");}else{$n = $no;}
	if($y < 2000){
		alert("최소 2000년 최대 2020년까지 보실수 있습니다.");
		$y = 2000;
	}
	if($y > 2020){
		alert("최소 2000년 최대 2020년까지 보실수 있습니다.");
		$y = 2020;
	}
	if($n < 2){
		$prevmonth = ($y-1)."/12";
	}else{
		$prevmonth = $y."/".($n - 1);
	}
	if(!$prevyear) $prevyear = $y - 1;
	if(!$nextyear) $nextyear = $y + 1;
	if($n > 11){
		$nextmonth = ($y+1)."/1";
	}else{
		$month = $n + 1;
		$nextmonth = $y."/".$month;
	}
	?>
	<ul class="w100">
		<li class="w100 fl ac"><a href="<?=PAGE?>/<?=$prevyear?>/<?=$n?>">이전년도</a>&nbsp;&nbsp;&nbsp;<a href="<?=PAGE?>/<?=$prevmonth?>">이전달</a>&nbsp;&nbsp;&nbsp;<span class="fw fm ft14"><?=date("Y년 m월",strtotime(date("$y-$n")."-1"));?></span>&nbsp;&nbsp;&nbsp;<a href="<?=PAGE?>/<?=$nextmonth?>">다음달</a>&nbsp;&nbsp;&nbsp;<a href="<?=PAGE?>/<?=$nextyear?>/<?=$n?>">다음년도</a></li>
	</ul>
	<ul class="w100">
		<li class="w100 fl">총 예약 신청자 : <?=num("select * from experlist");?>명</li>
	</ul>
	<ul class="w100 cal ac fw fm">
		<li class="cr">일</li>
		<li class="c6">월</li>
		<li class="c6">화</li>
		<li class="c6">수</li>
		<li class="c6">목</li>
		<li class="c6">금</li>
		<li class="cb">토</li>
	</ul>
	<?
	$total_day = date("t",strtotime(date("$y-$n")."-1"));
	$last_day = date("w",strtotime(date("$y-$n")."-$total_day"));
	$start_day = date("w",strtotime(date("$y-$n")."-1"));
	$total_week = ceil(($total_day+$start_day)/7);
	$i = 1;
	for($week = 1; $week <= $total_week; $week++){
		echo "<ul class='cal ac'>";
		for($date =0 ; $date < 7; $date++){
			echo "<li>";
			if(!(($week == 1 and $date < $start_day) or ($week == $total_week and $date > $last_day))){
				echo $i."<br />";
				if($_SESSION[lv] == 10){
					$res2 = sql("select * from experlist where wyear = '$y' and wmonth ='$n' and wday = '$i' order by no desc");
					while($row2=mysql_fetch_array($res2)){
						if($row2[state] == "대기"){
							echo $row2[name]."님<br />";
							echo input("button","승인하기","location.replace('".PAGE."/".$y."/".$n."/".$i."/admin/".$row2[no]."')","");
						}else if($row2[state] =="승인"){
							echo "<br /><span class='cr'>";
							echo $row2[name]."님 승인됨";
							echo "</span>";
						}
					}
				}else{
				$row = fetch("select * from experlist where wyear = '$y' and wmonth ='$n' and wday = '$i' and name='$_SESSION[name]'");
					if($row[state] == "승인"){
						echo "<span class='cr'>";
						echo "승인되었습니다.";
						echo "</span>";
					}else if($row[state] == "대기"){
						echo "<span class='fw'>";
						echo "신청대기중";
						echo '</span>';
					}else{
						echo "<a href='".PAGE."/".$y."/".$n."/".$i."/reserve'>";
						echo "신청하기";
						echo "</a>";
					}
				}
				$i++;
			}
			echo "</li>";
		}
		echo "</ul>";
	}
	?>
	<ul class="w100">
		<li class="w100 bt1c fl">&nbsp;</li>
	</ul>
<?
}
?>