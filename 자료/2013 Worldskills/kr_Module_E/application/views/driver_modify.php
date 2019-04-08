
<div class="form">
<?php
echo form_open_multipart(FORM);
echo form_hidden('test','test');

echo '<div class="row">';
echo form_label('name','name');
echo form_input('name',$list['name']);
echo '</div>';

echo '<div class="row">';
echo form_label('birth_date','birth_date');
echo form_input('birth_date',$list['birth_date']);
echo '</div>';

echo '<div class="row">';
echo form_label('email','birth_date');
echo form_input('email',$list['email']);
echo '</div>';

echo '<div class="row">';
echo form_label('phone','birth_date');
echo form_input('phone',$list['phone']);
echo '</div>';

echo '<div class="row">';
echo form_label('avatar','birth_date');
echo form_upload('img');
echo '</div>';

echo '<div class="row">';
echo form_label('type','type');
echo form_dropdown('type',$line_type,$list['type']);
echo '</div>';


echo form_submit('Submit','Submit');
echo form_close();
?>
</div><!-- form -->