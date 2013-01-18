<script type="text/javascript">

    $(document).ready(function () {
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
            if ($message == '') {
            } elseif ($this->session->flashdata('user_create') == true) {
                echo '<div class="alert alert-success">';
                echo '<button class="close" data-dismiss="alert">×</button>';
                echo '<strong><div id="successMessage">' . $message . '</div></strong> ';
                echo '</div>';
            } elseif ($message != '' and $this->session->flashdata('user_create') == false) {
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
                    <h5>Courtangaben</h5>
                </div>
                <?php
                $permission_group = $this->ion_auth->user()->row()->permission_group;
                if ($permission_group == 'admin') {
                    /* echo '<h2>Create User</h2>';
                     echo '<h5>Please enter the users information below.</h5>'*/
                    ;?>
                     <div class="widget-content nopadding">
                    <?php
                    $attributes = array('class' => 'form-horizontal');
                    echo form_open("courts/create_court", $attributes);?>
                    <div class="control-group">
                        <?php
                        $attributes = array(
                            'label class' => 'control-label',);
                        echo form_label('Kategorie', 'court_category', $attributes); ?>
                        <div class="controls">
                            <?php
                            $attributes = array('name' => 'court_category',
                                                'id'   => 'court_category');
                            echo form_input($attributes, set_value('court_category', $court_category['value'])) . PHP_EOL;
                            ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php
                        $attributes = array(
                            'label class' => 'control-label',);
                        echo form_label('Court-Name', 'court_name', $attributes); ?>
                        <div class="controls">
                            <?php
                            $attributes = array('name' => 'court_name',
                                                'id'   => 'court_name');
                            echo form_input($attributes, set_value('court_name', $court_name['value'])) . PHP_EOL;
                            ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php
                        $attributes = array(
                            'label class' => 'control-label',);
                        echo form_label('Saison', 'company', $attributes); ?>
                        <div class="controls">
                            <?php
                            $attributes = array('name' => 'saison',
                                                'id'   => 'saison');
                            echo form_input($attributes, set_value('company', $saison['value'])) . PHP_EOL;
                            ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php
                        $attributes = array(
                            'label class' => 'control-label',);
                        echo form_label('Spielzeit', 'email', $attributes); ?>
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
                        echo form_label('Court gesperrt', 'phone1', $attributes); ?>
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

                    <?php
                    // echo form_fieldset() . PHP_EOL;

                    echo '<div class="control-group">' . PHP_EOL;
                    echo '<div>' . PHP_EOL;
                    $permission_group     = '';
                    $attributes = array(
                        'label class' => 'control-label'
                    );
                    echo form_label('Court Status', 'permission_group', $attributes) . PHP_EOL;
                    //$options = array('admin' => 'Administrator', 'members' => 'Mitglied');
                    $data = array(
                        'name'    => 'permission_group',
                        'id'      => 'permission_group',
                        'value'   => 'aktiv',
                        'checked' => 1,
                        'style'   => 'opacity: 1 !important'

                    );
                    echo '<div class="controls">';

                    echo form_radio($data) . 'aktiv';

                    echo '</br>';
                    $data = array(
                        'name'    => 'permission_group',
                        'id'      => 'permission_group',
                        'value'   => 'inaktiv',
                        'checked' => 0,
                        'style'   => 'opacity: 1 !important'
                    );
                    echo form_radio($data) . 'inaktiv';
                    echo ' </div>';
                    echo '</div></div>' . PHP_EOL;
                    ?>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" data-loading-text="Sending...">
                            <!--<i class="icon-refresh icon-white"></i>--> Court speichern
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
