<!DOCTYPE html>
<html lang="en">
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
    <form id="loginform" class="form-vertical" action="<?php echo base_url() . 'auth/forgot_password';?>" method="post" accept-charset="utf-8">
        <p>Enter your e-mail address below and we will send you instructions how to recover a password.</p>
        <br />



        <div class="control-group">
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-envelope"></i></span><input type="text" name="email" id="email" placeholder="Email-address" />


                </div>
            </div>
        </div>
        <div class="form-actions">

            <span class="pull-left"><?php echo anchor('auth/login', '< Back to login');?></span>

            <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Recover" /></span>
        </div>
    </form>
</div>

<script src="<?php echo base_url() . 'lib/js/jquery.min.js"></script>';?>
<script src="<?php echo base_url() . 'lib/js/unicorn.login.js"></script>';?>
</body>
</html>