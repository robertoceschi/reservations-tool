<script type="text/javascript">
    $(document).ready(function () {
        $('.toggleStatus').click(function () {
            if ($(this).hasClass('inaktiv')) {
                reference = $(this);
                var user_id = $(this).attr('id');
                var r = confirm('Sie wollen den User ' + user_id + ' deaktivieren?');
                if (r == true) {
                    var element = $(this);
                    var I = element.attr("id");
                    var info = 'id=' + I;
                    var actualGroup = $(this).text();
                    $.ajax({
                        url:WEBROOT + "ajax/deactivate/" + I,
                        type:"post",
                        data:'id=' + I,
                        dataType:'json',
                        success:function (data, status) {
                            if (data.status == "success") {

                                reference.toggleClass('inaktiv', 'aktiv');
                                //$(reference).addClass('aktiv');
                                //$(reference).empty();
                                //window.location.reload(true);
                                //alert(data.msg);
                            }
                            else {
                                //showMessage(json.message, 'error');
                            }
                        }
                    });
                }

            }else {
                reference = $(this);
                var user_id = $(this).attr('id');
                var r = confirm('Sie wollen den User ' + user_id + ' aktivieren?');
                if (r == true) {
                    var element = $(this);
                    var I = element.attr("id");
                    var info = 'id=' + I;
                    $.ajax({
                        url:WEBROOT + "ajax/activate/" + I,
                        type:"post",
                        data:'id=' + I,
                        dataType:'json',
                        success:function (data, status) {
                            if (data.status == "success") {
                                reference.toggleClass('aktiv', 'inaktiv');
                                //$(reference).removeClass('aktiv');
                                //$(reference).addClass('inaktiv');
                                // $(reference).empty();
                                //window.location.reload(true);
                            }
                            else {
                                //showMessage(json.message, 'error');
                            }
                        }
                    });
                }
            }
        });
    });
</script>

<div id="example" class="modal hide fade in" style="display: none; ">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>

        <h3>This is a Modal Heading</h3>
    </div>
    <div class="modal-body">
        <h4>Text in a modal</h4>

        <p>You can add some text here.</p>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn-success">Call to action</a>
        <a href="#" class="btn" data-dismiss="modal">Close</a>
    </div>
</div>
<p><a data-toggle="modal" href="#example" class="btn btn-primary btn-large">Launch demo modal</a></p>



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
                        //echo  '<a title="User deaktivieren?" class="tip-bottom" class="inaktiv" id= "' . $user->id . ' ">Aktiv</a></span> ';
                        echo  '<a class="toggleStatus inaktiv" id= "' . $user->id . ' ">Aktiv</a></span> ';
                    }if (!$user->active) {
                        echo '<a class="toggleStatus aktiv" id="' . $user->id . '">Inaktiv</a></span>
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
                        echo 'user aktiv';
                        //echo   '<a href=" ' . base_url() . '/mitglieder/deactivate/' . $user->id . '"' . 'class="btn btn-success">deaktivieren</a>';
                    } else {
                        echo 'inaktiv';
                        //echo   '<a href=" ' . base_url() . '/mitglieder/activate/' . $user->id . '"' . 'class="btn btn-success">aktivieren</a>'


                        ;
                    }?>




                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>


            <p><a href="<?php echo site_url('mitglieder/create_user');?>">Create a new user</a>
            <?php
        } ?>
    </div>


    <div class="row-fluid">

    </div>


