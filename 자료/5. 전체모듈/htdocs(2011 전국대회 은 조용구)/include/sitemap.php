<div id="sitemap">
	<?
	$res= sql("select * from menu where type='main' and (main_id!='admin' and main_id!='sitemap')");
	while($row=mysql_fetch_array($res)){
		?>
		<ul class="w100">
			<li class="w100 fw fm cg bb2c ac"><?=$row[title]?></li>
			<?
			$res2 = sql("select * from menu where type!='main' and main_id='$row[main_id]'");
			while($row2=mysql_fetch_array($res2)){
				?>
				<li class="w100 bb1c">
				<a href="<?=$index?>/<?=$row2[main_id]?>/<?=$row2[sub_id]?>">&nbsp;-&nbsp;<?=$row2[title]?></a>
				</li>
				<?
			}
			?>
		</ul>
		<?
	}
	?>
</div>