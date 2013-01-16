<script type="text/javascript">
    $(document).ready(function () {
        //$("#success").hide();
        //$("#error").hide();
        //status ändern inaktiv->aktiv->inaktiv
        $('.toggleStatus ').click(function () {
            //deaktivieren
            if ($(this).hasClass('inaktiv')) {
                reference = $(this);
                //var user_id = $(this).attr('id');
                var user_name = $(this).attr('title');
                var r = confirm('Sie wollen' + user_name + 'deaktivieren?');
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
                var r = confirm('Sie wollen' + user_name + 'aktivieren?');
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


        //delete User
        $('.delete_user').click(function () {
            reference = $(this);
            //var user_id = $(this).attr('id');
            var user_name = $(this).attr('title');
            var r = confirm('Sie wollen ' + user_name + '');
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
                            reference.parent().parent().parent().remove();
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
        //datatables_ajax
        $('#example').dataTable({
            "bProcessing":true,
            "bServerSide":true,
            "aoColumns" : [{"bSearchable": true}, {"bSearchable": true}, {"bSearchable": false}, {"bSearchable": false}, {"bSearchable": false}, {"bSearchable": false} ],
            "sServerMethod":"POST"  ,
            "sAjaxSource":"<?php base_url();?>ajax/getdatabyajax"
        });


    });
</script>




<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div id="infoMessage"><?php
                $message = $this->session->flashdata('message');
                //echo $message;?></div>

            <?php
            if ($message == '') {
            } elseif ($this->session->flashdata('user_create') == true) {
                echo '<div class="alert alert-success">';
                echo '<button class="close" data-dismiss="alert">×</button>';
                echo '<strong><div id="successMessage">' . $message . '</div></strong> ';
                echo '</div>';
            } elseif ($message != '' and $this->session->flashdata('user_create') == false) {
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
                <button class="btn btn-large btn-primary"><a href="<?php echo site_url('mitglieder/create_user');?>"> <span class="icon icon-plus icon-white"></span> Neues Mitglied eintragen</a></button>
            </div>


            <div class="widget-box">
                <div class="widget-title">


                </div>

                <div class="widget-content nopadding">
                    <!--<div id="dynamic"> -->
                    <!--<table class="table table-bordered data-table" id="example">-->
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <!--<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">-->
                        <thead>
                        <tr>
                            <!--<th width="20%">id</th> -->
                            <th width="20%">Vorname</th>
                            <th width="20%">Nachname</th>
                            <th width="10%">group</th>
                            <th width="2%">active</th>
                            <th width="2%">Delete</th>
                            <th width="2%">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
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
