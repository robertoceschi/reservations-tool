<?php
    $group = $this->ion_auth->user()->row()->group;
    echo $group;

?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
								<span class="icon">
									<i class="icon-user "></i>
								</span>
                    <h5>Ihre persönliches Profil</h5>
                </div>
                <div class="widget-content nopadding">
                    <div id="infoMessage"><?php echo $message;?></div>

                    <?php
                    $attributes = array('class' => 'form-horizontal');
                    echo form_open(current_url(), $attributes);?>
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
                                                'placeholder' => 'neues Passwort (falls gewünscht)');
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
                    $group = $this->ion_auth->user()->row()->group;
                    if ($group == 'admin') {
                        echo '<div class="control-group">';
                        echo '<div>' . PHP_EOL;
                        //$group = $this->ion_auth->user()->row()->group;
                        //  print_r($group);

                        $attributes = array(
                            'label class' => 'control-label');
                        echo form_label('Gruppe', 'group', $attributes) . PHP_EOL;
                        $options   = array('admin' => 'Administrator', 'members' => 'Mitglied');
                        $group_set = $user->group;
                        echo form_dropdown('group', $options, $group_set) . PHP_EOL;
                        echo '</div>' . PHP_EOL;

                        echo '</div>';
                    }
                    ?>

                    <div class="control-group">

                        <?php echo '<div>' . PHP_EOL;
                        $group = $this->ion_auth->user()->row()->group;
                        if ($group == 'admin') {
                            $attributes = array(
                                'label class' => 'control-label');
                            echo form_label('Status', 'active', $attributes) . PHP_EOL;
                            $options    = array(0 => 'Inaktiv', 1 => 'Aktiv');
                            $active_set = $user->active;
                            echo form_dropdown('active', $options, $active_set) . PHP_EOL;
                            echo '</div>' . PHP_EOL;
                        }
                        ?>
                    </div>


                    <?php echo form_hidden('id', $user->id);?>
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