<div class="container-fluid">
    <div class="row-fluid">
        <?php

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
        echo anchor("settings/edit_user/" . $user->id, 'Edit');
    ?>
    </div>
    <div class="row-fluid">

    </div>