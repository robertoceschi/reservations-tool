<div class="container-fluid">
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

            <div id=new_user>
                <button class="btn btn-large btn-primary"><a href="<?php echo site_url('courts/create_court');?>"> <i
                        class=" icon-plus icon-white"></i> Add Event</a></button>
            </div>
            <div class="clearfix"></div>
            <div class="box">
                <div class="header"><h4>Calendar</h4></div>
                <div class="content">
                    <div id="calendar"></div>
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
        <a href="#" class="btn btn-danger" data-option="remove">Delete</a>
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








