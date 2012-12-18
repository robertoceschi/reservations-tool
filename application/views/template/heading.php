<body>
<div id="header">
    <h1><a href="./dashboard.html">Unicorn Admin</a></h1>
</div>

<!--<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
</div>  -->
<div id="user-nav" class="navbar navbar-inverse">
    <?php





    ?>
    <ul class="nav btn-group">
        <li class="btn btn-inverse"><?php
            $first_name = $this->ion_auth->user()->row()->first_name;
            $last_name  = $this->ion_auth->user()->row()->last_name;
            echo anchor('settings', '<i class="icon icon-user"></i> <span
                class="text">' . $first_name . ' ' . $last_name);
        ?></span></a></li>
        <!--<li class="btn btn-inverse"><?php echo anchor('settings', '<i class="icon icon-cog"></i> <span
                class="text">Settings</span>');?></a></li> -->
        <li class="btn btn-inverse"><?php echo anchor('auth/logout', '<i class="icon icon-share-alt"></i> <span
                class="text">Logout</span>');?></a></li>

    </ul>
</div>
