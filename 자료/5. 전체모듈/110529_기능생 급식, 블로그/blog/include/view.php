<?
$row=fetch("select * from content where main_id='$main_id' && sub_id='$sub_id' && no='$no'");
?>
<ul class="w100">
	<li class="w100 text3 ft14 fw ul"><?=$row[subject]?></li>
	<li class="w100 ft11 c9 text"><?=$row[name]?>&nbsp;<?=$row[wdate]?>&nbsp;<a onclick="if(confirm('삭제하시습니까?')){location.replace('<?=PAGE?>/<?=$sub_id?>/delete.php/<?=$row[no]?>');}" class="cs">삭제</a>&nbsp;<a href="javascript:open('mo')">수정</a>
	</li>
</ul>
<ul class="w100">
	<li class="w100 ft12 lh"><?=stripslashes($row[content])?></li>
</ul>
<ul class="w100">
	<li class="ul w100 ft11">Tags&nbsp;:&nbsp;<?=$row[tags]?></li>
	<li class="w100 ft11"><a href="<?=PAGE?>/<?=$sub_id?>">&lt;-뒤로</a></li>
</ul>
<div id="mo" style="display:none;">
	<form action="<?=$url?>/include/modify_ok.php" method="post">
	<ul class="w100">
		<li class="w20">
			<input type="hidden" name="no" value="<?=$row[no]?>" />
			<input type="hidden" name="mainid" value="<?=$main_id?>" />
			<select name="sub_id" class="ft12" style="width:120px;height:20px;border:solid 1px #ccc;" id="sub_id">
			<?
			$sel[$sub_id] = "selected='selected'";
				$res3=sql("select sub_id,title from cate where main_id='$main_id'");
				while($row3=mysql_fetch_array($res3)){
					echo '<option value="'.$row3[sub_id].'" '.$sel[$row3[sub_id]].'>'.$row3[title].'</option>';
				}
			?>
			</select>
		</li>
		<li class="w80"><input type="text" value="<?=$row[subject]?>" name="subject" id="subject" class="" maxlength="100" style="width:600px;height:16px;border:solid 1px #ccc;" /></li>
	</ul>
	<ul class="w100">
		<li class="w100"><textarea name="content" id="content" cols="92" rows="20"><?=$row[content]?></textarea></li>
	</ul>
	<ul class="w100">
		<li class="w100 ft12 c6">태그&nbsp;<input type="text" name="tags" id="tags" value="<?=$row[tags]?>" style="width:300px;" /><span class="cc ft11">&nbsp;쉼표(,)로 구분을 해주세요</span></li>
	</ul>
	<ul class="w100">
		<li class="w100 tc"><input type="submit" value="글쓰기" style="width:60px;height:30px;" /></li>
	</ul>
	</form>
</div>