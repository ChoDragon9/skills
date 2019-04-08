
<div class="form">
<?php
echo form_open_multipart(FORM);
echo form_hidden('test','test');

echo '<div class="row">';
echo form_label('name','name');
echo form_input('name',$list['name']);
echo '</div>';
echo form_submit('Submit','Submit');
echo form_close();
?>
</div><!-- form -->