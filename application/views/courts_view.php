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
                    <th>Kategorie</th>
                    <th>Platzname</th>
                    <th>Saison</th>
                    <th>Court Status</th>
                </tr>
                </thead>


                <?php
                foreach ($courts as $court):

                    echo '<tbody>';
                    echo '<tr class="remove">
                    <td>'?><?php
                    echo '<div class="control-group">';
                    echo '<div>' . PHP_EOL;
                    $attributes = array(
                        'label class' => 'control-label');
                    echo form_label('Kategorie', 'active', $attributes) . PHP_EOL;
                    echo '<div class="controls">';?>
                    <input type="radio" name="active" value="1"
                           style="opacity: 1 !important;"  />Tennis </br>
                    <input type="radio" name="active" value="0"
                           style="opacity: 1 !important;"  />Squash
                    <?php echo '</div></div>' . PHP_EOL;
                    echo '</div>';
                 ;?></td>
                    <td><?php echo $court->court_name;?></td>
                    <td><?php echo '';?></td>
                    <td><?php echo $court->court_status;?></td>

                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>










