<div class="container-fluid">
    <div class="row-fluid">
        <?php
        $group = $this->ion_auth->user()->row()->group;
        if ($group == 'admin') {
            echo '<h2>Overview Users</h2>';
            echo '<h5>below a list with all users</h5>';

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
                <td><?php echo ($user->active) ? anchor("settings/deactivate/" . $user->id, 'Active') : anchor("settings/activate/" . $user->id, 'Inactive');?></td>
                <td><?php echo anchor("settings/edit_user/" . $user->id, 'Edit');?></td>
                </tr>
                <?php endforeach; ?>
            </table>

            <p><a href="<?php echo site_url('settings/create_user');?>">Create a new user</a>
            <?php
        } if ($group != 'admin') {
        echo '<h2>User Profil</h2>';
        echo '<h5>This is your personal Profil</h5>';
        $user = $this->ion_auth->user()->row();
        echo $user->username . '<br />';
        echo $user->first_name . '<br />';
        echo $user->last_name . '<br />';
        echo $user->email . '<br />';
        echo $user->group . '<br />';
        echo $user->phone . '<br />';
        echo $user->password . '<br />';
        // echo '<tr><td>Gruppe:</td><td>' . $group . '</td></tr>' . PHP_EOL;
        echo anchor("settings/edit_user/" . $user->id, 'Edit');
    };?>
    </div>
    <div class="row-fluid">

    </div>