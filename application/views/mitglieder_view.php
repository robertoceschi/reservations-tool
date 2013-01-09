

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">


            <div class="widget-box">
                <div class="widget-title">

                    <h5>Dynamic table</h5>
                </div>

                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
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


                        <?php
                        foreach ($users as $user):

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
                            <td><?php echo anchor("mitglieder/edit_user/" . $user->id, '<i class=" icon-edit"></i>');?>
                                | <?php
                                echo '<span style="cursor:pointer"><a class="delete_user" id= "' . $user->id . ' " title=" ' . ucfirst($user->first_name) . ' ' . ucfirst($user->last_name) . ' löschen? "><i class=" icon-trash"></i> </a></span> ';?></td>
                            </tr>


                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>











