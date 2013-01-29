<div class="container-fluid">
    <div class="row-fluid">
        <div class="span9">



            <div id=new_user>
                <button class="btn btn-large btn-primary"><a href="<?php echo site_url('courts/create_court');?>"> <i
                        class=" icon-plus icon-white"></i> Neue Reservation tätigen</a></button>
            </div>

            <div class="widget-box">
                <div class="widget-title">


                </div>
                <div class="widget-content nopadding">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Zeit</th>
                            <th>Montag</th>
                            <th>Dienstag</th>
                            <th>Mittwoch</th>
                            <th>Donnerstag</th>
                            <th>Freitag</th>
                            <th>Samstag</th>
                            <th>Sonntag</th>
                        </tr>
                        </thead>
                        <?php
                            echo '<tbody>';

                        foreach ($calendarEvents as $key => $time_slot) {
                        echo  '<tr><td>' .$key. '</td>';
                        foreach ($time_slot as $key => $value) {
                            echo '<td>' . $value . '</td>';
                        }
                        echo '</tr>';
                    }                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id=new_user >
            <button class="btn btn-large btn-primary" style="margin-left:30px;"><a href="<?php echo site_url('courts/create_court');?>"> <i
                    class=" icon-plus icon-white"></i> Neuen Event</a></button>
        </div>
        <div class="span3">
            <div class="widget-box">
                <div class="widget-title">
								<span class="icon">
									<i class="icon-th-list"></i>
								</span>
                    <h5>Events</h5>
                </div>
                <div class="widget-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                </div>
            </div>
        </div>
    </div>
</div>












