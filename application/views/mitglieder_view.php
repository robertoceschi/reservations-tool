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
                        echo  '<a class="toggleStatus inaktiv" id= "' . $user->id . ' " title=" ' . ucfirst($user->first_name) . ' ' . ucfirst($user->last_name) . ' ">Aktiv</a></span> ';
                    }if (!$user->active) {
                        echo '<a class="toggleStatus aktiv" id="' . $user->id . '" title=" ' . ucfirst($user->first_name) . ' ' . ucfirst($user->last_name) . ' ">Inaktiv</a></span>
';
                    }  '</td> ' . PHP_EOL;?>
                <td><?php echo anchor("mitglieder/edit_user/" . $user->id, 'Edit');?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <p><a href="<?php echo site_url('mitglieder/create_user');?>">Create a new user</a>
            <?php
        } ?>
    </div>
    <div class="row-fluid">
    </div>


