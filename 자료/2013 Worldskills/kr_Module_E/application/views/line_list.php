<table>
<tbody>
<?php
foreach($list as $unit){
?>
	<tr>
		<td style="border:1px solid #dbdbdb">
		Name : <?php echo $unit['code'];?><br />
		start_time_operation : <?php echo $unit['start_time_operation'];?><br />
		end_time_operation : <?php echo $unit['end_time_operation'];?><br />
		Type : <?php echo $unit['type'];?><br />
		Map  <p><?php if(isset($unit['map'])){ echo '<img src="'.UPLOAD.$unit['map'].'" style="width:500px" />';}else{ echo "Do not have date"; } ?></p>
		Vehicles <br />
		<?php
		foreach($unit['vehicle_list'] as $val){
			echo $val['name'].'<br />';
		}
		?>
		Stations <br />
		<?php
		foreach($unit['vehicle_list'] as $val){
			echo $val['name'].'<br />';
		}
		?>
		</td>
	</tr>
<?php
}
?>
</tbody>
</table>