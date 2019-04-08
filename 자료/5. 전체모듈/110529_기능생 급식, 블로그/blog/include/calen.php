<?
if($_POST[mouth]){
	$m = $_POST[mouth];
}
if(!$Y) { $Y = date("Y"); }
if(!$m) { $m = date("m"); }
if(!$d) { $d = date("d"); }

$total_day = date("t",strtotime("$Y-$m-$d"));
$start_day = date("w",strtotime("$Y-$m-01"));
$last_day = date("w",strtotime("$Y-$m-$total_day"));
$total_week = ceil(($total_day+$start_day)/7);
?>
<form action="" method="post" id="cel">
<ul class="ft11 cel2">
	<li class="mt2 c6 fw"><?=$Y?></li>
	<li>
		<select name="mouth" class="ft11 bn" onchange="submit();" style=""><!--바뀌었을 때 javascript submit()실행-->
			<?
			$sel[$m] = "selected='selected'";
			for($n = 1; $n <= 12; $n++){
				if($n < 10){ //1~9월까지는 앞에 0을 붙여준다.
					$o = "0";
				}else{
					$o = ""; // 10월달부턴 0을 붙히지 않는다.
				}
				echo '<option '.$sel[$o.$n].' value="'.$o.$n.'" class="bn">'.$o.$n.'</option>';
			}
			?>
		</select>
	</li>
</ul>
</form>
<ul class="ft11 c9 cel">
	<li>일</li>
	<li>월</li>
	<li>화</li>
	<li>수</li>
	<li>목</li>
	<li>금</li>
	<li>토</li>
</ul>
<?
$day = 1;
for($i = 1; $i <= $total_week; $i++){
	echo "<ul class='ft11 cel'>";
	for($j = 0; $j < 7; $j++){
		echo "<li>";
		if(!(($i == 1 && $j < $start_day) || ($i == $total_week && $j > $last_day))){
			if($j == 0){
				echo "<span class='cr'>";
			}else if($j == 6){
				echo "<span class='cb'>";
			}else if($day == date("j")){
				echo "<span class='fw'>";
			}else{
				echo "<span>";
			}
			echo $day;
			echo "</span>";
			$day++;
		}else{
			echo "&nbsp;";
		}
		echo "</li>";
	}
	echo "</ul>";
}
?>