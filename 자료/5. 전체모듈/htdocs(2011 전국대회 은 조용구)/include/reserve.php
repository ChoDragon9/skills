<?
if($day2){
	if($_SESSION[name]){
		include("../include/reserve/".$day2.".php");
	}else{
		alert("�α����� ���ּ���.");
		move($index."/login/login");
	}
}else{
	if(!$type){$y = date("Y");}else{$y = $type;}
	if(!$no){$n = date("n");}else{$n = $no;}
	if($y < 2000){
		alert("�ּ� 2000�� �ִ� 2020����� ���Ǽ� �ֽ��ϴ�.");
		$y = 2000;
	}
	if($y > 2020){
		alert("�ּ� 2000�� �ִ� 2020����� ���Ǽ� �ֽ��ϴ�.");
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
		<li class="w100 fl ac"><a href="<?=PAGE?>/<?=$prevyear?>/<?=$n?>">�����⵵</a>&nbsp;&nbsp;&nbsp;<a href="<?=PAGE?>/<?=$prevmonth?>">������</a>&nbsp;&nbsp;&nbsp;<span class="fw fm ft14"><?=date("Y�� m��",strtotime(date("$y-$n")."-1"));?></span>&nbsp;&nbsp;&nbsp;<a href="<?=PAGE?>/<?=$nextmonth?>">������</a>&nbsp;&nbsp;&nbsp;<a href="<?=PAGE?>/<?=$nextyear?>/<?=$n?>">�����⵵</a></li>
	</ul>
	<ul class="w100">
		<li class="w100 fl">�� ���� ��û�� : <?=num("select * from experlist");?>��</li>
	</ul>
	<ul class="w100 cal ac fw fm">
		<li class="cr">��</li>
		<li class="c6">��</li>
		<li class="c6">ȭ</li>
		<li class="c6">��</li>
		<li class="c6">��</li>
		<li class="c6">��</li>
		<li class="cb">��</li>
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
						if($row2[state] == "���"){
							echo $row2[name]."��<br />";
							echo input("button","�����ϱ�","location.replace('".PAGE."/".$y."/".$n."/".$i."/admin/".$row2[no]."')","");
						}else if($row2[state] =="����"){
							echo "<br /><span class='cr'>";
							echo $row2[name]."�� ���ε�";
							echo "</span>";
						}
					}
				}else{
				$row = fetch("select * from experlist where wyear = '$y' and wmonth ='$n' and wday = '$i' and name='$_SESSION[name]'");
					if($row[state] == "����"){
						echo "<span class='cr'>";
						echo "���εǾ����ϴ�.";
						echo "</span>";
					}else if($row[state] == "���"){
						echo "<span class='fw'>";
						echo "��û�����";
						echo '</span>';
					}else{
						echo "<a href='".PAGE."/".$y."/".$n."/".$i."/reserve'>";
						echo "��û�ϱ�";
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