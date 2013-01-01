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



<form id="loginform" class="form-vertical" action="<?php echo base_url() . 'auth/reset_password/' . $code;?>" method="post" accept-charset="utf-8">
    <p>Bitte neues Passwort eingeben (mind. <?php echo $min_password_length;?> Zeichen)</p>


    <div class="control-group">
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span><input type="password" id= "new" name="new" value="" placeholder="Neues Passwort" />
            </div>
        </div>
    </div>

    <div class="control-group">
        <div class="controls">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-lock"></i></span><input type="password" id= "new_confirm" name="new_confirm" value="" placeholder="Passwort wiederholen" />
            </div>
        </div>
    </div>


    <?php echo form_input($user_id);?>
    <?php echo form_hidden($csrf); ?>
    <div class="form-actions">
        <span class="pull-right"><input type="submit" class="btn btn-inverse" value="Change" /></span>
    </div>

</form>
</div>

<script src="<?php echo base_url() . 'lib/js/jquery.min.js"></script>';?>
<script src="<?php echo base_url() . 'lib/js/unicorn.login.js"></script>';?>
</body>
</html>





