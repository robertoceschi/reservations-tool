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
                <button class="btn btn-large btn-primary"><a href="<?php echo site_url('calendar/create_new_event');?>">
                    <span class="icon icon-plus icon-white"></span> Neuen Termin eintragen</a></button>
            </div>

            <div class="clearfix"></div>
            <div class="widget-box widget-calendar">
                <div class="widget-title">
                    <span class="icon"><i class="icon-calendar"></i></span>
                    <h5>Calendar</h5>
                    <div class="buttons">
                        <a id="add-event" data-toggle="modal" href="#modal-add-event" class="btn btn-success btn-mini"><i class="icon-plus icon-white"></i> Add new event</a>
                        <div class="modal hide" id="modal-add-event">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">×</button>
                                <h3>Add a new event</h3>
                            </div>
                            <div class="modal-body">
                                <p>Enter event name:</p>
                                <p><input id="event-name" type="text" /></p>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                                <a href="#" id="add-event-submit" class="btn btn-primary">Add event</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-content nopadding">
                    <div class="panel-left">
                        <div id="calendar"></div>
                    </div>
                    <div id="external-events" class="panel-right">
                        <div class="panel-title"><h5>Events</h5></div>
                        <div class="panel-content">
                            <div class="external-event ui-draggable label label-inverse">My Event 1</div>
                            <div class="external-event ui-draggable label label-inverse">My Event 2</div>
                            <div class="external-event ui-draggable label label-inverse">My Event 3</div>
                            <div class="external-event ui-draggable label label-inverse">My Event 4</div>
                            <div class="external-event ui-draggable label label-inverse">My Event 5</div>
                        </div>
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








