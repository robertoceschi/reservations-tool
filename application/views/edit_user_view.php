<div class="container-fluid">
    <div class="row-fluid">
        <h1>Edit User</h1>

        <p>Please enter the users information below.</p>

        <div id="infoMessage"><?php echo $message;?></div>

        <?php

        echo form_open(current_url());?>

        <p>
            First Name: <br/>
            <?php echo form_input($first_name);?>
        </p>

        <p>
            Last Name: <br/>
            <?php echo form_input($last_name);?>
        </p>

        <p>
            Company Name: <br/>
            <?php echo form_input($company);?>
        </p>

        <p>
            Phone: <br/>
            <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>-<?php echo form_input($phone3);?>
        </p>

        <p>
            Password: (if changing password)<br/>
            <?php echo form_input($password);?>
        </p>

        <p>
            Confirm Password: (if changing password)<br/>
            <?php echo form_input($password_confirm);?>
        </p>

        <?php echo '<div>' . PHP_EOL;
        $is_admin = $this->ion_auth->user()->row()->group;
        if ($is_admin == 'admin') {
            echo form_label('Gruppe:', 'group') . PHP_EOL;
            $options = array('admin' => 'Administrator', 'members' => 'Mitglied');
            $group   = $user->group;
            echo form_dropdown('group', $options, $group) . PHP_EOL;
            echo '</div>' . PHP_EOL;
        }
        ?>


        <?php echo form_hidden('id', $user->id);?>
        <?php /* echo form_hidden($csrf);*/ //nochmals anschauen!!!! Müsste eigentlich angezeigt werden ?>

        <p><?php echo form_submit('submit', 'Save User');?></p>

<?php echo form_close();?>