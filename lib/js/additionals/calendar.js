/************************
 Calendar
 *************************/


$(function () {
    //User ID vom zur Zeit aktiven User
    var active_user_id = $('span.active_user').attr('id');
    var is_admin = $('span.is_admin').attr('id');
    if (is_admin == 'admin') {
        var check_state = true;
    } else {
        var check_state = false;
    }
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
            slotMinutes:30,
            minTime:'6',
            maxTime:'23',
            defaultView:'agendaWeek',
            editable:true,

            eventSources:[
                {url:WEBROOT + 'ajax/cal_events', allDayDefault:false}
            ],
            eventDrop:function (event) {
                //darf nur vom User bearbeitet werden der ihn auch erstellt hat

                if (is_admin == 'admin') {
                    $.post(WEBROOT + 'ajax/cal_update', event, function (response) {
                        $("#successMessage").html('Event wurde verschoben!');
                        $(".alert-success").show();

                    });
                }
            },
            eventResize:function (event) {
                //darf nur vom User bearbeitet werden der ihn auch erstellt hat

                //if (event.user_id == active_user_id) {
                if (is_admin == 'admin') {
                    $.post(WEBROOT + 'ajax/cal_update', event, function (response) {
                        $("#successMessage").html('Eventdauer wurde verändert!');
                        $(".alert-success").show();
                    });
                }
                //}
            },
            eventRender:function (event, element) {
                // Display pop up for undefined url ye 'false
                element.attr('href', 'calendarModal');
                element.attr('id', event.user_id);
                element.attr('data-toggle', 'modal');

                if (event.user_id == 0) {
                    element.tooltip();
                    element.attr('onclick', 'javascript:openModal_new_res("' + event.start + '","' + event.end + '","' + event.id + '","' + event.user_id + '" );');
                } else if (event.user_id == active_user_id || check_state == true) {
                    element.tooltip();
                    element.attr('onclick', 'javascript:openModal_delete_res("' + event.start + '","' + event.end + '","' + event.id + '","' + event.user_id + '" );');

                }

                //draggable and resizable custom einstellungen
                if (check_state == false) {
                    element.draggable = false;
                    element.resizable = false;
                }
                if (check_state == false) {
                    $('.ui-resizable-s').css('display', 'none');
                }
            }
        });
    //error Message wird mit click() geschlossen!!
    $('.close').click(function () {
        $('.alert').hide();
    })
});


function openModal_new_res(start, end, id, user_id) {

    $(".modal-header h4").html('reservieren / Event löschen');
    $(".modal-body ").html('Event von ' + start.slice(16, 21) + ' bis ' + end.slice(16, 21) + ' Uhr reservieren / oder Event ganz löschen?');
    $("#cal_resModal").modal('show');

    $(".modal-footer").delegate('[data-option="save"]', 'click', function (e) {
        update(id, user_id);
        e.preventDefault();
    });

    //ganzen Timeslot (Event) löschen
    $(".modal-footer").delegate('[data-option="remove"]', 'click', function (e) {
        remove(id);
        e.preventDefault();
    });
}


function openModal_delete_res(start, end, id, user_id) {
    $(".modal-header h4").html('löschen');
    $(".modal-body").html('Reservation von  ' + start.slice(16, 21) + ' bis ' + end.slice(16, 21) + ' Uhr wieder löschen?');
    $("#cal_viewModal").modal('show');

    //Reservation löschen
    $(".modal-footer").delegate('[data-option="remove_res"]', 'click', function (e) {
        remove_res(id);

        e.preventDefault();
    });

    //ganzen Timeslot (Event) löschen
    $(".modal-footer").delegate('[data-option="remove"]', 'click', function (e) {
        remove(id);
        e.preventDefault();
    });

}


// Function to Save Data to the Database
function save() {
    $("form#add_event").on('submit', function (e) {
        $.post(WEBROOT + 'ajax/cal_save', $(this).serialize(), function (response) {
            if (response == 1) {

                $("#successMessage").html('Event wurde erstellt!');
                $(".alert-success").show();
                setTimeout(function () {
                    location.href = WEBROOT + 'reservation';
                }, 2000);
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
                    $("#successMessage").html('Event wurde gelöscht');
                    $(".alert-success").show();
                    setTimeout(function () {
                        document.location.reload();
                    }, 2000);
                } else {
                    alert('Failed To Delete Event');
                }
            });
        }
    }
}

function remove_res(id) {
    var construct = "id=" + id;
    $.post(WEBROOT + 'ajax/delete_reservation', construct, function (response) {
        if (response == '') {
            $("#cal_viewModal").modal('hide');
            $("#successMessage").html('Reservation wurde gelöscht');
            $(".alert-success").show();
            setTimeout(function () {
                document.location.reload();
            }, 2000);



        } else {
            alert('Failed To Delete Reservation');
        }
    });
}

// Function to Update Event to the Database
function update(id, user_id) {
    var construct = "id=" + id + "&user_id=" + user_id;

    $.post(WEBROOT + 'ajax/cal_edit_update', construct, function (response) {
        if (response == '') {
            $("#cal_editModal").modal('hide');
            alert("Reservation wurde vorgenommen!");
            document.location.reload();
        } else {
            alert('Failed To Update Event');
        }
    });
}

