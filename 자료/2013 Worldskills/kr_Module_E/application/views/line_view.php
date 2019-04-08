
<div class="form">
<?php
echo '<div class="row">';
?>
		Name : <?php echo $list['code'];?><br />
		start_time_operation : <?php echo $list['start_time_operation'];?><br />
		end_time_operation : <?php echo $list['end_time_operation'];?><br />
		Type : <?php echo $list['type'];?><br />
		Map  <p><?php if(isset($list['map'])){ echo '<img src="'.UPLOAD.$list['map'].'" style="width:500px" />';}else{ echo "Do not have date"; } ?></p>
	<?php
echo '</div>';

?>
</div><!-- form -->