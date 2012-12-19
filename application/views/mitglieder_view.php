<div class="container-fluid">
    <div class="row-fluid">
        <?php
        $group = $this->ion_auth->user()->row()->group;
        if ($group == 'admin') {
            //echo '<h2>Overview Users</h2>';
            //echo '<h5>below a list with all users</h5>';

            //echo '<div id="infoMessage">'. $message . ' </div>'. PHP_EOL;

            echo '<table cellpadding=0 cellspacing=10>' . PHP_EOL;
            echo    '<tr>' . PHP_EOL;
            echo      '<th>First Name</th>' . PHP_EOL;
            echo     '<th>Last Name</th> ' . PHP_EOL;
            echo    '<th>Email</th>' . PHP_EOL;
            echo    '<th>Groups</th>' . PHP_EOL;
            /*echo    '<th>Status</th>' . PHP_EOL;*/
            echo   '<th>Action</th>' . PHP_EOL;
            echo '</tr>' . PHP_EOL;?>
            <?php  foreach ($users as $user):
                echo '<tr>
                    <td>'?><?php echo $user->first_name;?></td>
                <td><?php echo $user->last_name;?></td>
                <td><?php echo $user->email;?></td>
                <td><?php echo $user->group;?></td>
                <td><?php

                if($user->active) { echo '<a href="#modal" ' . $user->id  . 'data-toggle="modal">Aktiv</a>';}else { ?>
                <a href="#modal" data-toggle="modal" >Inaktiv</a> <?php
            }?></td>




                <td><?php echo anchor("mitglieder/edit_user/" . $user->id, 'Edit');?></td>
                </tr>
                <?php endforeach; ?>
            </table>



             <!--Modal Box-->
            <div id="modal" class="modal hide fade in" style="display: none; ">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>This is a Modal Heading</h3>
                </div>
                <div class="modal-body">
                    <h4>Text in a modal</h4>
                    <p>You can add some text here.</p>
                </div>
                <div class="modal-footer">
                    <?php

                    if ($user->active) {
                        echo 'user aktiv' ;
                    //echo   '<a href=" ' . base_url() . '/mitglieder/deactivate/' . $user->id . '"' . 'class="btn btn-success">deaktivieren</a>';
                }else{
                    echo 'inaktiv';
                    //echo   '<a href=" ' . base_url() . '/mitglieder/activate/' . $user->id . '"' . 'class="btn btn-success">aktivieren</a>'




                    ;}?>




                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>


            <p><a href="<?php echo site_url('mitglieder/create_user');?>">Create a new user</a>
            <?php
        } ?>
    </div>
    <div class="row-fluid">

    </div>