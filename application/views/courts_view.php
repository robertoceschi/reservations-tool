<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div id="infoMessage"></div>
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

            <div class="widget-box">
                <div class="widget-title">


                </div>
                <div class="widget-content nopadding">

                    <table class="table table-bordered" class="pagination">
                        <thead>
                        <tr>
                            <th>Kategorie</th>
                            <th>Platzname</th>
                            <th>Saison</th>
                            <th>Court Status</th>
                            <th>Bearbeitung</th>
                        </tr>
                        </thead>
                        <?php
                        foreach ($courts as $court):
                            echo '<tbody>';
                            if ($court->category_id == 1) {
                                $category = 'Tennis';
                            } else {
                                $category = 'Squash';
                            }
                            echo '<td>' . $category . '</td>';
                            ?>
                            <td><?php echo $court->court_name;?></td>
                            <td><?php echo '';?></td>
                            <?php
                            if ($court->court_status == 1) {
                                $status = 'Aktiv';
                            } else {
                                $status = 'Inaktiv';
                            }
                            echo '<td>' . $status . '</td>';
                            ?>
                            <td><?php echo anchor("courts/edit_court/" , '<i class=" icon-edit"></i>');?>      | <?php
                                echo '<span style="cursor:pointer"><a class="delete_user" id= ""><i class=" icon-trash"></i> </a></span> ';?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>







