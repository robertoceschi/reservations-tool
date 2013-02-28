/************************
 Calendar
 *************************/


$(function () {
    //User ID vom zur Zeit aktiven User
    var active_user_id = $('span.active_user').attr('id');
    var is_admin = $('span.is_admin').attr('id');
    if (is_admin == 'admin'){
        var check_state = true;
    }  else {var check_state = false;}


    $('#calendar').fullCalendar
        ({

            timeFormat:'H(:mm)t',
            header:{
                left:'prev,next',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            allDayText:'Ganztägig',
            axisFormat:'HH:mm',
            timeFormat:{
                agenda:''
            },
            monthNames:["Januar", "Februar", "März", "April", "May", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember" ],
            monthNamesShort:['Jan', 'Feb', 'Mär', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dez'],
            dayNames:[ 'Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
            dayNamesShort:['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
            buttonText:{
                today:'heute',
                month:'Monat',
                week:'Woche',
                day:'Tag'
            },
            slotMinutes:60,
            minTime:'6',
            maxTime:'23',
            defaultView:'agendaWeek',


            eventSources:[
                {url:WEBROOT + 'ajax/cal_events', allDayDefault:false}
            ],


            eventDrop:function (event) {
                //darf nur vom User bearbeitet werden der ihn auch erstellt hat
                // if (event.user_id == active_user_id ) {
                $.post(WEBROOT + 'ajax/cal_update', event, function (response) {
                    // success, its ajax so no visible response

                });

                // }
            },


            eventResize:function (event) {
                //darf nur vom User bearbeitet werden der ihn auch erstellt hat

                //if (event.user_id == active_user_id) {

                $.post(WEBROOT + 'ajax/cal_update', event, function (response) {
                    // success, its ajax so no visible response
                });
                //}
            },

            eventRender:function (event, element) {



                // Display pop up for undefined url ye 'false


                if (event.url == undefined) {

                    element.attr('href', 'calendarModal');
                    element.attr('id', event.user_id);
                    element.attr('data-toggle', 'modal');


                    if (event.user_id == active_user_id || event.user_id == 0 || check_state == true) {
                        element.tooltip();

                        element.attr('onclick', 'javascript:openModal("' + event.title + '","' + event.start + '","' + event.end + '" , "' + event.description + '","' + event.id + '","' + event.user_id + '" );');
                    }

                } else {
                    if (event.user_id != active_user_id || event.user_id == 0) {
                        element.draggable = false;
                        element.resizable = false;
                    }
                    // If event.url is defined
                    element.attr('id', event.user_id);
                    element.attr('data-toggle', 'modal');
                    //falls der Event vom zur Zeit aktiven User erstellt wurde wird ein Modal geöffnet (onclick)
                    // if (event.user_id == active_user_id) {

                    element.attr('onclick', 'javascript:openModal_URL("' + event.title + '","' + event.description + '","' + event.url + '","' + event.id + '","' + event.color + '", "' + event.user_id + '" );');
                    // }
                }

            }

        });


});


// Function to OpenModal ['All actions buttons will appear here']
function openModal(title, start, end, info, id, user_id) {
    // Show mode
    $(".modal-body").html('von: ' + start + '<br/>'+  'bis: ' + end);
    $(".modal-header h4").html('Court reservieren/löschen?');
    $("#cal_viewModal").modal('show');

    // Delete button => delete Event
    $(".modal-footer").delegate('[data-option="remove"]', 'click', function (e) {
        remove(id, user_id);
        e.preventDefault();
    });

    // Delete button => delete Reservation
    $(".modal-footer").delegate('[data-option="remove_res"]', 'click', function (e) {
        remove_res(id);
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


function openModal_URL(title, description, url, id, color, user_id) {


    // Show mode
    $(".modal-body").html(description + '<br /><br />' + 'Visit Url: <a href="' + url + '">' + url + '</a> ');
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

            var event_title = $("form#event_title").serialize();
            var event_description = $("form#event_description").serialize();
            var event_url = $("form#event_title").serialize();
            var user_if = e.user_id

            update_url(id, event_title, event_description, event_url, user_id)
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
                alert('Reservation wurde gemacht!');
            } else {
                alert('Es wurde keine Reservation durchgeführt!');
            }
        });
        e.preventDefault();
    });
};

// Function to Remove Event ID from the Database

function remove(id, user_id) {
    var construct = "id=" + id;
    if (user_id != 0) {
        var r = confirm('Wollen sie diesen Event wirklich löschen? ' +
            'Die Reservation wird dadurch gelöscht!');
        if (r == true) {
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
    } else {
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
}





function remove_res(id) {
    var construct = "id=" + id;
    $.post(WEBROOT + 'ajax/delete_reservation', construct, function (response) {
        if (response == '') {
            $("#cal_viewModal").modal('hide');
            alert("Successfully Deleted Reservation");
            document.location.reload();
        } else {
            alert('Failed To Delete Reservation');
        }
    });
}

// Function to Update Event to the Database
function update(id, title, description, user_id) {
    var construct = "id=" + id + "&title=" + title + "&description=" + description + "&user_id=" + user_id;

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

function update_url(id, title, description, url, user_id) {
    var construct = "id=" + id + "&title=" + title + "&description=" + description + "&url=" + url + "&user_id=" + user_id;

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



