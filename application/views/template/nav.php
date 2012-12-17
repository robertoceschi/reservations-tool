<div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <?php if ($this->uri->segment(1) === 'home'): ?><li class="active"><?php else : ?>
    <li><? endif; ?><?php
        $is_admin = $this->ion_auth->user()->row()->group;
        if ($is_admin == 'admin') {
            echo anchor('home/admin', '<i class="icon icon-home"></i><span>Dashboard</span>');
        } else {
            echo anchor('home/member', '<i class="icon icon-home"></i><span>Dashboard</span>');
        } ?></li>
        <li class="submenu">
        <?php if ($this->uri->segment(1) === 'settings'): ?><li class="active"><?php else : ?>
    <li><? endif; ?><?php echo anchor('settings', '<i class="icon icon-th-list"></i> <span>Settings</span>'); ?></li>
        <ul>
            <li><a href="form-common.html">Users</a></li>
            <li><a href="form-validation.html">Groups</a></li>

        </ul>
        </li>
        <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
        <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Interface elements</span></a></li>
        <li><a href="tables.html"><i class="icon icon-th"></i> <span>Tables</span></a></li>
        <li><a href="grid.html"><i class="icon icon-th-list"></i> <span>Grid Layout</span></a></li>
        <li class="submenu">
            <a href="#"><i class="icon icon-file"></i> <span>Sample pages</span> <span class="label">4</span></a>
            <ul>
                <li><a href="invoice.html">Invoice</a></li>
                <li><a href="chat.html">Support chat</a></li>
                <li><a href="calendar.html">Calendar</a></li>
                <li><a href="gallery.html">Gallery</a></li>
            </ul>
        </li>
        <li>
            <a href="charts.html"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a>
        </li>
        <li>
            <a href="widgets.html"><i class="icon icon-inbox"></i> <span>Widgets</span></a>
        </li>
    </ul>
</div>