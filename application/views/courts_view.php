

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
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
                <button class="btn btn-large btn-primary"><a href="<?php echo site_url('courts/create_court');?>"> <i
                        class=" icon-plus icon-white"></i> Neuen Court erstellen</a></button>
            </div>


            <table class="table table-bordered" class="pagination">
                <thead>
                <tr>
                    <th>Court-Name</th>

                </tr>
                </thead>


                <?php
                //foreach ($users as $user):

                    echo '<tbody>';
                    echo '<tr class="remove">
                    <td>'?></td>
                    <td>Court 1</td>
                    <td>Konfigurien</td>
                    <td>löschen</td>

                </tbody>
            </table>

        </div>
    </div>
</div>










