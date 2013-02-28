
<div class="container">
    <?php
    $user_id = $this->ion_auth->user()->row()->id;
    ;?>

    <a href="<?php echo site_url('calendar');?>" class="btn pull-right" style="margin-bottom: 20px;">View Events</a>

    <div class="clearfix"></div>

    <div class="box">
        <div class="header"><h4>Add Event</h4></div>
        <div class="content pad">

            <form id="add_event">

                <!--<label>Title:</label>-->
                <input style="display: none;" type="text" class="validate[required] input-block-level" name="title" placeholder="Event Title" id="title" value="">
                <!--<label>Description:</label> -->
                <textarea style="display: none;" class="input-block-level" name="description" id="description" placeholder="Event Description"></textarea>
                <div class="pull-left mr-10">
                    <label>Start Date:</label>
                    <input type="text" name="start_date" class="validate[required]" id="datepicker">
                </div>
                <div class="pull-left">
                    <label>Start Time:</label>
                    <input type="text" class="input-small" name="start_time" placeholder="HH:MM:SS" id="tp1">
                </div>
                <div class="clearfix"></div>
                <div class="pull-left mr-10">
                    <label>End Date:</label>
                    <input type="text" name="end_date" id="datepicker2">
                </div>
                <div class="pull-left">
                    <label>End Time:</label>
                    <input type="text" class="input-small" name="end_time" placeholder="HH:MM:SS" id="tp2">
                </div>
               <div class="clearfix"></div>
               <!--<label>Event Color:</label>-->
               <input style="display: none;" type="text" class="input-small" name="color" id="cp" value="">
               <!-- <label>Display Time:</label> -->
                <select style="display: none;" name="allDay">
                    <option value="true" selected>Yes</option>
                    <option value="false">No</option>
                </select>
               <!-- <label>Url:</label> -->
                <input style="display: none;" type="text" class="input-block-level" name="url" id="url" placeholder="http://www.domain.com">
                <!--<p class="help-block">Hint: If this event does not have url please leave blank</p> -->
                <!--<label>Court gesperrt:</label>-->
                <select style="display: none;" name="court_closed">
                    <option value="true" >Yes</option>
                    <option value="false" selected>No</option>
                </select>
                <!--<p class="help-block">Hint: Falls der neu kreierte Event eine Courtsperrung ist</p> -->

                <input type="hidden" name="user_id" id="user_id" value="0" />

                <button type="submit" onclick="save()"  class="btn btn-primary pull-right">Add Event</button>

            </form>


    </div>

</div> <!-- /container -->

