<script type="text/javascript">

    $(document).ready(function () {
        $('span.inaktiv').click(function () {
            var reference = this;
            var user_id = $(this).attr('id');
            var r = confirm('Sie wollen den User ' + user_id + ' deaktivieren?');
            if (r == true) {


                var element = $(this);
                //alert (element);

                var I = element.attr("id");
                //alert (I);
                var info = 'id=' + I;
                //alert (info);
                var actualGroup = $(this).text();
                //alert (actualGroup);

                $.ajax({
                    url:WEBROOT + "ajax/deactivate/" + I,
                    type:"post",
                    data:'id=' + I,
                    dataType:'json',

                    success:function (data, status) {
                        if (data.status == "success") {

                            //showMessage(json.message, 'success');
                            //$('td:nth-child(5)').html('<a href="#">Inaktiv</a>');

                            //var element =  '"p.inaktiv" id= " ' + I + ' ">';
                            //alert (I);
                            //var DivId = $(this).find('div.add');

                            $(reference).removeClass('inaktiv');
                            $(reference).addClass('aktiv');
                            $(reference).empty()//.append('Inaktiv');
                            window.location.reload(true);
                            //alert(data.msg);

                            //$('span.inaktiv').empty().append('Inaktiv');
                            //$('span.inaktiv').empty().append('Inaktiv');
                            //$('p.inaktiv#'+I).empty().append('Inaktiv');
                            //alert('p.inaktiv#'+I);

                            //$('#inaktiv'+ I).css("background-color","red");

                            //$(this).val('background-color', 'red');
                        }
                        else {
                            //showMessage(json.message, 'error');
                        }
                    }
                });

            }
        });
        $('span.aktiv').click(function () {
            var reference = this;
            var user_id = $(this).attr('id');
            var r = confirm('Sie wollen den User ' + user_id + ' aktivieren?');
            if (r == true) {


                var element = $(this);

                var I = element.attr("id");
                //alert (I);
                var info = 'id=' + I;
                //alert (info);
                $.ajax({
                    url:WEBROOT + "ajax/activate/" + I,
                    type:"post",
                    data:'id=' + I,
                    dataType:'json',
                    success:function (data, status) {
                        if (data.status == "success") {
                            //showMessage(json.message, 'success');
                            //$('td:nth-child(5)').html('<a href="#">Inaktiv</a>');

                            $(reference).removeClass('aktiv');
                            $(reference).addClass('inaktiv');
                            $(reference).empty().append('Aktiv');
                            window.location.reload(true);
                            //$(this).val('background-color', 'red');
                        }
                        else {
                            //showMessage(json.message, 'error');
                        }
                    }
                });

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

                        echo  '<span class="inaktiv" id= "' . $user->id . ' ">Aktiv</span> ';
                        //echo  '<a href="#" onclick="modalfunktion_deact( ' . $user->id . ')">Aktiv</a>
//';
                    }if (!$user->active) {
                        echo '<span class="aktiv" id="' . $user->id . '">Inaktiv</span>
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


