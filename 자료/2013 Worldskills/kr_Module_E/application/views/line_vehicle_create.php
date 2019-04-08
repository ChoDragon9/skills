
<div class="form">
<?php
echo form_open_multipart(FORM);
echo form_hidden('test','test');


echo '<div class="row">';
echo form_label('Vehicle','vehicle_id');
foreach($list as $val){
	$arr[$val["id"]] = $val['name'];
}
echo form_dropdown('vehicle_id',$arr);
echo '</div>';


echo form_submit('Submit','Submit');
echo form_close();
?>
</div><!-- form -->