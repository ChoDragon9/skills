<?php
$row = fetarr("select * from board where no='$no'");
?>
<div class="content">
	<ul>
		<li class="w20 bg"><?php echo nb(3)?>�̸�</li>
		<li class="w30"><?php echo nb(3).$row['name'];?></li>
		<li class="w20 bg"><?php echo nb(3)?>�ۼ���</li>
		<li class="w30"><?php echo nb(3).$row['wdate'];?></li>
	</ul>
	<ul>
		<li class="w20 bg"><?php echo nb(3);?>����</li>
		<li class="w80"><?php echo nb(3).$row['subject'];?></li>
	</ul>
	<ul class="bt">
		<li><?php echo nl2br($row['content']);?></li>
	</ul>
	<ul class="bt">
		<li><input type="button" value="�ڷΰ���" onclick="move('<?php echo $url;?>');" /></li>
	</ul>
</div>
<div class="join">
	<ul>
		<li><?php echo nb(3);?>�̸� <input type="text" name="name" id="name" size="10" /></li>
		<li><?php echo nb(3);?>���� <input type="text" name="content" id="content" size="50" onkeyup="if(event.keyCode == 13){comadd();}" /><input type="hidden" name="boardnum" id="boardnum" value="<?php echo $row['no'];?>" />'Enter'�� ������ ��ϵ˴ϴ�.</li>
	</ul>
	<ul class="bt"><li> </li></ul>
</div>
<script type="text/javascript">
setInterval(function(){
	sendRequest("comment.php?no=<?php echo $row['no'];?>");
},500);
</script>
<div id="comment">
</div>