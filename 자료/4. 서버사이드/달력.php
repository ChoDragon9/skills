<?php
echo '<ul>';
$arr = array("일","월","화","수","목","금","토");
for($i = 0; $i < sizeof($arr); $i++) echo '<li>'.$arr["$i"].'</li>';
echo '</ul>';
$y  = date("y");
$m  = date("m") + 2;
$d  = date("d");
$start_day = date("w",strtotime("$y-$m-1"));
$total_day = date("t",strtotime("$y-$m-1"));
$last_day = date("w",strtotime("$y-$m-$total_day"));
$total_week = ceil($total_day/7);
$day = 1;

for($week = 1; $week <= $total_week; $week++){
	for($i = 0; $i < 7; $i++){
		if(!(
			($week == 1 and $i < $start_day) or 
			($week == $total_week and $i > $last_day)
		)){
			echo $day;
			$day++;
		}else{
			echo "&nbsp";
		}
	}
	echo '<br>';
}
?>