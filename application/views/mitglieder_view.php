<script type="text/javascript">
    $(document).ready(function () {
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
                        success:function (data, status) {
                            if (data.status == "success") {
                                //reference.removeClass('inaktiv');
                                //reference.addClass('aktiv');
                                reference.toggleClass('inaktiv', 'aktiv');
                                reference.empty();
                                reference.append('Inaktiv');
                            }
                            else {
                                alert(user_name + ' konnte nicht deaktiviert werden');
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
                        success:function (data, status) {
                            if (data.status == "success") {
                                //reference.removeClass('aktiv');
                                //reference.addClass('inaktiv');
                                reference.toggleClass('inaktiv', 'aktiv');
                                reference.empty();
                                reference.append('Aktiv');
                            }
                            else {
                                alert(user_name + ' konnte nicht aktiviert werden');
                            }
                        }
                    });
                }
            }
        });
    });
</script>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div id=new_user>
                <button class="btn btn-large btn-primary"><a href="<?php echo site_url('mitglieder/create_user');?>"> <i class=" icon-plus icon-white"></i> Neues Mitglied eintragen</a></button>
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
                echo '<tr>
                    <td>'?><?php echo $user->first_name;?></td>
                <td><?php echo $user->last_name;?></td>
                <td><?php echo $user->email;?></td>
                <td><?php echo $user->group;?></td>
                <td><?php
                    if ($user->active) {
                        echo  '<a class="toggleStatus inaktiv" id= "' . $user->id . ' " title=" ' . ucfirst($user->first_name) . ' ' . ucfirst($user->last_name) . ' ">Aktiv</a></span> ';
                    }if (!$user->active) {
                        echo '<a class="toggleStatus aktiv" id="' . $user->id . '" title=" ' . ucfirst($user->first_name) . ' ' . ucfirst($user->last_name) . ' ">Inaktiv</a></span>
';
                    }  '</td> ' . PHP_EOL;?>
                <td><?php echo anchor("mitglieder/edit_user/" . $user->id, 'Edit');?> | <?php echo anchor("" . $user->id, 'Delete');?></td>

                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>










