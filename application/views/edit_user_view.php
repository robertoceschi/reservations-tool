<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
<div class="row-fluid">
<div class="span12">
    <?php
    if ($message == '') {
    } elseif ($this->session->flashdata('user_update') == true) {
        echo '<div class="alert alert-success">';
        echo '<button class="close" data-dismiss="alert">×</button>';
        echo '<strong><div id="successMessage">' . $message . '</div></strong> ';
        echo '</div>';
    } elseif ($message != '' and $this->session->flashdata('user_update') == false) {
        echo '<div class="alert alert-error">';
        echo '<button class="close" data-dismiss="alert">×</button> ';
        echo '<strong><div id="errorMessage">' . $message . '</div>  </strong>';
        echo '</div>';
    }
    ?>
    <div class="widget-box">
        <div class="widget-title">
								<span class="icon">
									<i class="icon-user "></i>
								</span>
            <h5>Ihre persönliches Profil</h5>
        </div>
        <div class="widget-content nopadding">

            <?php

            $attributes = array('class' => 'form-horizontal');
            echo form_open(current_url(), $attributes);?>
            <div class="control-group">
                <?php
                $attributes = array(
                    'label class' => 'control-label',);
                echo form_label('Vorname', 'first_name', $attributes);?>
                <div class="controls">
                    <?php
                    $attributes = array('name' => 'first_name',
                                        'id'   => 'first_name');
                    echo form_input($attributes, set_value('first_name', ucfirst($first_name['value']))) . PHP_EOL;
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
                    echo form_input($attributes, set_value('last_name', ucfirst($last_name['value']))) . PHP_EOL;
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
                    echo form_input($attributes, set_value('company', $company['value'])) . PHP_EOL;
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
                    echo form_input($attributes, set_value('email', $email['value'])) . PHP_EOL;
                    ?>
                </div>
            </div>
            <div class="control-group">
                <?php
                $attributes = array(
                    'label class' => 'control-label',);
                echo form_label('Mobiltelefon', 'phone1', $attributes); ?>
                <div class="controls">
                    <?php
                    $attributes = array('name'        => 'phone1',
                                        'id'          => 'phone1',
                                        'placeholder' => 'muss 10-stellig sein. Beispiel: 0767863467');
                    echo form_input($attributes, set_value('phone1', $phone1['value'])) . PHP_EOL;
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
                                        'placeholder' => 'neues Passwort (falls gewünscht)');
                    echo form_input($attributes) . PHP_EOL;
                    ?>
                </div>
            </div>

            <div class="control-group">

                <?php
                $attributes = array(
                    'label class' => 'control-label',
                    'placeholder' => 'neues Passwort (falls gewünscht)');
                echo form_label('Passwort wiederholen', 'password_confirm', $attributes); ?>
                <div class="controls">
                    <?php
                    $attributes = array('name'        => 'password_confirm',
                                        'id'          => 'password_confirm',
                                        'placeholder' => 'falls Passwort geändert wurde');
                    echo form_input($attributes) . PHP_EOL;
                    /*echo '<pre>';
                    print_r($password);
                    echo '</pre>'; */
                    ?>
                </div>
            </div>
            <?php
            $permission_group = $this->ion_auth->user()->row()->permission_group;
            if ($permission_group == 'admin') {
                echo '<div class="control-group">';
                echo '<div>' . PHP_EOL;
                $permission_group = $this->ion_auth->user()->row()->permission_group;
                //  print_r($group);

                $attributes = array(
                    'label class' => 'control-label');
                echo form_label('Gruppe', 'permission_group', $attributes) . PHP_EOL;


                echo '<div class="controls">'; ?>
                <input type="radio" name="permission_group" id="permission_group" value="admin"
                       style="opacity: 1 !important" <?php if ($user->permission_group == 'admin') {
                    echo 'checked="checked"';
                }?> />Administrator </br>
                <input type="radio" name="permission_group" id="permission_group" value="members"
                       style="opacity: 1 !important" <?php if ($user->permission_group == 'members') {
                    echo 'checked="checked"';
                }?> />Mitglied </br>



                <?php
                echo '</div></div>' . PHP_EOL;

                echo '</div>';
            }


            if ($permission_group == 'admin') {
                echo '<div class="control-group">';
                echo '<div>' . PHP_EOL;
                $permission_group      = $this->ion_auth->user()->row()->permission_group;
                $attributes = array(
                    'label class' => 'control-label');
                echo form_label('Status', 'active', $attributes) . PHP_EOL;
                echo '<div class="controls">';?>
                <input type="radio" name="active" value="1"
                       style="opacity: 1 !important;" <?php if ($user->active == 1) {
                    echo 'checked="checked"';
                }?> />Aktiv </br>
                <input type="radio" name="active" value="0"
                       style="opacity: 1 !important;" <?php if ($user->active == 0) {
                    echo 'checked="checked"';
                }?> />Inaktiv
                <?php echo '</div></div>' . PHP_EOL;
                echo '</div>';
            } ?>
            <?php /* echo form_hidden($csrf);*/ //nochmals anschauen!!!! Müsste eigentlich angezeigt werden ?>


            <?php //echo


            //form_submit('submit', 'Eintrag speichern');?>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary" data-loading-text="Sending...">
                    <!--<i class="icon-refresh icon-white"></i>--> Eintrag speichern
                </button>
            </div>
            <?php echo form_close();?>


        </div>
    </div>
</div>
</div>
</div>


