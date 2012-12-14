<body>
<div id="header">
    <h1><a href="./dashboard.html">Unicorn Admin</a></h1>
</div>

<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav btn-group">
        <li class="btn btn-inverse"><?php echo anchor('settings', '<i class="icon icon-user"></i> <span
                class="text">Profile</span>');?></a></li>



        <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown"
                                                                   data-target="#menu-messages" class="dropdown-toggle"><i
                class="icon icon-envelope"></i> <span class="text">Messages</span> <span
                class="label label-important">5</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#">new message</a></li>
                <li><a class="sInbox" title="" href="#">inbox</a></li>
                <li><a class="sOutbox" title="" href="#">outbox</a></li>
                <li><a class="sTrash" title="" href="#">trash</a></li>
            </ul>
        </li>
        <li class="btn btn-inverse"><?php echo anchor('settings', '<i class="icon icon-cog"></i> <span
                class="text">Settings</span>');?></a></li>
        <li class="btn btn-inverse"><?php echo anchor('auth/logout', '<i class="icon icon-share-alt"></i> <span
                class="text">Logout</span>');?></a></li>

    </ul>
</div>

<div id="sidebar">
    <?php
    $this->load->view('template/nav');
    ?>
</div>
<div id="style-switcher">
    <i class="icon-arrow-left icon-white"></i>
    <span>Style:</span>
    <a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
    <a href="#blue" style="background-color: #2D2F57;"></a>
    <a href="#red" style="background-color: #673232;"></a>
</div>

<div id="content">
    <div id="content-header">
        <h1>Settings</h1>
        <div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
            <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
        </div>
    </div>
    <div id="breadcrumb">
        <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a href="#" class="tip-bottom">Settings</a>
    </div>
