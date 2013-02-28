<span class="active_user"  id="<?php
    echo $active_user_id;

?>"></span>
<span class="is_admin"  id="<?php
    echo $this->ion_auth->user()->row()->permission_group;

?>"></span>
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="row-fluid">
        <div class="span12">
            <div id="infoMessage"></div>
            <div class="alert alert-success" style="display: none">
                <button class="close">×</button>
                <strong>
                    <div id="successMessage"></div>
                </strong>
            </div>
            <div class="alert alert-error" style="display: none">
                <button class="close"
                <!--data-dismiss="alert"-->>×</button>
                <strong>
                    <div id="errorMessage"></div>
                </strong>
            </div>
            <?php
            $is_admin = $this->ion_auth->user()->row()->permission_group;
            if ($is_admin == 'admin') {
                ?>
                <div id=new_user>
                    <button class="btn btn-large btn-primary"><a
                            href="<?php echo site_url('calendar/create_new_event');?>">
                        <span class="icon icon-plus icon-white"></span> Neuen Termin eintragen</a></button>
                </div>  <?php }  ;?>

            <div class="clearfix"></div>


            <div class="row-fluid">
                <div class="span12">
            <div class="widget-box ">
                <div class="widget-title">
                    <span class="icon"><i class="icon-calendar"></i></span>
                    <h5>Calendar</h5>

                </div>
                <div class="widget-content nopadding">
                        <div id="calendar"></div>
            </div>
                </div>
            </div>


        </div>
    </div>
</div>
</div>



<!-- Modal View Event -->


<div id="cal_viewModal" class="modal hide fade">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4></h4>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        <?php

        if ($this->ion_auth->user()->row()->permission_group == 'admin') { ?>
            <a href="#" class="btn btn-danger" data-option="remove">Delete Event</a><?php };?>
        <a href="#" class="btn btn-danger" data-option="remove_res">Delete Reservation</a>
        <a href="#" class="btn btn-info" data-option="edit">Edit</a>
        <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
</div>

<!-- Modal Edit Event -->
    <div id="cal_editModal" class="modal hide fade">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body"></div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary" data-option="save">Save Changes</a>
            <a href="#" class="btn" data-dismiss="modal">Close</a>
        </div>

