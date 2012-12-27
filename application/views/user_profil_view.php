<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
        <?php


        $user = $this->ion_auth->user()->row();
        echo $user->username . '<br />';
        echo $user->first_name . '<br />';
        echo $user->last_name . '<br />';
        echo $user->email . '<br />';
        echo $user->group . '<br />';
        echo $user->phone . '<br />';
        echo $user->password . '<br />';
        echo anchor("mitglieder/edit_user/" . $user->id, 'Edit');
    ?>
    </div>
    </div>

    </div>