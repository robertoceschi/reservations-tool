<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head> </head>
    <title>Unicorn Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?php echo base_url() . 'css/style.css" />';?>
  </head>
<body>
<div id="logo">
    <img src="<?php echo base_url() . 'media/img/logo.png" alt="" />';?>
</div>
<div id="infoMessage"><?php echo $message;?></div>
<div id="loginbox">
    <form id="loginform" class="form-vertical" action="<?php echo base_url() . 'auth/login';?>" method="post" accept-charset="utf-8">
        <p>Enter username/ email and password to continue.</p>

        <div class="control-group">
            <div class="controls">
                <div class="input-prepend">

                   <span class="add-on"><i class="icon-user"></i></span><input type="text" id= "identity" name="identity" placeholder="Username" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock"></i></span><input type="password" name="password" id="password" placeholder="Password" />
                </div>



            </div>

        </div>
        <div class="form-actions">

            <span class="pull-left"><?php echo anchor('auth/forgot_password', 'Lost password?');?></span></br>
            <span class="pull-left" style="margin-left: -101px"><?php echo anchor('new_user_profile', 'Register');?></span>
           <span class="remember"><label for="remember">Remember Me:</label><?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?></span>
            <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Login" /></span>

        </div>
    </form>


    <!--<form id="recoverform" action="#" class="form-vertical"> -->

</div>

<script src="<?php echo base_url() . 'lib/js/jquery.min.js"></script>';?>
<script src="<?php echo base_url() . 'lib/js/unicorn.login.js"></script>';?>
</body>
</html>



