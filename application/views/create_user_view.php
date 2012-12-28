<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
								<span class="icon">
									<i class="icon-user "></i>
								</span>
                    <h5>Bitte Profilangaben eingeben</h5>
                </div>
                <?php
                $group = $this->ion_auth->user()->row()->group;
                if ($group == 'admin') {
                   /* echo '<h2>Create User</h2>';
                    echo '<h5>Please enter the users information below.</h5>'*/;?>


                     <div class="widget-content nopadding">
                    <div id="infoMessage"><?php echo $message;?></div>

                    <?php echo
                    $attributes = array('class' => 'form-horizontal');
                    form_open("mitglieder/create_user",$attributes);
                    $group = '';
                    ?>

                    <div class="control-group">
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
                        Email: <br/>
                        <?php echo form_input($email);?>
                    </p>

                    <p>
                        Phone: <br/>
                        <?php echo form_input($phone1);?>-<?php echo form_input($phone2);?>
                        -<?php echo form_input($phone3);?>
                    </p>

                    <p>
                        Password: <br/>
                        <?php echo form_input($password);?>
                    </p>

                    <p>
                        Confirm Password: <br/>
                        <?php echo form_input($password_confirm);?>
                    </p>
                    <?php
                    echo form_fieldset() . PHP_EOL;
                    echo '<div>' . PHP_EOL;
                    $group = '';
                    echo form_label('Gruppe:', 'group') . PHP_EOL;
                    $options = array('admin' => 'Administrator', 'members' => 'Mitglied');
                    echo form_dropdown('group', $options) . PHP_EOL;
                    echo '</div>' . PHP_EOL;

                    /*echo '<div>' . PHP_EOL;
                    $group = $this->ion_auth->user()->row()->group;
                    if ($group == 'admin') {
                        echo form_label('Status:', 'active') . PHP_EOL;
                        $options    = array(0 => 'Inaktiv', 1 => 'Aktiv');
                        $active_set = $this->ion_auth->user()->row()->active;
                        print_r($active_set);
                        echo form_dropdown('active', $options, $active_set) . PHP_EOL;
                        echo '</div>' . PHP_EOL;

                    }
                   */
                    ?>




                    <p><?php echo form_submit('submit', 'Create User');?></p>

                    <?php echo form_close(); ?>



                    <?php
                } else {

                };?>
            </div>
        </div>
    </div>
</div>


