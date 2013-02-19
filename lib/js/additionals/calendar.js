/************************
 Calendar
 *************************/
$(function () {
    $('#calendar').fullCalendar
        ({
            timeFormat:'H(:mm)t',
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            slotMinutes:60,
            editable:true,
            // eventSources: [{url:APPPATH + '_includes/cal_events.php', allDayDefault: false}],
            eventSources:[
                {url:WEBROOT + 'ajax/cal_events', allDayDefault:false}
            ],

            eventDrop:function (event) {
                $.post(WEBROOT + 'ajax/cal_update', event, function (response) {
                    // success, its ajax so no visible response
                });
            },
            eventResize:function (event) {
                $.post(WEBROOT + 'ajax/cal_update', event, function (response) {
                    // success, its ajax so no visible response
                });
            },
            eventRender:function (event, element) {
                // Display pop up for undefined url ye 'false'
                if (event.url == undefined) {
                    element.attr('href', 'calendarModal');
                    element.attr('data-toggle', 'modal');
                    element.attr('onclick', 'javascript:openModal("' + event.title + '","' + event.description + '","' + event.id + '");');
                } else {
                    // If event.url is defined
                    element.attr('data-toggle', 'modal');
                    element.attr('onclick', 'javascript:openModal_URL("' + event.title + '","' + event.description + '","' + event.url + '","' + event.id + '","' + event.color + '");');
                }
            }
        });

});

// Function to OpenModal ['All actions buttons will appear here']
function openModal(title, info, id, color) {
    // Show mode
    $(".modal-body").html(info);
    $(".modal-header h4").html(title);
    $("#cal_viewModal").modal('show');

    // Delete button
    $(".modal-footer").delegate('[data-option="remove"]', 'click', function (e) {
        remove(id);
        e.preventDefault();
    });


    // Edit Button
    $(".modal-footer").delegate('[data-option="edit"]', 'click', function (e) {

        $("#cal_viewModal").modal('hide');

        $(".modal-header").html('<form id="event_title"><label>Title: </label>' + '<input type="text" class="input-block-level" name="title_update" value="' + title + '"></form>');

        $(".modal-body").html('<form id="event_description"><label>Description: </label>' + '<textarea class="input-block-level" name="description_update">' + info + '</textarea></form>');

        $("#cal_editModal").modal('show');


        // After all step above save
        // Update button
        $(".modal-footer").delegate('[data-option="save"]', 'click', function (e) {
            //update(id);

            var event_title = $("form#event_title").serialize();
            var event_description = $("form#event_description").serialize();

            update(id, event_title, event_description)
            e.preventDefault();
        });

        e.preventDefault();
    });

};

function openModal_URL(title, description, url, id) {

    // Show mode
    $(".modal-body").html(description + '<br /><br />' + 'Visit Url: <a href="' + url + '">' + url + '</a>');
    $(".modal-header h4").html(title);
    $("#cal_viewModal").modal('show');

    // Delete button
    $(".modal-footer").delegate('[data-option="remove"]', 'click', function (e) {
        remove(id);
        e.preventDefault();
    });

    // Edit Button
    $(".modal-footer").delegate('[data-option="edit"]', 'click', function (e) {

        $("#cal_viewModal").modal('hide');

        $(".modal-header").html('<form id="event_title"><label>Title: </label>' + '<input type="text" class="input-block-level" name="title_update" value="' + title + '"></form>');

        $(".modal-body").html('<form id="event_description"><label>Description: </label>' + '<textarea class="input-block-level" name="description_update">' + description + '</textarea><label>Url: </label>' + '<input type="text" class="input-block-level" name="url_update" value="' + url + '"></form>');

        $("#cal_editModal").modal('show');


        // After all step above save
        // Update button
        $(".modal-footer").delegate('[data-option="save"]', 'click', function (e) {
            //update(id);

            var event_title = $("form#event_title").serialize();
            var event_description = $("form#event_description").serialize();
            var event_url = $("form#event_title").serialize();

            update_url(id, event_title, event_description, event_url)
            e.preventDefault();
        });

        e.preventDefault();
    });

}

// Function to Save Data to the Database 
function save() {
    $("form#add_event").on('submit', function (e) {
        $.post(WEBROOT + 'ajax/cal_save', $(this).serialize(), function (response) {
            if (response == 1) {
                alert('Successfully Added Event');
            } else {
                alert('Failed To Add Event');
            }

        });
        e.preventDefault();
    });
};

// Function to Remove Event ID from the Database
function remove(id) {
    var construct = "id=" + id;

    $.post(WEBROOT + 'ajax/cal_delete', construct, function (response) {
        if (response == '') {
            $("#cal_viewModal").modal('hide');
            alert("Successfully Deleted Event");
            document.location.reload();
        } else {
            alert('Failed To Delete Event');
        }
    });
}

// Function to Update Event to the Database
function update(id, title, description) {
    var construct = "id=" + id + "&title=" + title + "&description=" + description;

    $.post(WEBROOT + 'ajax/cal_edit_update', construct, function (response) {
        if (response == '') {
            $("#cal_editModal").modal('hide');
            alert("Successfully Updated Event");
            document.location.reload();
        } else {
            alert('Failed To Update Event');
        }
    });
}

function update_url(id, title, description, url) {
    var construct = "id=" + id + "&title=" + title + "&description=" + description + "&url=" + url;

    $.post(WEBROOT + 'ajax/cal_edit_update', construct, function (response) {
        if (response == '') {
            $("#cal_editModal").modal('hide');
            alert("Successfully Updated Event");
            document.location.reload();
        } else {
            alert('Failed To Update Event');
        }
    });
}