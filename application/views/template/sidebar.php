<div id="content">
    <div id="content-header">
        <h1><?php echo $title;?></h1>
    </div>
    <!--Breadcrump-Navigation-->
    <div id="breadcrumb">
        <?php
        if ($this->ion_auth->user()->row()->permission_group == 'admin') {
            if ($this->uri->segment(1) == 'home') {
                echo '<a href="#" class="tip-bottom"><i class="icon-home"></i>Home</a>';
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



