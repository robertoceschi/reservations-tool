<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
								<span class="icon">
									<i class="icon-user "></i>
								</span>
                    <h5>Ihr User Profil</h5>
                </div>
                <div class="widget-content nopadding">
                    </div>
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open(current_url(),$attributes);

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
    </div>