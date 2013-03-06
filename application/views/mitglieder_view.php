<!--Main Content-->
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
                     <data-dismiss="alert">×</button>
            <strong>
                <div id="errorMessage"></div>
            </strong>
        </div>
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


