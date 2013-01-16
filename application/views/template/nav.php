<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <?php if ($this->uri->segment(1) === 'home'): ?><li class="active"><?php else : ?>
    <li><? endif; ?><?php
        $is_admin = $this->ion_auth->user()->row()->permission_group;
        if ($is_admin == 'admin') {
            echo anchor('home/admin', '<i class="icon icon-home"></i><span>Home</span>');
        } else {
            echo anchor('home/member', '<i class="icon icon-home"></i><span>Home</span>');
        } ?></li>
        <?php if ($is_admin == 'admin') { ;?>
        <li class="submenu">
        <?php if ($this->uri->segment(1) === 'mitglieder'): ?><li class="active"><?php else : ?>
    <li><? endif; ?><?php echo anchor('mitglieder', '<i class="icon icon-th-list"></i> <span>Mitglieder</span>'); ?></li>
        <ul>
            <li><a href="form-common.html">Users</a></li>
            <li><a href="form-validation.html">Groups</a></li>

        </ul>
        </li> <?php };?>

    </ul>
</div>