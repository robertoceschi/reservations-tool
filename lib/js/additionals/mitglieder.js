$(document).ready(function () {
    //datatables_ajax
    $('#example').dataTable({
        "sDom":"<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
        "sWrapper":"dataTables_wrapper form-inline",
        "bProcessing":true,
        "bServerSide":true,
        "sServerMethod":"POST",
        "sAjaxSource":WEBROOT+ "/ajax/getdatabyajax",
        "sPaginationType":"bootstrap",
        "aoColumnDefs":[
            { "bSortable":false, "aTargets":[5, 6] }
        ],
        "aLengthMenu":[
            [10, 25, 50, -1],
            [10, 25, 50, "alle"]
        ],
        "oLanguage":{
            "sProcessing":"Bitte warten...",
            "sLengthMenu":"_MENU_ Einträge anzeigen",
            "sZeroRecords":"Keine Einträge vorhanden.",
            "sInfo":"_START_ bis _END_ von _TOTAL_ Einträgen",
            "sInfoEmpty":"0 bis 0 von 0 Einträgen",
            "sInfoFiltered":"(gefiltert von _MAX_  Einträgen)",
            "sInfoPostFix":"",
            "sSearch":"Suchen",
            "sUrl":"",
            "oPaginate":{
                "sFirst":"erste Seite",
                "sPrevious":"zurück",
                "sNext":"nächste Seite",
                "sLast":"letzte Seite"
            }
        },
        "fnRowCallback":function (nRow, aData, iDisplayIndex) {
            if (aData[3] == "admin") {
                $('td:eq(3)', nRow).html('Administrator');
            }
            if (aData[3] == "members") {
                $('td:eq(3)', nRow).html('Mitglieder');
            }
            if (aData[4] == 1) {
                $('td:eq(4)', nRow).html('Aktiv');
            }
            if (aData[4] == 0) {
                $('td:eq(4)', nRow).html('Inaktiv');
            }
            if (aData[4] == 1) {
                $('td:eq(4)', nRow).addClass('toggleStatus inaktiv').attr("id", aData[0]).css('cursor', 'pointer').attr('title', aData[1] + ' ' + aData[2]);
            }
            if (aData[4] == 0) {
                $('td:eq(4)', nRow).addClass('toggleStatus aktiv').attr("id", aData[0]).css('cursor', 'pointer').attr('title', aData[1] + ' ' + aData[2]);
            }
        }
    });
    //user löschen

    $('#example').on('click', '.delete_user', function () {

        reference = $(this);
        var user_id = $(this).attr('id');
        var user_name = $(this).attr('title');
        var text_body = 'Sind sie sicher dass sie ' + user_name + ' löschen wollen?';
        $('#deleteModal').modal('show');
        $('.modal-body').text(text_body);
        $('button#confirm').unbind();
        $('button#confirm').click(function () {
            $('#deleteModal').modal('hide');
            var I = reference.attr("id");
            $.ajax({
                url:WEBROOT + "ajax/delete_user/" + I,
                type:"post",
                data:'id=' + I,
                dataType:'json',
                success:function (json) {
                    if (json.status == "success") {
                        reference.parent().parent().remove();
                        $("#successMessage").html(json.message);
                        $(".alert-success").show();
                    }
                    else {
                        $("#errorMessage").html(json.message);
                        $(".alert-error").show();
                    }
                }
            });
        });
    });
    $('#example').on('click', '.toggleStatus', function () {

        //Mitglied deaktivieren
        if ($(this).hasClass('inaktiv')) {
            reference = $(this);
            var user_id = $(this).attr('id');
            var user_name = $(this).attr('title');
            var text_body_deact = 'Sind sie sicher dass sie ' + user_name + ' deaktivieren wollen?';
            $('#deactivateModal').modal('show', user_id);
            $('.modal-body').text(text_body_deact);
            $('button#confirm').unbind();
            $('button#confirm').click(function (e) {
                $('#deactivateModal').modal('hide');
                //console.log('delete: ' + $(reference).attr('id'));
                var I = reference.attr("id");
                $.ajax({
                    url:WEBROOT + "ajax/deactivate/" + I,
                    type:"post",
                    data:'id=' + I,
                    dataType:'json',
                    success:function (json) {
                        if (json.status == "success") {
                            //reference.toggleClass('aktiv');
                            reference.removeClass('inaktiv');
                            reference.addClass('aktiv');
                            reference.empty();
                            reference.append('Inaktiv');
                            $("#successMessage").html(json.message);
                            $(".alert-success").show();
                        }
                        else {
                            $("#errorMessage").html(json.message);
                            $(".alert-error").show();
                        }
                    }
                });
            });
        } else {

            //Mitglied aktivieren
            reference = $(this);
            var user_id = $(this).attr('id');
            var user_name = $(this).attr('title');
            var text_body_activate = 'Sind sie sicher dass sie ' + user_name + ' aktivieren wollen?';
            $('#activateModal').modal('show');
            $('.modal-body').text(text_body_activate);
            $('button#confirm').unbind();
            $('button#confirm').click(function (e) {
                $('#activateModal').modal('hide');
                var I = reference.attr("id");
                $.ajax({
                    url:WEBROOT + "ajax/activate/" + I,
                    type:"post",
                    data:'id=' + I,
                    dataType:'json',
                    success:function (json) {
                        if (json.status == "success") {
                            //reference.toggleClass('aktiv');
                            reference.removeClass('aktiv');
                            reference.addClass('inaktiv');
                            reference.empty();
                            reference.append('Aktiv');
                            $("#successMessage").html(json.message);
                            $(".alert-success").show();
                        }
                        else {
                            $("#errorMessage").html(json.message);
                            $(".alert-error").show();
                        }
                    }
                });
            });
        }
    });
    //error Message wird mit click() geschlossen!!
    $('.close').click(function () {
        $('.alert').hide();
    })
});