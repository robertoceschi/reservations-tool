<script type="text/javascript">

    $(document).ready(function () {

    });
</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">

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
                    ;?>
                     <div class="widget-content nopadding">
                    <?php
                    $attributes = array('class' => 'form-horizontal');
                    echo form_open("courts/create_court", $attributes);?>
                    <div class="control-group">
                        <?php
                        $attributes = array(
                            'label class' => 'control-label',);
                        echo form_label('Kategorie', 'category_name', $attributes); ?>
                        <div class="controls">
                            <?php
                            $attributes = array('name' => 'category_name',
                                                'id'   => 'category_name');
                            echo form_input($attributes, set_value('category_name', $category_name['value'])) . PHP_EOL;
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

                        echo '<div class="control-group">';
                        echo '<div>' . PHP_EOL;
                        $attributes = array(
                            'label class' => 'control-label');
                        echo form_label('Status', 'court_status', $attributes) . PHP_EOL;
                        echo '<div class="controls">';?>
                        <input type="radio" name="court_status" value="1"
                               style="opacity: 1 !important;"  />Aktiv </br>
                        <input type="radio" name="court_status" value="0"
                               style="opacity: 1 !important;"  />Inaktiv
                        <?php echo '</div></div>' . PHP_EOL;
                        echo '</div>';
                    } ?>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" data-loading-text="Sending...">
                            <!--<i class="icon-refresh icon-white"></i>--> Court speichern
                        </button>
                    </div>
                    <?php echo form_close(); ?>
            </div>
            </div>
        </div>
    </div>
