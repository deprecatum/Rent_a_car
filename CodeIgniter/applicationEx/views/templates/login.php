<!--
<div class="g-recaptcha" data-sitekey="Your site key goes here">
é necessario um dominio para o captcha funcionar
-->
<div class='container-fluid my-3'>
<?php

$target_controller = 'frota/login';
$attributes = 'class="form w-75 m-auto"';
$hidden_fields = array('login_form' => 'true');

//echo validation_errors(); //debug

//creates the login form tag
echo form_open($target_controller, $attributes, $hidden_fields);
?>

        <h1 class="my-4">Login</h1>
        <div class="form-group">
            <label for="email_field">Email address</label>
            <input required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" id="email_field" aria-describedby="emailHelp" placeholder="Enter email" name="email" type="text">
        </div>
        <div class="form-group">
            <label for="pass_field">Password</label>
            <input required pattern="[a-zA-Z0-9]+" class="form-control" id="pass_field" placeholder="Password" name="pass" type="password">
        </div>
        <button type="submit" class="btn btn-primar y">Submit</button>
    </form>
</div>
<!--</div>
<script src='https://www.google.com/recaptcha/api.js'></script>-->