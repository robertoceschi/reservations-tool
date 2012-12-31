<script type="text/javascript">


    $(document).ready(function () {
        $("#success").hide();
        $("#error").hide();

        //status ändern inaktiv->aktiv->inaktiv
        $('.toggleStatus').click(function () {
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
                                //reference.removeClass('inaktiv');
                                //reference.addClass('aktiv');
                                reference.toggleClass('inaktiv', 'aktiv');
                                reference.empty();
                                reference.append('Inaktiv');
                                //alert(json.message);
                                $("#successMessage").html(json.message);
                                $("#success").show();
                            }

                            else {
                                $("#errorMessage").html(json.message);
                                $("#error").show();
                            }
                        }
                    });
                }
            } else {
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
                                //reference.removeClass('aktiv');
                                //reference.addClass('inaktiv');
                                reference.toggleClass('inaktiv', 'aktiv');
                                reference.empty();
                                reference.append('Aktiv');
                                $("#successMessage").html(json.message);
                                $("#success").show();
                            }
                            else {
                                $("#errorMessage").html(json.message);
                                $("#error").show();
                            }
                        }
                    });
                }
            }
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
                            //alert(data.status);
                            reference.parent().parent().parent().remove();
                            $("#successMessage").html(json.message);
                            $("#success").show();
                        }
                        else {
                            $("#errorMessage").html(json.message);
                            $("#error").show();
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
            <div id=new_user>
                <button class="btn btn-large btn-primary"><a href="<?php echo site_url('mitglieder/create_user');?>"> <i
                        class=" icon-plus icon-white"></i> Neues Mitglied eintragen</a></button>
            </div>

            <div id="success" class="row" style="display: none">
                <div class="span4">
                    <div id="successMessage" class="alert alert-success"></div>
                </div>
            </div>
            <div id="error" class="row" style="display: none">
                <div class="span4">
                    <div id="errorMessage" class="alert alert-error"></div>
                </div>
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










