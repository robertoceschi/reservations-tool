<script type="text/javascript" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
        xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

    $(document).ready(function () {

        $('.datepicker').datepicker()
        $('.timepicker-default').timepicker();

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
                        echo form_label('Court-Name', 'court', $attributes); ?>
                        <div class="controls">
                            <?php
                            $attributes = array('name' => 'court_name',
                                                'id'     => 'court_name');
                            echo form_input($attributes) . PHP_EOL;
                            ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php
                        $attributes = array(
                            'label class' => 'control-label',);
                        echo form_label('Kategorie', 'category', $attributes); ?>
                        <div class="controls">
                            <?php
                            $attributes = array('1' => 'Tennis',
                                                '2' => 'Squash');
                            echo form_dropdown('category_id', $attributes) . PHP_EOL;
                            ?>
                        </div>
                    </div>
                    <div class="control-group">
                        <?php
                    $attributes = array(
                        'label class' => 'control-label');
                    echo form_label('Saison', 'saison', $attributes) . PHP_EOL;?>
                    <div class="controls_saison">
                        <div class="input-append date datepicker" data-date=""
                             data-date-format="yyyy-mm-dd">
                            <input class="span2" size="16" type="text" name="saison_start" value=""
                                   placeholder="Saisonstart">
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div><span style="">Bitte Saisonstart und Saisonende eingeben </span>
                        </br>
                        <div class="input-append date datepicker" data-date=""
                             data-date-format="yyyy-mm-dd">
                            <input class="span2" size="16" type="text" name="saison_end" value=""
                                   placeholder="Saisonende">
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                    </div>

                            <div class="control-group">
                        <?php
                    $attributes = array(
                        'label class' => 'control-label',);
                    echo form_label('Spielzeit 1', 'duration1', $attributes) . PHP_EOL;?>
                    <div class="controls_day">
                            <?php $options = array('' => 'erster Spieltag', 'mon' => 'Montag', 'tu' => 'Dienstag', 'wed' => 'Mittwoch', 'thu' => 'Donnerstag', 'fri' => 'Freitag', 'sat' => 'Samstag', 'sun' => 'Sonntag');
                            echo form_dropdown('weekday1_start', $options) . PHP_EOL;?></br>
                        <?php $options = array('' => 'letzter Spieltag', 'mon' => 'Montag', 'tu' => 'Dienstag', 'wed' => 'Mittwoch', 'thu' => 'Donnerstag', 'fri' => 'Freitag', 'sat' => 'Samstag', 'sun' => 'Sonntag');
                        echo form_dropdown('weekday1_end', $options) . PHP_EOL;?>
                    </div>
                    <div class="controls_spielstunden">
                        <div class="input-append bootstrap-timepicker-component">
                            <input type="text" class="timepicker-default input-small" name="slot_time1_start"
                                   placeholder="Spielbeginn">
    <span class="add-on">
        <i class="icon-time"></i>
    </span>
                        </div>
                        </br>
                        <div class="input-append bootstrap-timepicker-component " style="margin-top: 8px">
                            <input type="text" class="timepicker-default input-small" name="slot_time1_end"
                                   placeholder="Spielende">
    <span class="add-on">
        <i class="icon-time"></i>
    </span>
                        </div>
                    </div>
                <div class="control-group">
                        <?php
                    $attributes = array(
                        'label class' => 'control-label',);
                    echo form_label('Spielzeit 2', 'duration', $attributes) . PHP_EOL;?>
                    <div class="controls_day">
                            <?php $options = array('' => 'erster Spieltag', 'mon' => 'Montag', 'tu' => 'Dienstag', 'wed' => 'Mittwoch', 'thu' => 'Donnerstag', 'fri' => 'Freitag', 'sat' => 'Samstag', 'sun' => 'Sonntag');
                            echo form_dropdown('weekday2_start', $options) . PHP_EOL;?></br>
                        <?php $options = array('' => 'letzter Spieltag', 'mon' => 'Montag', 'tu' => 'Dienstag', 'wed' => 'Mittwoch', 'thu' => 'Donnerstag', 'fri' => 'Freitag', 'sat' => 'Samstag', 'sun' => 'Sonntag');
                        echo form_dropdown('weekday2_end', $options) . PHP_EOL;?>
                    </div>




                    <div class="controls_spielstunden">
                        <div class="input-append bootstrap-timepicker-component">
                            <input type="text" class="timepicker-default input-small" name="slot_time2_start"
                                   placeholder="Spielstart">
    <span class="add-on">
        <i class="icon-time"></i>
    </span>
                        </div>
                        </br>
                        <div class="input-append bootstrap-timepicker-component" style="margin-top: 8px">
                            <input type="text" class="timepicker-default input-small" name="slot_time2_end"
                                   placeholder="Spielende">
    <span class="add-on">
        <i class="icon-time"></i>
    </span>
                        </div>
                    </div> </div>
                    <?php
                    // echo form_fieldset() . PHP_EOL;

                    echo '<div class="control-group">';
                    echo '<div>' . PHP_EOL;
                    $attributes = array(
                        'label class' => 'control-label');
                    echo form_label('Status', 'court_status', $attributes) . PHP_EOL;
                    echo '<div class="controls">';?>
                    <input type="radio" name="court_status" value="1"
                           style="opacity: 1 !important;"/>Aktiv </br>
                    <input type="radio" name="court_status" value="0"
                           style="opacity: 1 !important;"/>Inaktiv
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
        </div>



                <script src="<?php echo base_url() . 'lib/js/additionals/bootstrap-datepicker.js"></script> ';?>
    <script src="<?php echo base_url() . 'lib/js/additionals/bootstrap-timepicker.js"></script> ';?>

