<!--<div id="style-switcher">
    <i class="icon-arrow-left icon-white"></i>
    <span>Style:</span>
    <a href="#grey" style="background-color: #555555;border-color: #aaaaaa;"></a>
    <a href="#blue" style="background-color: #2D2F57;"></a>
    <a href="#red" style="background-color: #673232;"></a>
</div> -->

<div id="content">
    <div id="content-header">
        <h1><?php echo $title;?></h1>
        <!--<div class="btn-group">
            <a class="btn btn-large tip-bottom" title="Manage Files"><i class="icon-file"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Users"><i class="icon-user"></i></a>
            <a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
            <a class="btn btn-large tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a>
        </div> -->
    </div>
    <div id="breadcrumb">
        <?php
        if ($this->ion_auth->user()->row()->permission_group == 'admin') {
            if ($this->uri->segment(1) == 'home') {
                echo '<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>';
            } elseif ($this->uri->segment(1) == 'mitglieder' and $this->uri->segment(2) == '') {
                echo '<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>';
                echo '<a href="#" title="" class="">Mitglieder</a>';

            } elseif ($this->uri->segment(1) == 'mitglieder' and $this->uri->segment(2) == 'create_user') {
                echo '<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>';
                echo '<a href="#" title="" class="">Mitglieder</a>';
                echo '<a href="#" title="" class="">Create User</a>';
            } elseif ($this->uri->segment(1) == 'mitglieder' and $this->uri->segment(2) == 'edit_user') {
                echo '<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>';
                echo '<a href="#" title="" class="">Mitglieder</a>';
                echo '<a href="#" title="" class="">Edit User</a>';
            } elseif ($this->uri->segment(1) == 'reservation' and $this->uri->segment(2) == '') {
                echo '<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>';
                echo '<a href="#" title="" class="">Reservation</a>';

            } elseif ($this->uri->segment(1) == 'reservation' and $this->uri->segment(2) == 'create_new_event') {
                echo '<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>';
                echo '<a href="#" title="" class="">Reservation</a>';
                echo '<a href="#" title="" class="">Create new Event</a>';
            }
        } else {
            if ($this->uri->segment(1) == 'home') {
                echo '<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>';
            } else {
                echo '<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>';
                echo '<a href="#" title="" class="">Edit User</a>';
            }
        }
        ?>
    </div>



