<?
if($_SESSION[lv] == "10"){
?>
<form action="" method="post" id="month">
<ul><li><input type="hidden" name="n" id="n" value="" /></li></u
</form>
<?
if($_POST[n]){ $n = $_POST[n]; }
if(!$Y){ $Y = date("Y"); }
if(!$n){ $n = date("n"); }
if(!$j){ $j = date("j"); }
?>
<div id="list_area">
<?
if(!$sub_id){
?>
	<ul class="w100"><li class="ft12 c9"><?=$_SESSION[name]?>님<a href="<?=PAGE?>/logout">로그아웃</a></li></ul>
	<ul class="list_t">
		<li class="ft11 fw w20" style="margin-top:17px;"><?=month($n,"javascript:month");?></li>
		<li class="ft30 fw c9 w60 tc">관리자페이지</li>
		<li class="ft11 c9 w20 tr" style="margin-top:17px;"><?echo date("$Y")."&nbsp;/&nbsp;".date("n",strtotime("$Y-$n"))."&nbsp;/&nbsp;".date("j");?></li>
	</ul>
	<ul class="list_m">
	<?
	$datearr = array("Sunday","Monday","Tuseday","Wedneday","Thursday","Friday","Saturday");
	for($i = 0; $i < 7; $i++){
		echo '<li class="ft11 cc fw">'.$datearr[$i].'</li>';
	}
	?>
	</ul>
	<div id="list_b">
		<?
		$total_day = date("t",strtotime("$Y-$n")); //그 달의 마지막날을 구한다.
		$start_day = date("w",strtotime("$Y-$n-1")); //그 달의 첫날을 구한다.
		$total_week = ceil(($total_day+$start_day)/7); //그 달의 총 주를 구한다.
		$last_day = date("w",strtotime("$Y-$n-".$total_day));
		$day = 1;
		for($w=1; $w<=$total_week; $w++){
			echo "<ul>";
			for($d=0;$d<7;$d++){
				echo '<li class="ft30 cs"><a href="'.PAGE.'/view/'.$n.'/'.$day.'">';
				if(!(($w == 1 && $d < $start_day) || ($w == $total_week && $d > $last_day))){
					if($day != date("j") && $d != 0 && $d != 6){
						echo $day;
					}else if($d == 0 && $day == date("j")){
						echo '<span style="color:#f00;font-weight:bold;">';
						echo $day."<br />Today";
						echo '</span>';
					}else if($d == 6 && $day == date("j")){
						echo '<span style="color:#00f;font-weight:bold;">';
						echo $day."<br />Today";
						echo '</span>';
					}else if($d == 0){
						echo '<span style="color:#f00;">';
						echo $day;
						echo '</span>';
					}else if($d == 6){
						echo '<span style="color:#00f;">';
						echo $day;
						echo '</span>';
					}else if($day == date("j") && $d != 0 && $d != 6){
						echo '<span style="font-weight:bold;">';
						echo $day."<br />Today";
						echo '</span>';
					}
					$day++;
				}
				echo "</a></li>";
			}
			echo "</ul>";
		}
		?>
	</div>
<?
}else{
	include("../include/".$sub_id.".php");
}
?>
</div>
<?
}else{
	alert("권한이 없습니다.");
	move($index);
}
?>