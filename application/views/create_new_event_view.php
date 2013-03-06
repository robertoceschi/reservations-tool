<?php
    $user_id = $this->ion_auth->user()->row()->id;
    ;?>
 <div class="container-fluid">
     <div class="row-fluid">
         <div class="span12">
             <div class="alert alert-success" style="display: none; margin-top: 20px;">
                 <button class="close">×</button>
                 <strong>
                     <div id="successMessage"></div>
                 </strong>
             </div>
             <div class="alert alert-error" style="display: none; margin-top: 20px;">
                 <button class="close"
                 <!--data-dismiss="alert"-->>×</button>
                 <strong>
                     <div id="errorMessage"></div>
                 </strong>
             </div>

             <div class="widget-box">
                 <div class="widget-title">
								<span class="icon">
									<i class="icon-user "></i>
								</span>
                     <h5>New Event</h5>
                 </div>

                 <div class="widget-content nopadding">
                     <?php
                     $attributes = array('class' => 'form-horizontal',
                                         'id'    => 'add_event');
                     echo form_open("", $attributes);?>


                     <div class="control-group">
                         <?php
                         $attributes = array(
                             'label class' => 'control-label',);
                         echo form_label('Start Date:', 'start_date', $attributes); ?>


                         <div class="controls">
                             <?php
                             $attributes = array('name' => 'start_date',
                                                 'id'   => 'datepicker',
                                                 'placeholder' => 'Startdatum angeben');
                             echo form_input($attributes, set_value('start_date')) . PHP_EOL;
                             ?>
                         </div>
                         <?php
                         $attributes = array(
                             'label class' => 'control-label',);
                         echo form_label('Start Time:', 'start_time', $attributes); ?>
                         <div class="controls">
                             <?php
                             $attributes = array('name'        => 'start_time',
                                                 'id'          => 'tp1',
                                                 'placeholder' => 'HH:MM:SS');
                             echo form_input($attributes, set_value('start_time')) . PHP_EOL;
                             ?>
                         </div>
                     </div>
                     <div class="control-group">
                         <?php
                         $attributes = array(
                             'label class' => 'control-label',);
                         echo form_label('End Date:', 'end_date', $attributes); ?>


                         <div class="controls">
                             <?php
                             $attributes = array('name' => 'end_date',
                                                 'id'   => 'datepicker2',
                                                 'placeholder' => 'Endatum angeben');
                             echo form_input($attributes, set_value('end_date')) . PHP_EOL;
                             ?>
                         </div>


                         <?php
                         $attributes = array(
                             'label class' => 'control-label',);
                         echo form_label('End Time:', 'end_time', $attributes); ?>

                         <div class="controls">
                             <?php
                             $attributes = array('name'        => 'end_time',
                                                 'id'          => 'tp2',
                                                 'placeholder' => 'HH:MM:SS');
                             echo form_input($attributes, set_value('end_time')) . PHP_EOL;
                             ?>

                         </div>
                     </div>

                     <input type="hidden" name="user_id" id="user_id" value="0"/>

                     <div class="form-actions">
                     <button type="submit" onclick="save()" class="btn btn-primary pull-right">Add Event</button>
                         <a href="<?php echo site_url('reservation');?>" class="btn btn-success pull-right" style="margin-top: 5px;
margin-right: 20px;">View Events</a>
                     </div>
                     <?php echo form_close(); ?>
                 </div>
             </div>
         </div>
     </div>
