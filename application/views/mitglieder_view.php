<script type="text/javascript">


    $(document).ready(function () {
        //datatables_ajax
        $('#example').dataTable({
            "bProcessing":true,
            "bServerSide":true,
            "sServerMethod":"POST",
            "sAjaxSource":"<?php base_url();?>ajax/getdatabyajax",
            "sPaginationType":"full_numbers",
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


        $(document).delegate('.delete_user', 'click', function () {
            reference = $(this);
            console.log(reference);
            var user_id = $(this).attr('id');
            var user_name = $(this).attr('title');
            var r = confirm(user_name + ' löschen?');
            if (r == true) {
                var element = $(this);
                var I = element.attr("id");
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
            }


        });

        $(document).delegate('.toggleStatus', 'click', function () {
            //deaktivieren
            if ($(this).hasClass('inaktiv')) {
                reference = $(this);
                var user_id = $(this).attr('id');
                var user_name = $(this).attr('title');
                var r = confirm(user_name + ' deaktivieren?');
                if (r == true) {
                    var element = $(this);
                    var I = element.attr("id");
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
                                //$('.close').click(function() {
                                //alert('klasse aktiv');


                                //});
                            }

                            else {
                                $("#errorMessage").html(json.message);
                                $(".alert-error").show();
                            }
                        }
                    });
                }
            } else {
                //aktivieren
                reference = $(this);
                var user_id = $(this).attr('id');
                var user_name = $(this).attr('title');
                var r = confirm(user_name + ' aktivieren?');
                if (r == true) {
                    var element = $(this);
                    var I = element.attr("id");
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
                                //$('.close').click(function() {
                                //alert('klasse inaktiv');

                                //});

                            }
                            else {
                                $("#errorMessage").html(json.message);
                                $(".alert-error").show();
                            }
                        }
                    });
                }
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
                <button class="btn btn-large btn-primary"><a href="<?php echo site_url('mitglieder/create_user');?>">
                    <span class="icon icon-plus icon-white"></span> Neues Mitglied eintragen</a></button>
            </div>


            <div class="widget-box">
                <div class="widget-title">


                </div>

                <div class="widget-content nopadding">
                    <!--<div id="dynamic"> -->
                    <!--<table class="table table-bordered data-table" id="example">-->
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered"
                           id="example">
                        <!--<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">-->
                        <thead>
                        <tr>
                            <th width="1%">Id</th>
                            <th width="10%">Vorname</th>
                            <th width="10%">Nachname</th>
                            <th width="5%">Rolle</th>
                            <th width="3%">Status</th>
                            <th width="1%">Delete</th>
                            <th width="1%">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <td class="admin"></td>

                        <tr>
                            <td colspan="5" class="dataTables_empty">Loading data from server</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
</body>
</html>
