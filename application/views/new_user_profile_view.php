<?php
    //loading header and footer
    $this->load->view('template/header');
?>
<div id="logo">
    <img src="<?php echo base_url() . 'media/img/logo.png" alt="" />';?>
</div>
 <div id="infoMessage"><?php echo $message;?></div>
<div id="loginbox_new_user">
    <form id="loginform" class="form-vertical" action="<?php echo base_url() . 'new_user_profile/create_new_profile';?>"
          method="post" accept-charset="utf-8">


        <div class="control-group">
            <?php

            $attributes = array(
                'label class' => 'control-label',);
            echo form_label('Vorname', 'first_name', $attributes); ?>
            <div class="controls">
                <?php
                $attributes = array('name' => 'first_name',
                                    'id'   => 'first_name');
                echo form_input($attributes, set_value('first_name', $first_name)) . PHP_EOL;
                ?>
            </div>
        </div>
        <div class="control-group">
            <?php
            $attributes = array(
                'label class' => 'control-label',);
            echo form_label('Nachname', 'last_name', $attributes); ?>
            <div class="controls">
                <?php
                $attributes = array('name' => 'last_name',
                                    'id'   => 'last_name');
                echo form_input($attributes, set_value('last_name', $last_name)) . PHP_EOL;
                ?>
            </div>
        </div>
        <div class="control-group">
            <?php
            $attributes = array(
                'label class' => 'control-label',);
            echo form_label('Firma', 'company', $attributes); ?>
            <div class="controls">
                <?php
                $attributes = array('name' => 'company',
                                    'id'   => 'company');
                echo form_input($attributes, set_value('company', $company)) . PHP_EOL;
                ?>
            </div>
        </div>
        <div class="control-group">
            <?php
            $attributes = array(
                'label class' => 'control-label',);
            echo form_label('Email', 'email', $attributes); ?>
            <div class="controls">
                <?php
                $attributes = array('name' => 'email',
                                    'id'   => 'email');
                echo form_input($attributes, set_value('email', $email)) . PHP_EOL;
                ?>
            </div>
        </div>

        <div class="control-group">
            <?php
            $attributes = array(
                'label class' => 'control-label',);
            echo form_label('Telefon', 'phone', $attributes); ?>
            <div class="controls">
                <?php
                $attributes = array('name' => 'phone',
                                    'id'   => 'phone');
                echo form_input($attributes, set_value('phone1', $phone1)) . PHP_EOL;
                /*echo form_input($attributes, set_value('phone2', $phone2['value'])) . PHP_EOL;*/
                /*echo form_input($attributes, set_value('phone3', $phone3['value'])) . PHP_EOL;*/
                ?>
            </div>
        </div>

        <div class="control-group">
            <?php
            $attributes = array(
                'label class' => 'control-label'
            );
            echo form_label('Passwort', 'password', $attributes); ?>
            <div class="controls">
                <?php
                $attributes = array('name'        => 'password',
                                    'id'          => 'password',
                                    'placeholder' => 'mindestens 4-stellig');
                echo form_input($attributes) . PHP_EOL;
                ?>
            </div>
        </div>

        <div class="control-group">
            <?php
            $attributes = array(
                'label class' => 'control-label',
                'placeholder' => '');
            echo form_label('Passwort wiederholen', 'password_confirm', $attributes); ?>
            <div class="controls">
                <?php
                $attributes = array('name'        => 'password_confirm',
                                    'id'          => 'password_confirm',
                                    'placeholder' => '');
                echo form_input($attributes) . PHP_EOL;

                ?>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-right"><button type="submit" class="btn btn-primary" data-loading-text="Sending...">
                <!--<i class="icon-refresh icon-white"></i>--> Profil speichern
            </button> </span>
            <span class="pull-left"><?php echo anchor('auth/login', '< Back to login');?></span>
        </div>
    </form>

</div>


