<div id="mfla">
<script type="text/javascript">fla("<?=$fla?>/main.swf","680","530","main");</script>
</div>
<div id="mcon">
	<div id="mconleft">
		<a href="<?=$index?>/main1/sub1"><img src="<?=$img?>/banner1.png" alt="ģȯ�� ������ �Ұ��մϴ�.������Ұ�" title="ģȯ�� ������ �Ұ��մϴ�.������Ұ�" /></a>
	</div>
	<div id="mconcenter">
		<img src="<?=$img?>/banner2.png" alt="��ǰ�ֹ� / ü�蹮��055. 123. 4567 ������" title="��ǰ�ֹ� / ü�蹮��055. 123. 4567 ������" />
	</div>
	<!--Content_start-->
	<div id="mconright">
		<div id="mcontop">
		<?
		$hi = change($_POST[hi]);
		if($hi){
			sql("insert into hi values('','$hi')");
			move($index);
		}else{
		?>
		<form action="" method="post">
			<ul class="w100">
				<li class="w100"><img src="<?=$img?>/hi.png" alt="�� �� �λ縻������ �λ縻�� �����ּ���." title="�� �� �λ縻������ �λ縻�� �����ּ���." /></li>
			</ul>
			<ul class="w100 put">
				<li class="w100"><input type="text" name="hi" id="hi" title="hi" class="hiinput" value="" maxlength="20" />&nbsp;<input type="submit" title="�۳����" class="hisubmit" value="�۳����" /></li>
			</ul>
		</form>
		<?
		}
		?>
			<ul class="w100 ft11 c6">
				<?
				$res = sql("select * from hi order by no desc limit 3");
				while($row =mysql_fetch_array($res)){
					echo "<li>&nbsp;-&nbsp;".$row[subject]."</li>";
				}
				?>
			</ul>
		</div>
		<div id="mconmiddle">
			<ul class="w100">
				<li class="w100"><img src="<?=$img?>/mainboard.png" alt="Community Board" title="Community Board" /><a href="<?=$index?>/main5/sub1"><img src="<?=$img?>/mainboardmore.png" alt="more" title="more" /></a></li>
			</ul>
			<ul class="w100">
			<?
			$res2= sql("select * from board where main_id='main5' and sub_id='sub1' order by no desc limit 4");
			while($row2=mysql_fetch_array($res2)){
				echo '<li class="w100 ft11 c6">&nbsp;&nbsp;&nbsp;-&nbsp;<a href="'.$index.'/main5/sub1/view/'.$row2[no].'" title="'.$row2[subject].'">'.substr($row2[subject],0,46).'</a></li>';
			}
			?>
			</ul>
		</div>
		<div id="mconbottom">
			<ul class="w100">
				<li class="w100"><img src="<?=$img?>/product.png" alt="Vilage Product" title="Vilage Product" /><a href="<?=$index?>/main4/sub1"><img src="<?=$img?>/productmore.png" alt="more" title="more" /></a></li>
			</ul>
			<?
			$res3 = sql("select * from product order by no desc limit 3");
			while($row3 = mysql_fetch_array($res3)){
				?>
				<ul class="f">
					<li class="w100 fl ar"><a href="<?=$index?>/main4/sub1/view/<?=$row3[no]?>"><img src="<?=$file?>/<?=$row3[wfile]?>" alt="<?=$row3[name]?>" title="<?=$row3[name]?>" /></a></li>
				</ul>
				<ul class="s">
					<li class="w100 ft12 fw cg"><a href="<?=$index?>/main4/sub1/view/<?=$row3[no]?>">��ǰ�� : <?=$row3[name]?></a></li>
					<li class="w100 ft11"><a href="<?=$index?>/main4/sub1/view/<?=$row3[no]?>">���� : <?=$row3[local]?></a></li>
					<li class="w100 ft11"><a href="<?=$index?>/main4/sub1/view/<?=$row3[no]?>">��ǰ���� : <?=$row3[kg]?>kg <?=$row3[price]?>��</a></li>
				</ul>
				<?
			}
			?>
		</div>
	</div>
	<!--Content_end-->
</div>