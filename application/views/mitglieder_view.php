<script type="text/javascript">
    //user ist aktiv und soll inaktiv geschalten werden
    function modalfunktion_deact($user_id) {
        //var x;
        var r = confirm('Sie wollen den User ' + $user_id + ' deaktivieren?');
        if (r == true) {

            $.ajax({
                url:WEBROOT + "ajax/deactivate/" + $user_id,
                type:"post",
                data:'id=' + $user_id,
                dataType:'json',
                success:function (data,status) {
                    if (data.status == "success") {
                        alert(data.msg);
                        $(this).val('background-color', 'red');
                    }
                    else {
                        showMessage(json.message, 'error');
                    }
                }
            });
        }
    }

    //user ist deaktiv
    function modalfunktion_act($user_id) {
        //var x;
        var r = confirm('Sie wollen den User ' + $user_id + ' aktivieren?');
        if (r == true) {

            $.ajax({
                url:WEBROOT + "ajax/activate/" + $user_id,
                type:"post",
                data:'id=' + $user_id,
                dataType:'json',
                success:function (data,status) {
                    if (data.status == "success") {
                        alert(data.msg);
                    }
                    else {
                        showMessage(json.message, 'error');
                    }
                }
            });
        }
    }

</script>

     <div id="demo"></div>
<div class="container-fluid">
    <div class="row-fluid">
        <?php
        $group = $this->ion_auth->user()->row()->group;
        if ($group == 'admin') {
            echo '<table cellpadding=0 cellspacing=10>' . PHP_EOL;
            echo    '<tr>' . PHP_EOL;
            echo     '<th>Vorname</th>' . PHP_EOL;
            echo     '<th>Nachname</th> ' . PHP_EOL;
            echo     '<th>Emailadresse</th>' . PHP_EOL;
            echo     '<th>Gruppe</th>' . PHP_EOL;
            echo     '<th>Status</th>' . PHP_EOL;
            echo     '</tr>' . PHP_EOL;?>
            <?php  foreach ($users as $user):
            echo '<tr>
                    <td>'?><?php echo $user->first_name;?></td>
                <td><?php echo $user->last_name;?></td>
                <td><?php echo $user->email;?></td>
                <td><?php echo $user->group;?></td>
                <td><?php
                    if ($user->active) {


                        echo  '<a href="#" onclick="modalfunktion_deact( ' . $user->id . ')">Aktiv</a>
';
                    }if (!$user->active) {
                        echo '<a href="#" onclick="modalfunktion_act( ' . $user->id . ')">Inaktiv</a>
';
                    }  '</td> ' . PHP_EOL;?>
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