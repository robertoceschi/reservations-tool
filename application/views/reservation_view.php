

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span10">




            <div id=new_user>
                <button class="btn btn-large btn-primary"><a href="<?php echo site_url('courts/create_court');?>"> <i
                        class=" icon-plus icon-white"></i> Neue Reservation tätigen</a></button>
            </div>

            <div class="widget-box">
                <div class="widget-title">
								<span class="icon">
									<i class="icon-th-list"></i>
								</span>

                    <h5>Platz 1</h5>
                </div>
                <div class="widget-content nopadding">

                    <table class="table stripped reservation">
                        <thead>
                        <tr ">
                            <th style="font-size: 13px;">Zeit</th>
                            <th style="font-size: 13px;">Montag</th>
                            <th style="font-size: 13px;">Dienstag</th>
                            <th style="font-size: 13px;">Mittwoch</th>
                            <th style="font-size: 13px;">Donnerstag</th>
                            <th style="font-size: 13px;">Freitag</th>
                            <th style="font-size: 13px;">Samstag</th>
                            <th style="font-size: 13px;">Sonntag</th>
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
            <button class="btn btn-success" style="margin-left:30px;margin-top: 8px;"><a href="<?php echo site_url('courts/create_court');?>"> <i
                    class=" icon-plus icon-white"></i> Neuen Event</a></button>
        </div>
        <div class="span2">
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
    <?php
    $attributes = array('class' => '', 'id' => '');
    echo form_open('email/send', $attributes);
    foreach ($court as $key => $value) {
        $court[$key] = $value;
    }
    echo form_dropdown('courts', $court);
    ?>
    <!--Version mit "normalen HTML"
                    <select name="court_name">
                    <?php
        foreach ($court as $key => $value) {
            ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php
        }
    ?></select>-->
</div>












