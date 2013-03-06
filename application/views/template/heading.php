<body>
<div id="header">
    <h1>Reservations-Tool</h1>
</div>

<!--Sub-Navigation User rechts-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav btn-group">

        <li class="btn btn-inverse"><?php
            $id = $this->ion_auth->user()->row()->id;
            $first_name = $this->ion_auth->user()->row()->first_name;
            $last_name  = $this->ion_auth->user()->row()->last_name;
            echo anchor('mitglieder/edit_user/'. $id, '<i class="icon icon-user "></i> <span
                class="text">' . ucfirst($first_name) . ' ' . ucfirst($last_name));
        ?></span></a></li>
        <!--<li class="btn btn-inverse"><?php echo anchor('settings', '<i class="icon icon-cog"></i> <span
                class="text">Settings</span>');?></a></li> -->
        <li class="btn btn-inverse"><?php echo anchor('auth/logout', '<i class="icon icon-share-alt"></i> <span
                class="text">Logout</span>');?></a></li>

    </ul>
</div>

