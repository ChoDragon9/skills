<table>
<tbody>
<?php
foreach($list as $unit){
?>
	<tr>
		<td style="border:1px solid #dbdbdb">
		<?php
		$js = ' onclick=" window.location=\''.HOME.U2.'/modify/'.$unit['id'].'\'; " ';
		echo form_button('Modify','Modify',$js);
		$js = ' onclick=" window.location=\''.HOME.U2.'/delete/'.$unit['id'].'\'; " ';
		echo form_button('Delete','Delete',$js).'<br />';
		?>
		Name : <?php echo $unit['name'];?> 
		</td>
	</tr>
<?php
}
?>
</tbody>
</table>