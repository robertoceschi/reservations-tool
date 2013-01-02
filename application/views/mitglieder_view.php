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

        $('.close').click(function() {
            location.reload();
        });


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


    });
</script>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="alert alert-success" style="display: none">
                <button class="close" data-dismiss="alert">×</button>
                <strong><div id="successMessage"></div>  </strong>
            </div>
            <div class="alert alert-error" style="display: none">
                <button class="close" data-dismiss="alert">×</button>
                <strong><div id="errorMessage"></div>  </strong>
            </div>


            <div id=new_user>
                <button class="btn btn-large btn-primary"><a href="<?php echo site_url('mitglieder/create_user');?>"> <i
                        class=" icon-plus icon-white"></i> Neues Mitglied eintragen</a></button>
            </div>


            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Emailadresse</th>
                    <th>Gruppe</th>
                    <th>Status</th>
                    <th>Bearbeitung</th>
                </tr>
                </thead>


                <?php  foreach ($users as $user):
                echo '<tbody>';
                echo '<tr class="remove">
                    <td>'?><?php echo $user->first_name;?></td>
                <td><?php echo $user->last_name;?></td>
                <td><?php echo $user->email;?></td>
                <td><?php echo $user->group;?></td>
                <td><?php
                    if ($user->active) {
                        echo  '<span style="cursor:pointer"><a  class="toggleStatus inaktiv" id= "' . $user->id . ' " title=" ' . ucfirst($user->first_name) . ' ' . ucfirst($user->last_name) . ' ">Aktiv</a></span> ';
                    }if (!$user->active) {
                        echo '<span style="cursor:pointer"><a class="toggleStatus aktiv" id="' . $user->id . '" title=" ' . ucfirst($user->first_name) . ' ' . ucfirst($user->last_name) . ' ">Inaktiv</a></span>
';
                    }  '</td> ' . PHP_EOL;?>
                <td><?php echo anchor("mitglieder/edit_user/" . $user->id, '<i class=" icon-edit"></i>');?>      | <?php
                    echo '<span style="cursor:pointer"><a class="delete_user" id= "' . $user->id . ' " title=" ' . ucfirst($user->first_name) . ' ' . ucfirst($user->last_name) . ' löschen? "><i class=" icon-trash"></i> </a></span> ';?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>










