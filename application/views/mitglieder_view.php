<script type="text/javascript">


    $(document).ready(function () {




        //datatables_ajax
        $('#example').dataTable({

            "bProcessing":true,
            "bServerSide":true,
            "sServerMethod":"POST",
            "sAjaxSource":"<?php base_url();?>ajax/getdatabyajax",
            "sPaginationType":"full_numbers"




        });


    });

    //delete User funktioniert noch nicht der click-handler!
    $("#delete_user").mouseover(function () {
        console.log("ready");


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
            } elseif ($this->session->flashdata('user_create') == true or $this->session->flashdata('delete_user') == true ) {
                echo '<div class="alert alert-success">';
                echo '<button class="close" data-dismiss="alert">×</button>';
                echo '<strong><div id="successMessage">' . $message . '</div></strong> ';
                echo '</div>';
            } elseif ($message != '' and $this->session->flashdata('user_create') == false or $this->session->flashdata('delete_user') == false  ) {
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
                            <th width="10%">Rolle</th>
                            <th width="1%">aktiv</th>
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

