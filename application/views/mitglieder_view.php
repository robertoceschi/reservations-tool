
<script type="text/javascript">
    $(document).ready(function () {
        //datatables_ajax
        $('#example').dataTable({
            "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            "sWrapper": "dataTables_wrapper form-inline",
            "bProcessing":true,
            "bServerSide":true,
            "sServerMethod":"POST",
            "sAjaxSource":"<?php base_url();?>ajax/getdatabyajax",
            "sPaginationType": "bootstrap",
            "aoColumnDefs":[
                { "bSortable":false, "aTargets":[5, 6] }
            ],
            "aLengthMenu":[
                [10, 25, 50, -1],
                [10, 25, 50, "alle"]
            ],
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
        $('#example').on('click','.delete_user', function () {

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
        $('#example').on('click','.toggleStatus',  function () {
            //deaktivieren
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
                //aktivieren
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
</script>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div id="infoMessage"><?php
                $message = $this->session->flashdata('message');
                ;?></div>

            <?php
            if ($message == '') {
            } elseif ($this->session->flashdata('user_create') == true or $this->session->flashdata('delete_user') == true) {
                echo '<div class="alert alert-success">';
                echo '<button class="close" data-dismiss="alert">×</button>';
                echo '<strong><div id="successMessage">' . $message . '</div></strong> ';
                echo '</div>';
            } elseif ($message != '' and $this->session->flashdata('user_create') == false or $this->session->flashdata('delete_user') == false) {
                echo '<div class="alert alert-error">';
                echo '<button class="close" data-dismiss="alert">×</button> ';
                echo '<strong><div id="errorMessage">' . $message . '</div>  </strong>';
                echo '</div>';
            }
            ?>

            <!--<div class="alert alert-success" style="display: none">
                     <button class="close">×</button>
                     <strong>
                         <div id="successMessage"></div>
                     </strong>
                 </div>
                 <div class="alert alert-error" style="display: none">
                     <button class="close"
                     <data-dismiss="alert">×</button>
            <strong>
                <div id="errorMessage"></div>
            </strong>
        </div>-->
            <div id=new_user>
                <a href="<?php echo site_url('mitglieder/create_user');?>">
                    <span class="icon icon-plus icon-white"></span> Neues Mitglied eintragen</a>
            </div>


            <div class="widget-box-mitglieder">

                <div class="widget-content nopadding">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                        <tr>
                            <th width="1%"  >Id</th>
                            <th >Vorname</th>
                            <th >Nachname</th>
                            <th >Rolle</th>
                            <th >Status</th>
                            <th width="1%" >Delete</th>
                            <th width="1%" >Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="dataTables_empty">Loading data from server</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <!-- delete-Modal -->

    <div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Mitglied löschen</h3>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
            <button id="confirm" class="btn btn-primary">Ja</button>
            <button id="cancel" class="btn" data-dismiss="modal" aria-hidden="true">Nein, nicht löschen</button>
        </div>
    </div>

    <!-- deactivate-Modal -->
    <div id="deactivateModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Status deaktivieren</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <button id="confirm" class="btn btn-primary">Ja</button>
            <button id="cancel" class="btn" data-dismiss="modal" aria-hidden="true">Nein, nicht deaktivieren</button>
        </div>
    </div>

    <!-- activate-Modal -->
    <div id="activateModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Status aktivieren</h3>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <button id="confirm" class="btn btn-primary">Ja</button>
            <button id="cancel" class="btn" data-dismiss="modal" aria-hidden="true">Nein, nicht aktivieren</button>
        </div>
    </div>




