<div class='form-container'>
<?php
$target_controller='testing/receive_form';
$attributes='class="form"';
$hidden_fields='';
echo form_open($target_controller, $attributes, $hidden_fields);
?>

<input required type="text" name="username" />
<input required type="text" name="pass" />
<input type="button">
</form>
</div>