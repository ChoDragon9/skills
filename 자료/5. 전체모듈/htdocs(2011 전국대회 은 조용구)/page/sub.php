<div id="sfla">
<script type="text/javascript">fla("<?=$fla?>/sub.swf","1000","305","sub");</script>
</div>
<div id="scon">
	<div id="sconleft">
		<div id="lefttop">
			<ul class="w100 ac">
				<li class="w100 ft11 fw cg"><?=$mdt[main_id]?></li>
				<li class="w100 ft12 fw cg"><?=$mdt[title]?></li>
			</ul>
		</div>
		<div id="leftcenter">
			<ul class="w100">
				<?
				$res = sql("select * from menu where type!='main' and main_id='$mdt[main_id]'");
				while($row= mysql_fetch_array($res)){
					if($sdt[sub_id] == $row[sub_id]){$fw = "fw";}else{$fw="";}
					?>
					<li class="w100 ft11 <?=$fw?>"><img src="<?=$img?>/title2.png" title="title" alt="��" />&nbsp;<a href="<?=$index?>/<?=$row[main_id]?>/<?=$row[sub_id]?>"><?=$row[title]?></a></li>
					<?
				}
				?>
			</ul>
		</div>
		<div id="leftbottom">
			<a href="<?=$index?>/main4/sub1"><img src="<?=$img?>/basket.png" alt="��������ģȯ�� ��깰 �����ϱ�go" title="��������ģȯ�� ��깰 �����ϱ�go" /></a> 
		</div>
	</div>
	<div id="sconright">
		<div id="sconrighttop">
			<img src="<?=$img?>/subbanner.png" alt="��ǰ�ֹ� / ü�蹮��055. 123. 4567 ������" title="��ǰ�ֹ� / ü�蹮��055. 123. 4567 ������" />
		</div>
		<div id="sconrightmiddle">
			<ul class="w100">
				<li class="w40 ft13 fl fw"><img src="<?=$img?>/title.png" title="title" alt="��" />&nbsp;<?=$sdt[title]?></li>
				<li class="w60 ar fl ft11 c9 mt5"><?=$title?></li>
			</ul>
		</div>
		<div id="sconrightbt">
			<ul class="w100">
				<li class="w100 ar"><?=input("button","����Ʈ","window.print()","");?>&nbsp;<?=input("button","�۾�ũ��","resize(0.1)","");?>&nbsp;<?=input("button","�۾�����","resize(0.7)","");?>&nbsp;<?=input("button","�۾��۰�","resize(-0.1)","");?></li>
			</ul>
		</div>
		<div id="con_area">
		<?
		if($sdt[type] == "html"){
			echo hex2($sdt[content]);
		}else{
			include("../include/".$sdt[type].".php");
		}
		?>
		</div>
		<div id="sconrightbottom">
			<ul class="w100">
				<li class="W100 ar"><a href="#top"><img src="<?=$img?>/top.png" alt="top��" title="top��" /></a>&nbsp;&nbsp;</li>
			</ul>
		</div>
	</div>
</div>