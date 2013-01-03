<script type="text/javascript">

    $(document).ready(function () {
         // $(".alert-success").hide();
          //$(".alert-error").hide();

        //error Message wird mit click() geschlossen!!
        $('.close').click(function () {
            $('.alert').hide();
        })
    });
</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <?php

            if(!isset($message)) {
                echo 'keine fehlermeldung';
            }

            if ($this->session->flashdata('user_create') == true) {
                echo '<div class="alert alert-success">';
                echo '<button class="close" data-dismiss="alert">×</button>';
                echo '<strong><div id="successMessage">' . $message . '</div></strong> ';
                echo '</div>';
            }
            if ($this->session->flashdata('user_create') == false)  {
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
                    <h5>Bitte Profilangaben eingeben</h5>
                </div>
                <?php
                $group = $this->ion_auth->user()->row()->group;
                if ($group == 'admin') {
                    /* echo '<h2>Create User</h2>';
                     echo '<h5>Please enter the users information below.</h5>'*/
                    ;?>

                     <div class="widget-content nopadding">


                    <?php echo
                    $attributes = array('class' => 'form-horizontal');
                    echo form_open("mitglieder/create_user", $attributes);?>



                    <div class="control-group">
                        <?php
                        $attributes = array(
                            'label class' => 'control-label',);
                        echo form_label('Vorname', 'first_name', $attributes); ?>
                        <div class="controls">
                            <?php
                            $attributes = array('name' => 'first_name',
                                                'id'   => 'first_name');
                            echo form_input($attributes, set_value('first_name', $first_name['value'])) . PHP_EOL;
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
                            echo form_input($attributes, set_value('last_name', $last_name['value'])) . PHP_EOL;
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
                        echo form_label('Telefon', 'phone', $attributes); ?>
                        <div class="controls">
                            <?php
                            $attributes = array('name' => 'phone',
                                                'id'   => 'phone');
                            echo form_input($attributes, set_value('phone1', $phone1['value'])) . PHP_EOL;
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
                            /*echo '<pre>';
                            print_r($password);
                            echo '</pre>'; */
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

                    <?php
                    // echo form_fieldset() . PHP_EOL;
                    echo '<div class="control-group">' . PHP_EOL;
                    echo '<div>' . PHP_EOL;
                    $group      = '';
                    $attributes = array(
                        'label class' => 'control-label');
                    echo form_label('Gruppe', 'group', $attributes) . PHP_EOL;
                    $options = array('admin' => 'Administrator', 'members' => 'Mitglied');
                    echo form_dropdown('group', $options) . PHP_EOL;
                    echo '</div></div>' . PHP_EOL;


                    ?>



                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" data-loading-text="Sending...">
                            <!--<i class="icon-refresh icon-white"></i>--> Profil speichern
                        </button>
                    </div>

                    <?php echo form_close(); ?>



                    <?php
                } else {

                };?>
            </div>
            </div>
        </div>
    </div>


